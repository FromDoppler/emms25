'use strict';

import {
    customError,
    searchUrlParam,
    validateForm,
    toHex,
    fromHex
} from './index.js';
const submitFormFetch = async (form, fetchType) => {
    if (!validateForm(form)) return;

    const endPoint = './services/register.php';
    const formData = new FormData(form);
    const email = formData.get('email');
    const encodeEmail = toHex(email);
    const dialCode = document.querySelector('.iti__selected-dial-code')?.innerHTML || '';

    const userData = {
        name: formData.get('name'),
        email,
        phone: formData.get('phone').trim() ? dialCode + formData.get('phone') : null,
        encodeEmail,
        acceptPolicies: formData.get('privacy') === 'true' || null,
        acceptPromotions: formData.get('promotions') === 'true' || null,
        utm_source: searchUrlParam('utm_source') || 'direct',
        utm_campaign: searchUrlParam('utm_campaign'),
        utm_content: searchUrlParam('utm_content'),
        utm_term: searchUrlParam('utm_term'),
        utm_medium: searchUrlParam('utm_medium'),
        origin: searchUrlParam('origin'),
        type: fetchType,
        events: setEventInLocalStorage(fetchType, encodeEmail)
    };

    const user = {
        userEmail: email,
        userEvents: userData.events
    };

    userData.encodeEmail = toHex(JSON.stringify(user));

    form.querySelector('button').classList.add('button--loading');

    try {
        const fetchResp = await fetch(endPoint, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData),
        });
        return { fetchResp, encodeEmail };
    } catch (error) {
        customError('Fetch error', error);
    } finally {
        form.querySelector('button').classList.remove('button--loading');
    }
};


const submitWithoutForm = async (fetchType) => {

    const endPoint = './services/register.php';
    const userEmail = localStorage.getItem('dplrid');
    const userEvents = setEventInLocalStorage(fetchType, userEmail);
    const user = {
        'userEmail': userEmail,
        'userEvents': userEvents
    }
    const userData = {
        'email': fromHex(userEmail),
        'encodeEmail': toHex(JSON.stringify(user)),
        'utm_source': (searchUrlParam('utm_source') === '') ? 'direct' : searchUrlParam('utm_source'),
        'utm_campaign': searchUrlParam('utm_campaign'),
        'utm_content': searchUrlParam('utm_content'),
        'utm_term': searchUrlParam('utm_term'),
        'utm_medium': searchUrlParam('utm_medium'),
        'origin': searchUrlParam('origin'),
        'type': fetchType,
        'events': userEvents
    };

    try {
        const fetchResp = await fetch(endPoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData),
        });
        return {
            fetchResp
        };
    } catch (error) {
        customError('Fetch error', error);
    }

}
const setEventInLocalStorage = (fetchType, encodeEmail) => {
    let events = localStorage.getItem('events');
    if (events) {
        try {
            // Try to parse the value as JSON (array)
            events = JSON.parse(events);

            if (!Array.isArray(events)) {
                // If it is not an array, create a new array and add the value
                events = [events];
            }
        } catch (error) {
            // If it cannot be parsed as JSON, assume it is a single value and create a new array
            events = [events];
        }

        events.push(fetchType);
    } else {
        events = [fetchType];
        localStorage.setItem('dplrid', encodeEmail);
    }

    localStorage.setItem('events', JSON.stringify(events));
    localStorage.setItem('lastEventsUpdateTime', new Date().toString());
    return JSON.stringify(events);
}



export {
    submitFormFetch,
    submitWithoutForm,
    setEventInLocalStorage
};
