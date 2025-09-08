import { eventsType } from "../../../src/1.0.0/js/enums/eventsType.enum.js";
import { modalIds } from "./modalIds.enum.js";

const getUserEvents = () => {
  try {
    const raw = localStorage.getItem("events");
    return raw ? JSON.parse(raw) : [];
  } catch {
    return [];
  }
};
export const canShowModal = (modalId) => {
  const events = getUserEvents();

  switch (modalId) {
    case modalIds.VIP:
      return !events.includes(eventsType.DIGITALTRENDSVIP);

    case modalIds.FORM:
      return events.includes(eventsType.ECOMMERCE) && !events.includes(eventsType.DIGITALTRENDS);

    case modalIds.EXTRA_DATA:
      return true;

    default:
      return true;
  }
};
