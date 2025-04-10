import { toHex, searchUrlParam } from './index.js';

export const buildUserObject = (email, events) => ({
    userEmail: email,
    userEvents: events
});

export const buildUserData = ({
    name = null,
    email,
    phone = null,
    acceptPolicies = null,
    acceptPromotions = null,
    type,
    events
}) => {
    const encodeEmail = toHex(JSON.stringify(buildUserObject(email, events)));

    const utms = {
        utm_source: searchUrlParam('utm_source') || 'direct',
        utm_campaign: searchUrlParam('utm_campaign'),
        utm_content: searchUrlParam('utm_content'),
        utm_term: searchUrlParam('utm_term'),
        utm_medium: searchUrlParam('utm_medium'),
        origin: searchUrlParam('origin'),
    };

    return {
        name,
        email,
        phone,
        encodeEmail,
        acceptPolicies,
        acceptPromotions,
        ...utms,
        type,
        events
    };
};

export const setEventInLocalStorage = (fetchType, encodeEmail) => {
    let events = localStorage.getItem('events');

    try {
        events = events ? JSON.parse(events) : [];
        if (!Array.isArray(events)) events = [events];
        events.push(fetchType);
    } catch {
        events = [fetchType];
    }

    if (!localStorage.getItem('dplrid')) {
        localStorage.setItem('dplrid', encodeEmail);
    }

    localStorage.setItem('events', JSON.stringify(events));
    localStorage.setItem('lastEventsUpdateTime', new Date().toString());

    return JSON.stringify(events);
};

export const extractFormData = (form) => {
    const formData = new FormData(form);
    const email = formData.get('email');
    const dialCode = document.querySelector('.iti__selected-dial-code')?.innerHTML || '';
    const phone = formData.get('phone').trim() ? dialCode + formData.get('phone') : null;

    return {
        name: formData.get('name'),
        email,
        phone,
        acceptPolicies: formData.get('privacy') === 'true' || null,
        acceptPromotions: formData.get('promotions') === 'true' || null
    };
};

export const toggleButtonLoading = (form, isLoading) => {
    const button = form.querySelector('button');
    if (button) button.classList.toggle('button--loading', isLoading);
};
