// $(document).ready(function () {
//     console.log('hello world')
// });
window.onload = (event) => {
    console.log("page is fully loaded");
};

const body = document.querySelector('body');
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    // код для мобильных устройств
    body.classList.add('mobile')
} else {
    // код для обычных устройств
}

// /**
//  * platform
//  * **/
// // platform animation
// const platformList = $( ".section--music .platforms .platforms__item" );
// let delay = 0;
// function cicle (num) {
//     for (let i = num; i < platformList.length; i++) {
//         checker( platformList[i], delay );
//         delay += 2000;
//         // if (array.length - i === 1) cicle();
//     }
// }
// function checker (elem, delay) {
//     setTimeout( function() {
//         $(elem).addClass('animated');
//     }, delay + 1500);
//     setTimeout(function () {
//         $(elem).addClass('animated').siblings().removeClass('animated');
//     }, delay + 3000)
// }

// platform in viewport
// Получаем нужный элемент
// var platforms = document.querySelector('.section--music .platforms');
// /** footer **/
// var sectionMainSocials = document.querySelector('.section--main .intro');
// var footer = document.querySelector('.footer');
//
// var Visible = function (target) {
//     // Все позиции элемента
//     var targetPosition = {
//             top: window.pageYOffset + target.getBoundingClientRect().top,
//             left: window.pageXOffset + target.getBoundingClientRect().left,
//             right: window.pageXOffset + target.getBoundingClientRect().right,
//             bottom: window.pageYOffset + target.getBoundingClientRect().bottom
//         },
//         // Получаем позиции окна
//         windowPosition = {
//             top: window.pageYOffset,
//             left: window.pageXOffset,
//             right: window.pageXOffset + document.documentElement.clientWidth,
//             bottom: window.pageYOffset + document.documentElement.clientHeight
//         };
//
//     if (targetPosition.bottom > windowPosition.top && // Если позиция нижней части элемента больше позиции верхней чайти окна, то элемент виден сверху
//         targetPosition.top < windowPosition.bottom && // Если позиция верхней части элемента меньше позиции нижней чайти окна, то элемент виден снизу
//         targetPosition.right > windowPosition.left && // Если позиция правой стороны элемента больше позиции левой части окна, то элемент виден слева
//         targetPosition.left < windowPosition.right) { // Если позиция левой стороны элемента меньше позиции правой чайти окна, то элемент виден справа
//         // Если элемент полностью видно, то запускаем следующий код
//         // console.clear();
//         // console.log('Вы видите элемент :)');
//         if(target === platforms && platforms){
//             cicle(0)
//         }
//         if(target === sectionMainSocials && sectionMainSocials){
//             footer.classList.remove('active')
//         }
//     } else {
//         if(target === sectionMainSocials && sectionMainSocials){
//             footer.classList.add('active')
//         }
//         // Если элемент не видно, то запускаем этот код
//         // console.clear();
//     };
// };

// Запускаем функцию при прокрутке страницы
window.addEventListener('scroll', function() {
    // Visible (platforms);
    // Visible (sectionMainSocials);
});

// А также запустим функцию сразу. А то вдруг, элемент изначально видно
// Visible (platforms);
// Visible (sectionMainSocials);


/* check inputs */
var fields = document.querySelectorAll('.form-field');
fields.forEach(field => {
    field.addEventListener('change',function(e){
        var value = field.value;
        if (value != '') {
            field.classList.add('done')
        } else {
            field.classList.remove('done')
        }
    }, true);
})

/* textarea auto resize */
const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
    // tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
    tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px");
    tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
    this.style.height = 0;
    this.style.height = (this.scrollHeight) + "px";
}

/* кнопка наверх */
// document.querySelector('.to-top').onclick = () => {
//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth'
//     });
// }