'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
    validateForm,
} from './common/index.js';
import { alreadyAccountListener, swichFormListener } from './common/switchForm.js';
import { eventsType } from './enums/eventsType.enum.js';

const currentEvent = eventsType.ECOMMERCE;
const form = document.getElementById('commonForm');
const alreadyRegisterForm = document.querySelectorAll('.alreadyRegisterForm');
// const digitalTrendsBtns = document.querySelectorAll('.digitalTrendsBtn');

const redirectToRegisteredPage = () => {
    const pathname = window.location.pathname;
    let nextPage = '';
    switch (pathname) {
        case '/sponsors':
            const slug = sessionStorage.getItem('currentSlug')
            if(slug & slug != 'null'){
                nextPage = `/sponsors-registrado?slug=${slug}`;
            }else{
                nextPage = `/sponsors-registrado`;
            }
            break;
        case '/ecommerce':
            nextPage = '/ecommerce-registrado';
            break;
        case '/ediciones-anteriores':
            nextPage = '/ediciones-anteriores-registrado';
            break;
        default:
            nextPage = '/ecommerce-registrado';
            break;
    }

    window.location.href = getUrlWithParams(nextPage);
};

const handleSubmitForm = async (e) => {
    e.preventDefault();

    if (validateForm(form)) {
        try {
            const { fetchResp: resp } = await submitFormFetch(form, currentEvent);
            if (!resp.ok) throw new Error(`Server error: ${resp.status}`);
            redirectToRegisteredPage();
        } catch (error) {
            customError('Digital post error', error);
        }
    }
};

const handleSubmitWithoutForm = async (button) => {
    button.classList.add('button--loading');
    try {
        const { fetchResp: resp} = await submitWithoutForm(currentEvent);
        if (!resp.ok) throw new Error(`Server error: ${resp.status}`);
        redirectToRegisteredPage();
    } catch (error) {
        customError('Digital post error', error);
    } finally {
        button.classList.remove('button--loading');
    }
};

const initializeEventListeners = () => {
    if (form) {
        form.querySelector('button').addEventListener('click', handleSubmitForm);
        swichFormListener(form);
    }

    // digitalTrendsBtns.forEach((btn) =>
    //     btn.addEventListener('click', () => handleSubmitWithoutForm(btn))
    // );

    alreadyRegisterForm.forEach((form) =>
        form.addEventListener('click', () => handleSubmitWithoutForm(form))
    );

    alreadyAccountListener();
};

document.addEventListener('DOMContentLoaded', initializeEventListeners);

