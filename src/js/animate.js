export const textAnimate = () => {

    // Находим все элементы с классом animate__animated
    const animatedHeadings = document.querySelectorAll('.animate__animated');

// Создаём observer
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Добавляем анимацию при попадании во вьюпорт
                entry.target.classList.add('animate__fadeInUp');

                // Если нужно, чтобы анимация срабатывала только один раз — отключаем наблюдение
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5 // элемент считается видимым, если 20% в области видимости
    });

// Подключаем observer ко всем заголовкам
    animatedHeadings.forEach(el => observer.observe(el));


}