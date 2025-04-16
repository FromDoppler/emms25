const speakerCarousel = document.querySelector('.speaker-carousel');
    if (speakerCarousel) {
    const flkty = new Flickity(speakerCarousel, {
        cellAlign: 'center',
        contain: true,
        wrapAround: true,
        draggable: true,
        pageDots: false,
        prevNextButtons: true,
        fade: true,
    });

}
