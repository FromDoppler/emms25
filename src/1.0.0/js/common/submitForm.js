'use strict';

import {
    customError,
    searchUrlParam,
    validateForm,
    toHex,
    fromHex
} from './index.js';

const submitFormFetch = async (form, fetchType) => {
    const endPoint = './services/register.php';
    const formData = new FormData(form);
    const user = {
        'userEmail': formData.get('email'),
        'userEvents': []
    }
    const encodeEmail = toHex(formData.get('email'));
    const dialCode = document.querySelector('.iti__selected-dial-code').innerHTML;
    const userData = {
        'name': formData.get('name'),
        'email': formData.get('email'),
        'phone': (formData.get('phone').trim() != '') ? dialCode + formData.get('phone') : null,
        'encodeEmail': encodeEmail,
        'acceptPolicies': (formData.get('privacy') === 'true') ? true : null,
        'acceptPromotions': (formData.get('promotions') === 'true') ? true : null,
        'utm_source': (searchUrlParam('utm_source') === '') ? 'direct' : searchUrlParam('utm_source'),
        'utm_campaign': searchUrlParam('utm_campaign'),
        'utm_content': searchUrlParam('utm_content'),
        'utm_term': searchUrlParam('utm_term'),
        'utm_medium': searchUrlParam('utm_medium'),
        'origin': searchUrlParam('origin'),
        'type': fetchType,
        'events': ''
    };
    const isValidForm = validateForm(form);
    if (isValidForm) {
        form.querySelector('button').classList.add('button--loading');

        userData.events = setEventInLocalStorage(fetchType, encodeEmail);
        user.userEvents = userData.events;
        userData.encodeEmail = toHex(JSON.stringify(user));
        try {
            const fetchResp = await fetch(endPoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData),
            });
            return {
                fetchResp, encodeEmail
            };
        } catch (error) {
            customError('Fetch error', error);
        }
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
