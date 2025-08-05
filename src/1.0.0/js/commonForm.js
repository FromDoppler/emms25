"use strict";

import { customError } from "./common/customsError.js";
import { submitFormFetch, submitWithoutForm } from "./common/submitForm.js";
import { validateForm } from "./common/formsValidators.js";
import { alreadyAccountListener, swichFormListener } from "./common/switchForm.js";

const redirectToRegisteredPage = () => {
  const currentPath = window.location.pathname.replace(/^\//, "");

  // Special case for sponsors (preserve slug)
  if (currentPath === "sponsors") {
    const slug = sessionStorage.getItem("currentSlug");
    const baseUrl = window.APP.EVENTS.CURRENT.sharedPages.sponsors.registered.url;
    window.location.href = slug && slug !== "null" ? `/${baseUrl}?slug=${slug}` : `/${baseUrl}`;
  } else {
    // Default: go to event's registered page
    window.location.href = `/${window.APP.EVENTS.CURRENT.pages.registered.url}`;
  }
};

// Form submit handler
const submitFormHandler = async (e) => {
  e.preventDefault();
  const form = document.getElementById("commonForm");
  if (!form) return;

  if (!validateForm(form)) return;

  try {
    const { fetchResp: resp } = await submitFormFetch(form, window.APP.EVENTS.CURRENT.freeId);
    if (!resp.ok) throw new Error(`Server error: ${resp.status}`);
    redirectToRegisteredPage();
  } catch (error) {
    customError("Error en formulario", error);
  }
};

// Button-only submit handler (sin formulario)
const quickSubmitHandler = async (button) => {
  button.classList.add("button--loading");
  button.disabled = true;

  try {
    const { fetchResp: resp } = await submitWithoutForm(window.APP.EVENTS.CURRENT.freeId);
    if (!resp.ok) throw new Error(`Server error: ${resp.status}`);
    redirectToRegisteredPage();
  } catch (error) {
    customError("Error sin formulario", error);
  } finally {
    button.classList.remove("button--loading");
    button.disabled = false;
  }
};

// Initialization
const initializeEventListeners = () => {
  const form = document.getElementById("commonForm");
  const alreadyRegisterButtons = document.querySelectorAll(".alreadyRegisterForm");

  if (form) {
    const submitBtn = form.querySelector("button");
    if (submitBtn) submitBtn.addEventListener("click", submitFormHandler);
    swichFormListener(form); // usando nombre original con typo
  }

  alreadyRegisterButtons.forEach((btn) => btn.addEventListener("click", () => quickSubmitHandler(btn)));

  alreadyAccountListener();
};

document.addEventListener("DOMContentLoaded", initializeEventListeners);
