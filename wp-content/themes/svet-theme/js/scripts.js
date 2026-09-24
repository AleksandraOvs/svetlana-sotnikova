document.addEventListener('DOMContentLoaded', function () {

    const toggleButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.mobile-menu');
    const closeButton = document.querySelector('.collapse-menu-button');


    if (!toggleButton || !menu) {
        console.log('Каталог: элементы не найдены');
        return;
    }

    // Открытие / закрытие
    toggleButton.addEventListener('click', function (event) {

        event.stopPropagation();

        menu.classList.toggle('show');
        toggleButton.classList.toggle('active');

    });


    // Закрытие по крестику
    if (closeButton) {
        closeButton.addEventListener('click', function (event) {

            event.stopPropagation();

            menu.classList.remove('show');
            toggleButton.classList.remove('active');

        });
    }


    // Закрытие при клике на ссылку
    const menuLinks = menu.querySelectorAll('a');

    menuLinks.forEach(function (link) {

        link.addEventListener('click', function () {

            menu.classList.remove('show');
            toggleButton.classList.remove('active');

        });

    });


    // Закрытие при клике вне меню
    document.addEventListener('click', function (event) {

        if (
            menu.classList.contains('show') &&
            !menu.contains(event.target) &&
            !toggleButton.contains(event.target)
        ) {
            menu.classList.remove('show');
            toggleButton.classList.remove('active');
        }

    });

});