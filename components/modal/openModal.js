import { modalQueue, processing, setProcessing } from "./scripts/modalQueueStore.js";

export const openModal = (id) => {
  return new Promise((resolve) => {
    modalQueue.push({ id, resolve });
    processQueue();
  });
};

const processQueue = () => {
  if (processing || modalQueue.length === 0) return;

  const { id, resolve } = modalQueue.shift();
  setProcessing(true);

  _internalOpenModal(id).then((res) => {
    resolve(res);
    setProcessing(false);
    processQueue();
  });
};

const _internalOpenModal = (id) => {
  return new Promise((resolve) => {
    const overlay = document.getElementById(id);
    if (!overlay) return resolve({ reason: "missing" });

    const body = document.body;
    let done = false;

    const cleanup = () => {
      overlay.removeEventListener("click", onOverlayClick);
      document.removeEventListener("keydown", onEsc);
      observer.disconnect();
      body.classList.remove("modal-open");
    };

    const finish = (reason) => {
      if (done) return;
      done = true;
      cleanup();
      if (reason !== "external") overlay.setAttribute("aria-hidden", "true");
      resolve({ reason });
    };

    const onOverlayClick = (e) => {
      if (e.target === overlay || e.target.closest("[data-modal-close]")) {
        finish("close");
      }
    };

    const onEsc = (e) => {
      if (e.key === "Escape") finish("esc");
    };

    const observer = new MutationObserver(() => {
      if (overlay.getAttribute("aria-hidden") === "true") finish("external");
    });

    overlay.setAttribute("aria-hidden", "false");
    body.classList.add("modal-open");

    overlay.addEventListener("click", onOverlayClick);
    document.addEventListener("keydown", onEsc);
    observer.observe(overlay, { attributes: true, attributeFilter: ["aria-hidden"] });
  });
};

export const closeModal = (id) => {
  const overlay = document.getElementById(id);
  if (!overlay) return false;
  overlay.setAttribute("aria-hidden", "true");
  return true;
};
