"use strict";

import { downloadWorkshopCertificate, getUrlWorkshop } from "./workshop.js";

const isQADomain = () => {
  return window.location.host === "qa.goemms.com" || window.location.host === "localhost";
};

const createDownloadLink = (blob, fileName) => {
  const urlCreator = window.URL || window.webkitURL;
  const imageUrl = urlCreator.createObjectURL(blob);
  const tag = document.createElement("a");
  tag.href = imageUrl;
  tag.download = fileName;
  document.body.appendChild(tag);
  tag.click();
  document.body.removeChild(tag);
};

const buildCertificateUrl = (fullname, type) => {
  const encodeFullname = encodeURI(fullname);
  const domainUrl = isQADomain() ? `certificate-emms2025qa.php` : `certificate-emms2025.php`;
  return `https://textify.fromdoppler.com/${domainUrl}?fullname=${encodeFullname}&type=${type}`;
};

const downloadNormalCertificate = async (fullname, type) => {
  const fileName = `certificacion-emms2025-${type}.png`;
  const url = buildCertificateUrl(fullname, type);

  const response = await fetch(url);
  if (!response.ok) throw new Error("Error downloading normal certificate");

  const blob = await response.blob();
  createDownloadLink(blob, fileName);
};

const forceDownload = async (fullname, type) => {
  const workshopType = getUrlWorkshop();
  try {
    if (type === "workshop" && workshopType) {
      await downloadWorkshopCertificate(fullname);
    } else {
      await downloadNormalCertificate(fullname, type);
    }
  } catch (error) {
    console.error("Error:", error);
    throw error;
  }
};

const handleButtonState = (submitButton, enable, showError) => {
  submitButton.setAttribute("data-disabled", enable ? "true" : "false");
  submitButton.classList.toggle("button--loading", enable);
  const errorSpan = document.querySelector("#certificateForm span");
  errorSpan.classList.toggle("showError", showError);
};

const submitCertificateWithoutForm = async (e, type, submitButton, userName) => {
  e.preventDefault();
  const isDisabled = submitButton.getAttribute("data-disabled") === "true";
  if (isDisabled) return false;

  handleButtonState(submitButton, true, false);
  try {
    await forceDownload(userName, type);
    return true;
  } catch (error) {
    console.error(error);
  } finally {
    handleButtonState(submitButton, false, false);
  }
};

const handleCertificateSubmit = async (e, type, submitButton) => {
  e.preventDefault();
  const certificateForm = document.getElementById("certificateForm");
  const formData = new FormData(certificateForm);
  const fullname = formData.get("fullname");
  const isDisabled = submitButton.getAttribute("data-disabled") === "true";

  if (isDisabled) return false;

  handleButtonState(submitButton, true, false);

  if (fullname.length < 2) {
    handleButtonState(submitButton, false, true);
    return false;
  }

  try {
    await forceDownload(fullname, type);
    certificateForm.reset();
    return true;
  } catch (error) {
    console.error(error);
  } finally {
    handleButtonState(submitButton, false, false);
  }
};

export { handleCertificateSubmit, submitCertificateWithoutForm };
