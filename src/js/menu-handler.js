export const menuHandler = () => {
    // console.log('перепиши на чистом JS!!!');
    // const burgerBtn = document.querySelector('#burger-button');
    // const menuDialog = document.querySelector('#menu-dialog');
    //
    // burgerBtn.addEventListener('click', () => {
    //     burgerBtn.classList.toggle('is-active');
    //     menuDialog.toggleAttribute('open');
    // })
}
// export const menuHandler = () => {
//
//     var sections = $('.anchor')
//         , nav = $('nav');
//
//     // function detectAnchors(){}
//
//     $(window).on('load', function () {
//         var cur_pos = $(this).scrollTop();
//
//         sections.each(function() {
//             var top = $(this).offset().top - 2;
//             var   bottom = top + $(this).outerHeight();
//
//             if (cur_pos >= top && cur_pos <= bottom) {
//                 nav.find('a').parent().removeClass('active');
//                 sections.removeClass('active');
//
//                 $(this).addClass('active');
//                 nav.find('a[href="#'+$(this).attr('id')+'"]').parent().addClass('active');
//             }
//         });
//     });
//     $(window).on('scroll', function () {
//         var cur_pos = $(this).scrollTop();
//
//         sections.each(function() {
//             var top = $(this).offset().top - 2;
//             var   bottom = top + $(this).outerHeight();
//
//             if (cur_pos >= top && cur_pos <= bottom) {
//                 nav.find('a').parent().removeClass('active');
//                 sections.removeClass('active');
//
//                 $(this).addClass('active');
//                 nav.find('a[href="#'+$(this).attr('id')+'"]').parent().addClass('active');
//             }
//         });
//     });
//
//     nav.find('a').on('click', function () {
//         var $el = $(this)
//             , id = $el.attr('href');
//
//         // var topOffset;
//         // if (id === "#contacts" && window.innerWidth >= 1440) {
//         //     topOffset = $(id).offset().top + 400;
//         // } else {
//         //     topOffset = $(id).offset().top + 1;
//         // }
//
//         $('html, body').animate({
//             scrollTop: $(id).offset().top
//             // scrollTop: topOffset
//         }, 500);
//
//         return false;
//     });
//
// }