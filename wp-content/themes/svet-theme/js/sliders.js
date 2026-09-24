document.querySelectorAll('.links-slider').forEach((slider) => {

    new Swiper(slider, {

        slidesPerView: 3,
        spaceBetween: 24,

        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },

            768: {
                slidesPerView: 2,
            },

            1024: {
                slidesPerView: 3,
            },
        },

    });

});

/*PROJECT SLIDER*/

document.addEventListener('DOMContentLoaded', () => {

    const projectsSlider = document.querySelector('.projects__slider');

    if (!projectsSlider) {
        return;
    }

    const swiper = new Swiper(projectsSlider, {
        slidesPerView: 1.5,
        spaceBetween: 20,

        speed: 700,

        navigation: {
            nextEl: '.projects__next',
            prevEl: '.projects__prev',
        },

        // Если слайдов меньше двух
        watchOverflow: true,

        // Адаптив
        breakpoints: {
            // 768: {
            //     spaceBetween: ,
            // },

            1200: {
                slidesPerView: 2.5,
            },
        },
    });

    const partnersSlider = document.querySelector('.partners-slider');

    if (!partnersSlider) {
        return;
    }

    new Swiper(partnersSlider, {
        slidesPerView: 2,
        spaceBetween: 20,

        navigation: {
            nextEl: '.slider__next',
            prevEl: '.slider__prev',
        },

        // pagination: {
        //     el: '.partners-slider__pagination',
        //     clickable: true,
        // },

        breakpoints: {
            576: {
                slidesPerView: 3,
            },

            768: {
                slidesPerView: 4,
            },

            1024: {
                slidesPerView: 5,
            },

            1200: {
                slidesPerView: 6,
            },
        },
    });

    const reviewsSlider = document.querySelector('.reviews-slider');

    if (reviewsSlider) {
        new Swiper(reviewsSlider, {
            slidesPerView: 1.5,
            spaceBetween: 20,

            navigation: {
                nextEl: '.slider__next',
                prevEl: '.slider__prev',
            },

            pagination: {
                el: '.reviews-slider__pagination',
                clickable: true,
            },

            breakpoints: {

                480: {
                    slidesPerView: 2.5,
                },
                768: {
                    slidesPerView: 2.5,
                },

                1200: {
                    slidesPerView: 3.2,
                }
            },
        });
    }

});


//**** ПРОЕКТЫ ****//

// document.addEventListener('DOMContentLoaded', () => {

//     Fancybox.bind('[data-fancybox]', {

//         dragToClose: false,

//         on: {

//             done: (fancybox, slide) => {

//                 const container = slide.container;

//                 if (!container) {
//                     return;
//                 }

//                 const swiperElement = container.querySelector(
//                     '.project-popup__gallery'
//                 );

//                 if (!swiperElement) {
//                     return;
//                 }

//                 // Если уже создан
//                 if (swiperElement.swiper) {
//                     swiperElement.swiper.update();
//                     swiperElement.swiper.updateSize();
//                     swiperElement.swiper.updateSlides();
//                     return;
//                 }

//                 const nextButton = swiperElement.querySelector(
//                     '.project-popup__next'
//                 );

//                 const prevButton = swiperElement.querySelector(
//                     '.project-popup__prev'
//                 );

//                 const pagination = swiperElement.querySelector(
//                     '.project-popup__pagination'
//                 );


//                 const swiper = new Swiper(swiperElement, {

//                     slidesPerView: 1,

//                     spaceBetween: 0,

//                     loop: true,

//                     grabCursor: true,

//                     watchSlidesProgress: true,

//                     observer: true,

//                     observeParents: true,

//                     navigation: {
//                         nextEl: nextButton,
//                         prevEl: prevButton,
//                     },

//                     pagination: {
//                         el: pagination,
//                         clickable: true,
//                     },

//                     breakpoints: {

//                         768: {
//                             slidesPerView: 2,
//                         },

//                         1024: {
//                             slidesPerView: 3,
//                         },

