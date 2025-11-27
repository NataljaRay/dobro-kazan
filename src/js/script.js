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

    // Находим элементы попапа для формы

    const participationPopupWrapper = document.querySelector('#participation-popup');
    const participationPopup = participationPopupWrapper.querySelector('.participation-popup');
    const participationPopupContent = participationPopupWrapper.querySelector('.map-popup__content');
    const participationPopupClose = participationPopupWrapper.querySelector('.map-popup__close');

    const participationBtn = document.querySelector('#participation-btn');

    participationBtn.addEventListener('click', function(){
        setTimeout(function () {
            html.classList.add('is-lock');
            participationPopupWrapper.classList.remove('participation-popup-wrapper--hidden');
        }, 200);
        setTimeout(function () {
            participationPopup.classList.remove('participation-popup--hidden');
        }, 300);
        participationPopupContent.scrollTop = 0;
    })

    // Закрытие попапа
    function closeParticipationPopup() {
        participationPopupWrapper.classList.add('participation-popup-wrapper--hidden');
        participationPopup.classList.add('participation-popup--hidden');
        html.classList.remove('is-lock');
    }
    participationPopupClose.addEventListener('click', () => {
        closeParticipationPopup();
    });
    participationPopup.addEventListener('click', e => e.stopPropagation());
    document.body.addEventListener('click', () => {
        closeParticipationPopup();
    });
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