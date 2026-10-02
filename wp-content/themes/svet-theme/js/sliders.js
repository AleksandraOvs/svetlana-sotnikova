document.querySelectorAll('.reviews-section__slider').forEach((slider) => {

    const nextButton = slider.querySelector('.reviews-slider-button-next');
    const prevButton = slider.querySelector('.reviews-slider-button-prev');
    const pagination = slider.querySelector('.swiper-pagination');

    new Swiper(slider, {
        slidesPerView: 1,
        spaceBetween: 10,

        // effect: 'fade',

        // fadeEffect: {
        //     crossFade: true,
        // },

        centeredSlides: true,
        loop: true,
        allowTouchMove: true,
        simulateTouch: true,

        navigation: {
            nextEl: nextButton,
            prevEl: prevButton,
        },

        pagination: {
            el: pagination,
            clickable: true,
        },
    });

});