document.addEventListener('DOMContentLoaded', () => {
    const contacts = document.querySelector('#header-contacts');
    const links = document.querySelectorAll('.main-menu a[href$="#header-contacts"]');
    const close = document.querySelector('.header-contacts__close');

    if (!contacts) return;

    // Открытие контактов
    links.forEach(link => {
        link.addEventListener('click', () => {
            contacts.classList.add('show');
            document.body.classList.add('fixed');
        });
    });

    // Закрытие по кнопке
    if (close) {
        close.addEventListener('click', () => {
            contacts.classList.remove('show');
            document.body.classList.remove('fixed');
        });
    }

    // Закрытие по клику вне контактов
    document.addEventListener('click', (event) => {
        if (
            contacts.classList.contains('show') &&
            !contacts.contains(event.target) &&
            !event.target.closest('.main-menu a[href$="#header-contacts"]')
        ) {
            contacts.classList.remove('show');
            document.body.classList.remove('fixed');
        }
    });
});