//                     },

//                 });


//                 // После полной отрисовки Fancybox
//                 requestAnimationFrame(() => {

//                     swiper.update();
//                     swiper.updateSize();
//                     swiper.updateSlides();

//                 });

//             },

//         },

//     });

// });



document.addEventListener('DOMContentLoaded', function () {

    let activeSwiper = null;
    let activeModal = null;


    /*
     * ==========================================================
     * ОТКРЫТИЕ PROJECT POPUP
     * ==========================================================
     */

    document.addEventListener('click', function (event) {

        const link = event.target.closest('.project-item__link');

        if (!link) {
            return;
        }

        event.preventDefault();

        const projectId = link.dataset.projectId;

        if (!projectId) {
            return;
        }

        const modal = document.getElementById(
            `modal-${projectId}`
        );

        if (!modal) {
            return;
        }


        /*
         * Если уже открыт другой popup —
         * сначала закрываем его.
         */

        if (activeModal && activeModal !== modal) {
            closeModal();
        }


        /*
         * Открываем нужный popup
         */

        activeModal = modal;

        modal.hidden = false;

        document.body.classList.add('project-popup-open');


        /*
         * Даём браузеру отрисовать popup,
         * после чего создаём Swiper.
         */

        requestAnimationFrame(function () {

            const gallery = modal.querySelector(
                '.project-popup__gallery'
            );


            /*
             * У проекта может не быть галереи.
             * В этом случае просто ничего не делаем.
             */

            if (!gallery) {
                activeSwiper = null;
                return;
            }


            /*
             * Если Swiper уже был создан —
             * просто обновляем его.
             */

            if (gallery.swiper) {

                gallery.swiper.update();

                activeSwiper = gallery.swiper;

                return;
            }


            /*
             * Создаём Swiper
             */

            activeSwiper = new Swiper(gallery, {

                slidesPerView: 1,

                spaceBetween: 20,

                loop: false,

                grabCursor: true,

                preventClicks: true,
                preventClicksPropagation: true,


                navigation: {

                    nextEl: gallery.querySelector(
                        '.project-popup__next'
                    ),

                    prevEl: gallery.querySelector(
                        '.project-popup__prev'
                    ),

                },


                pagination: {

                    el: gallery.querySelector(
                        '.project-popup__pagination'
                    ),

                    clickable: true,

                },


                breakpoints: {

                    768: {
                        slidesPerView: 2,
                    },

                    1024: {
                        slidesPerView: 3.2,
                    },

                    1200: {
                        slidesPerView: 4.2,
                    },

                },

            });

        });

    });


    /*
     * ==========================================================
     * ЗАКРЫТИЕ ПО КНОПКЕ
     * ==========================================================
     */

    document.addEventListener('click', function (event) {

        const closeButton = event.target.closest(
            '.gallery-modal__close'
        );

        if (!closeButton) {
            return;
        }

        closeModal();

    });


    /*
     * ==========================================================
     * КЛИК ПО ФОНУ
     * ==========================================================
     */

    document.addEventListener('click', function (event) {

        if (!activeModal) {
            return;
        }

        if (
            event.target.classList.contains(
                'gallery-modal__overlay'
            )
        ) {
            closeModal();
        }

    });


    /*
     * ==========================================================
     * ESC
     * ==========================================================
     */

    document.addEventListener('keydown', function (event) {

        if (event.key !== 'Escape') {
            return;
        }

        if (!activeModal) {
            return;
        }

        closeModal();

    });


    /*
     * ==========================================================
     * ЗАКРЫТИЕ POPUP
     * ==========================================================
     */

    function closeModal() {

        if (!activeModal) {
            return;
        }


        /*
         * Скрываем popup
         */

        activeModal.hidden = true;


        /*
         * Убираем блокировку body
         */

        document.body.classList.remove(
            'project-popup-open'
        );


        /*
         * Сбрасываем ссылки на активные элементы
         */

        activeModal = null;

        activeSwiper = null;

    }

});
