document.addEventListener('DOMContentLoaded', () => {

    const scrollingBlocks = document.querySelectorAll('.scrolling-text');

    scrollingBlocks.forEach((block) => {

        const track = block.querySelector('.scrolling-text__track');
        const originalItem = track.querySelector('.scrolling-text__item');

        if (!track || !originalItem) {
            return;
        }

        // Заполняем строку элементами, пока её ширины
        // не будет достаточно для бесшовной прокрутки.
        const fillTrack = () => {

            // Оставляем только первый элемент.
            track.innerHTML = '';
            track.appendChild(originalItem);

            const itemWidth = originalItem.getBoundingClientRect().width;
            const blockWidth = block.getBoundingClientRect().width;

            if (!itemWidth) {
                return;
            }

            // Нужно как минимум заполнить 2 ширины экрана
            // + несколько дополнительных элементов.
            const count = Math.ceil((blockWidth * 2) / itemWidth) + 2;

            for (let i = 1; i < count; i++) {
                const clone = originalItem.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                track.appendChild(clone);
            }
        };

        fillTrack();

        let position = 0;
        let lastTime = performance.now();

        // Скорость в px/sec
        const speed = 30;

        const animate = (time) => {

            const delta = (time - lastTime) / 1000;
            lastTime = time;

            position -= speed * delta;

            const firstItem = track.querySelector('.scrolling-text__item');

            if (firstItem) {
                const itemWidth = firstItem.getBoundingClientRect().width;

                // Как только первый элемент полностью ушёл,
                // возвращаем его ширину.
                if (-position >= itemWidth) {
                    position += itemWidth;
                }
            }

            track.style.transform = `translate3d(${position}px, 0, 0)`;

            requestAnimationFrame(animate);
        };

        requestAnimationFrame(animate);

        // Пересобираем строку при изменении ширины экрана.
        let resizeTimer;

        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);

            resizeTimer = setTimeout(() => {
                fillTrack();
                position = 0;
                lastTime = performance.now();
                track.style.transform = 'translate3d(0, 0, 0)';
            }, 150);
        });

    });

});