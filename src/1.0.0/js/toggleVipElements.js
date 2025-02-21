import { eventsType } from "./enums/eventsType.enum.js";

const getLocalStorageEvents = () => {
    let localStorageEvents = localStorage.getItem('events');
    return localStorageEvents ? JSON.parse(localStorageEvents) : [];
}

const isVipUser = (eventType) => {
    const events = getLocalStorageEvents();
    return events.some(event => event === eventType);
}

const toggleVipElements = () => {
    const vipElements = document.querySelectorAll('.hidden--vip, .show--vip');
    vipElements.forEach(element => {
        element.classList.add('toogle');
    });
}

const toggleVipEcommerceElements = () => {
    const isEcommerceVip = isVipUser(eventsType.ECOMMERCEVIP);
    const academyBanner = document.getElementById('speacial-flikity');

    if (isEcommerceVip) {
        toggleVipElements();
    } else if (academyBanner) {
        academyBanner.style.display = 'none';
    }
}

const toggleVipDigitalTrendsElements = () => {
    const isDTVip = isVipUser(eventsType.DIGITALTRENDSVIP);
    const academyBanner = document.getElementById('aprende-con-doppler');
    if (isDTVip) {
        toggleVipElements();
    }else if (academyBanner) {
        academyBanner.style.display = 'none';
    }
}

export { toggleVipEcommerceElements, toggleVipDigitalTrendsElements };
