'use strict';


const isQADomain = () => {
    return window.location.host === 'qa.goemms.com' || window.location.host === 'localhost';
}

const WORKSHOPS = [
    "luisperez-56WWP",
    "anadiazdelrio-10FAS",
    "arturoyepez-38TBU",
    "norbertocerasale-60IYW",
    "joserobles-38BUU",
    "andreabozzo-17LQW",
    "luismaram-28IMB",
    "jmgareli-56DVQ",
];

const getUrlWorkshop = () => WORKSHOPS.find(workshop => window.location.href.includes(workshop)) || false;

const saveCertificateSubmit = async (fullname, type,  workshop = null) => {
    const endPoint = './services/saveCertificateSubmit.php';
    const userData = {
        type,
        'workshopType': workshop,
        name : fullname
    }
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
        console.error('Fetch error', error);
    }
}



const forceDownload = async (fullname, type) => {
    const workshopType = getUrlWorkshop();
    if(type==='workshop' && !workshopType)return;
    saveCertificateSubmit(fullname,type,workshopType);
    const encodeFullname = encodeURI(fullname);
    const domainUrl = (isQADomain()) ? `certificate-emms2024qa.php` : `certificate-emms2024.php`;
    const commonUrl = `https://textify.fromdoppler.com/${domainUrl}?fullname=${encodeFullname}&type=${type}`;
    const url = workshopType ? `${commonUrl}&workshoptype=${encodeURI(workshopType)}` : commonUrl;
    const fileName = `certificacion-emms2024-${type}.png`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Error during file download");
        }

        const blob = await response.blob();
        const urlCreator = window.URL || window.webkitURL;
        const imageUrl = urlCreator.createObjectURL(blob);
        const tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

const handleButtonState = (submitButton, enable, showError) => {
    submitButton.setAttribute('data-disabled', enable ? 'true' : 'false');
    submitButton.classList.toggle('button--loading', enable);
    const errorSpan = document.querySelector('#certificateForm span');
    errorSpan.classList.toggle('showError', showError);
};

const submitCertificateWithoutForm = async (e, type, submitButton, userName) => {
    e.preventDefault();
    const isDisabled = submitButton.getAttribute('data-disabled') === 'true';
    if (isDisabled) {
        return false;
    }
    handleButtonState(submitButton, true, false);

    try {
        console.log(userName, type);
        await forceDownload(userName, type);
        return true;
    } catch (error) {
        console.error(error);
        return;
    } finally {
        handleButtonState(submitButton, false, false);
    }
};


const submitCertificate = async (e, type, submitButton) => {
    e.preventDefault();
    const certificateForm = document.getElementById('certificateForm');
    const formData = new FormData(certificateForm);
    const fullname = formData.get('fullname');
    const isDisabled = submitButton.getAttribute('data-disabled') === 'true';
    if (isDisabled) {
        return false;
    }
    handleButtonState(submitButton, true, false);

    if (fullname.length < 2) {
        handleButtonState(submitButton, false, true);
        return false;
    }

    try {
        await forceDownload(fullname, type);
        certificateForm.reset();
        return true;
    } catch (error) {
        console.error(error);
        return;
    } finally {
        handleButtonState(submitButton, false, false);
    }
};




export { submitCertificate, submitCertificateWithoutForm,getUrlWorkshop }
