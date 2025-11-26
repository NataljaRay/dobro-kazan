// $(document).ready(function () {
//     console.log('hello world')
// });
window.onload = (event) => {
    // console.log("page is fully loaded");
};

// const body = document.querySelector('body');
// if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//     // код для мобильных устройств
//     body.classList.add('mobile')
// } else {
//     // код для обычных устройств
// }


document.addEventListener('DOMContentLoaded', function() {

    const html = document.querySelector('html');
    // Находим элементы попапа для слайдов
    const slidePopupWrapper = document.querySelector('.slide-popup-wrapper');
    const slidePopup = document.getElementById('participation-popup');
    const slidePopupContent = slidePopup.querySelector('.map-popup__content');
    // const slidePopupList = slidePopup.querySelector('.map-popup__list');
    const slidePopupClose = slidePopup.querySelector('.map-popup__close');

    const participationBtn = document.querySelector('#participation-btn');
    // const participationIframe = document.querySelector('#participation-iframe');
    // const participationIframeCode = participationIframe.innerHTML;
    participationBtn.addEventListener('click', function(){

        // console.log(participationIframeCode)
        // const iframe = `<iframe src="https://forms.yandex.ru/u/6921bfebd046880445c04b79?iframe=1" frameborder="0" name="ya-form-6921bfebd046880445c04b79" width="650"><\/iframe>`
        // const iframe = `<iframe src="https://forms.yandex.ru/u/692738b4f47e73aa1fda3547?iframe=1" frameborder="0" name="ya-form-692738b4f47e73aa1fda3547" width="650"></iframe>`

        // slidePopupList.innerHTML = participationIframeCode;

        setTimeout(function () {
            html.classList.add('is-lock');
            slidePopupWrapper.classList.remove('slide-popup-wrapper--hidden');
        }, 200);
        setTimeout(function () {
            slidePopup.classList.remove('map-popup--hidden');
        }, 300);

        // // Закрытие попапа
        // slidePopupClose.addEventListener('click', () => {
        //     slidePopupContent.innerHTML = ''; // очищаем содержимое
        // });
        // document.body.addEventListener('click', () => {
        //     slidePopupContent.innerHTML = ''; // очищаем содержимое
        // });
    })
});


// art-carousel
$('#art-carousel').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        },
    ]
});

// guides-carousel
$('#guides-carousel').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1386,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1060,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});
// nko-carousel
$('#nko-carousel').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1386,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1060,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});

// book-carousel
$('#book-carousel').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    // fade: true,
    // cssEase: 'linear'
});

const bookCarousel = document.querySelector('#book-carousel');
const bookCarouselSlide = bookCarousel.querySelectorAll('.slick-slide');

// On before slide change - прокрутить текст наверх
$('#book-carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){

    bookCarouselSlide.forEach(item => {
        const slideId = Number(item.dataset.slickIndex);

        if (slideId === currentSlide) {
            item.querySelector('.media__txt-wrapper').scrollTop = 0;
        }
    })

});
// taste-carousel
// $('#taste-carousel').slick({
//     dots: false,
//     arrows: true,
//     infinite: true,
//     speed: 500,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     // autoplay: true,
//     autoplaySpeed: 2000,
//     // fade: true,
//     // cssEase: 'linear'
// });

// volunteers-carousel
$('#volunteers-carousel').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1386,
            settings: {
                slidesToShow: 3,
                infinite: true,
            }
        },
        {
            breakpoint: 1060,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});