const WORKSHOPS = [
  "anacirujano-KPL482",
  "pablorodriguez-XZM930",
  "alvarolopezherrera-QTN547",
  "fernandotellado-RGW825",
  "natzirturrado-JHV621",
  "marianokhatcherian-DFY308",
  "mariamarques-WER916",
  "xiscolopez-BTP764",
  "amandabozza-LQN582",
  "doppler-SCV409",
  "getlinko-ZHX273",
];

export const getUrlWorkshop = () => WORKSHOPS.find((workshop) => window.location.href.includes(workshop)) || false;

const buildWorkshopUrl = (fullname, workshopType) => {
  const encodeFullname = encodeURI(fullname);
  const domainUrl = isQADomain() ? `certificate-emms2025qa.php` : `certificate-emms2025.php`;
  return `https://textify.fromdoppler.com/${domainUrl}?fullname=${encodeFullname}&type=workshop&workshoptype=${encodeURI(workshopType)}`;
};

export const downloadWorkshopCertificate = async (fullname) => {
  const workshopType = getUrlWorkshop();
  if (!workshopType) return;
  const fileName = `certificacion-emms2025-workshop.png`;
  const url = buildWorkshopUrl(fullname, workshopType);

  const response = await fetch(url);
  if (!response.ok) throw new Error("Error downloading workshop certificate");

  const blob = await response.blob();
  createDownloadLink(blob, fileName);
};
