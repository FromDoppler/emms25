"use strict";

const utmParams = ["utm_source", "utm_campaign", "utm_content", "utm_term", "utm_medium", "origin"];

const searchUrlParam = (searchedParam) => {
	const urlString = window.location.href;
	const url = new URL(urlString);
	const param = url.searchParams.get(searchedParam);
	return (param === null ? '' : param);
}


const getUrlWithParams = (url) => {
	let newUrl = url + '?';

	utmParams.forEach(param => {
		if (searchUrlParam(param) != '') {
			newUrl += param + "=" + searchUrlParam(param) + "&";
		}
	})

	// Remove last & in string
	if (newUrl[newUrl.length - 1] === '&') {
		newUrl = (newUrl.slice(0, -1));
	}

	return (newUrl === (url + '?') ? url : newUrl);
}

const utmAnchorPropagation = () => {
	document.querySelectorAll('.utmAnchorPropagation').forEach(anchorTag => {
		anchorTag.href = getUrlWithParams(anchorTag.href);
	});
}


export {
	searchUrlParam,
	getUrlWithParams,
	utmAnchorPropagation
};