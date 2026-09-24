document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('[data-scroll-animation]');

    if (!animatedElements.length) return;

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add('is-visible');

                // Если нужно анимировать только один раз
                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px',
        }
    );

    animatedElements.forEach((element) => {
        observer.observe(element);
    });

    /*
     * ========================================
     * Анимация чисел
     * ========================================
     */

    const numberElements = document.querySelectorAll('.js-anim-numbers');

    if (numberElements.length) {

        const numberObserver = new IntersectionObserver(
            (entries, observer) => {

                entries.forEach((entry) => {

                    if (!entry.isIntersecting) return;

                    const element = entry.target;
                    const target = parseInt(element.dataset.number, 10);

                    if (isNaN(target)) {
                        observer.unobserve(element);
                        return;
                    }

                    const duration = 1500;
                    const startTime = performance.now();

                    const animateNumber = (currentTime) => {

                        const progress = Math.min(
                            (currentTime - startTime) / duration,
                            1
                        );

                        // Плавное замедление в конце
                        const easeOut = 1 - Math.pow(1 - progress, 3);

                        const currentNumber = Math.floor(target * easeOut);

                        element.textContent = currentNumber;

                        if (progress < 1) {
                            requestAnimationFrame(animateNumber);
                        } else {
                            element.textContent = target;
                        }
                    };

                    requestAnimationFrame(animateNumber);

                    observer.unobserve(element);
                });

            },
            {
                threshold: 0.5,
            }
        );

        numberElements.forEach((element) => {
            numberObserver.observe(element);
        });

    }


    /*
     * ========================================
     * Кнопка "Наверх"
     * ========================================
     */

    const scrollTopButton = document.querySelector('.scroll-top');

    if (scrollTopButton) {
        const toggleScrollTopButton = () => {
            if (window.scrollY > window.innerHeight) {
                scrollTopButton.classList.add('is-visible');
            } else {
                scrollTopButton.classList.remove('is-visible');
            }
        };

        window.addEventListener('scroll', toggleScrollTopButton, {
            passive: true
        });

        // Проверяем состояние сразу при загрузке
        toggleScrollTopButton();

        // Плавный скролл наверх
        scrollTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /* * ======================================== * Header при скролле * ======================================== */
    const header = document.querySelector('.header'); if (header) {
        const toggleHeaderScroll = () => {
            if (window.scrollY > 300) {
                header.classList.add('scroll');
            } else {
                header.classList.remove('scroll');
            }
        };
        window.addEventListener('scroll', toggleHeaderScroll, {
            passive: true
        });

        // Проверяем состояние сразу при загрузке 
        toggleHeaderScroll();
    }


});