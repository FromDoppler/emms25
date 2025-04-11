'use strict';

import { validateForm, toHex, fromHex } from './index.js';
import {
    buildUserData,
    setEventInLocalStorage,
    extractFormData,
    toggleButtonLoading,
    trackMetaPixelRegistration
} from './submitHelpers.js';

const sendUserData = async (userData) => {
    const endPoint = './services/register.php';

    try {
        const fetchResp = await fetch(endPoint, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        });

        if (fetchResp.ok) {
            trackMetaPixelRegistration();
        }

        return { fetchResp, encodeEmail: userData.encodeEmail };
    } catch (error) {
        console.log('Fetch error', error);
        return null;
    }
};

const submitFormFetch = async (form, fetchType) => {
    if (!validateForm(form)) return;

    const { name, email, phone, acceptPolicies, acceptPromotions } = extractFormData(form);
    const events = setEventInLocalStorage(fetchType, toHex(email));

    const userData = buildUserData({
        name,
        email,
        phone,
        acceptPolicies,
        acceptPromotions,
        type: fetchType,
        events
    });

    toggleButtonLoading(form, true);
    const result = await sendUserData(userData);
    toggleButtonLoading(form, false);

    return result;
};

const submitWithoutForm = async (fetchType) => {
    const userEmail = localStorage.getItem('dplrid');
    if (!userEmail) return;

    const events = setEventInLocalStorage(fetchType, userEmail);

    const userData = buildUserData({
        email: fromHex(userEmail),
        type: fetchType,
        events
    });

    return await sendUserData(userData);
};

export {
    submitFormFetch,
    submitWithoutForm
};
