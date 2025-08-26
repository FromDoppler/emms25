import { openModal } from "./openModal.js";

const EXIT_TOP_THRESHOLD_PX = 8; // px desde el top para considerar "salida"
const SHOW_ONCE_PER_SESSION = true;

const initExitIntentCapture = () => {
  document.querySelectorAll('.popup-modal[data-captor="1"]').forEach(setupExitIntentForModal);
};

const setupExitIntentForModal = (modalEl) => {
  const modalId = modalEl.id;
  if (!modalId) return;

  const sessionKey = `exitIntentShown:${modalId}`;
  if (SHOW_ONCE_PER_SESSION && sessionStorage.getItem(sessionKey)) return;

  const markShownThisSession = () => {
    sessionStorage.setItem(sessionKey, "1");
  };

  const removeExitIntentListeners = () => {
    document.removeEventListener("mouseout", handleMouseOut, true);
    document.removeEventListener("mouseleave", handleMouseLeave, true);
    document.removeEventListener("visibilitychange", handleVisibilityChange, true);
  };

  const triggerModalOnce = () => {
    markShownThisSession();
    removeExitIntentListeners();
    openModal(modalId);
  };

  const handleMouseOut = (e) => {
    const related = e.relatedTarget || e.toElement;
    if (related) return; // sigue dentro del documento
    if (e.clientY <= EXIT_TOP_THRESHOLD_PX) triggerModalOnce();
  };

  const handleMouseLeave = (e) => {
    if (!e.relatedTarget && !e.toElement) triggerModalOnce();
  };

  const handleVisibilityChange = () => {
    if (document.visibilityState === "hidden") triggerModalOnce();
  };

  const addExitIntentListeners = () => {
    document.addEventListener("mouseout", handleMouseOut, true);
    document.addEventListener("mouseleave", handleMouseLeave, true);
    document.addEventListener("visibilitychange", handleVisibilityChange, true);
  };

  addExitIntentListeners();
};

document.addEventListener("DOMContentLoaded", () => {
  initExitIntentCapture();
});
