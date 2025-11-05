// import $ from 'jquery/src/jquery';
// import 'slick-carousel'
// import '@yandex/ymaps3-default-ui-theme'
import './js/script';

// const {YMapPopupMarker} = await ymaps3.import('@yandex/ymaps3-default-ui-theme');

// import "../node_modules/@fancyapps/ui/src/Fancybox/Fancybox.scss"
// import "../node_modules/@yandex/ymaps3-default-ui-theme"
import '../node_modules/slick-carousel/slick/slick.scss';
import '../node_modules/slick-carousel/slick/slick-theme.scss';
import './scss/main.scss';


/* modules */
// const {YMapDefaultMarker} = await import('@yandex/ymaps3-default-ui-theme');
// import {YMapPopupMarker} from '@yandex/ymaps3-default-ui-theme';
// import {ympm} from '@yandex/ymaps3-default-ui-theme';
import {menuHandler} from "./js/menu-handler";
import {textAnimate} from "./js/animate";
// import {yandexMap} from "./js/map";
// import {yandexMap} from "./map/map4";

/* init */
menuHandler();
textAnimate();
// yandexMap();
// YMapPopupMarker();

// console.log(YMapPopupMarker)


// // src/map/map3.js
// export async function yandexMap() {
//     // Ждём загрузки ядра API
//     await ymaps3.ready;
//
//     // ✅ 1. Сначала регистрируем CDN — обязательно до любых импортов
//     // ymaps3.import.registerCdn(
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
//     //     {
//     //         packages: {
//     //             '@yandex/ymaps3-default-ui-theme': {
//     //                 version: '0.0.19',
//     //                 path: 'dist/esm/',
//     //             },
//     //         },
//     //     },
//     // );
//
//     // ✅ 2. Теперь можно использовать ymaps3.import
//     const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer } = ymaps3;
//     const { YMapPopupMarker } = await ymaps3.import('@yandex/ymaps3-default-ui-theme');
//     // const { YMapPopupMarker } = await ymaps3.import('ympm');
//
//     // ✅ 3. Создаём карту
//     const map = new YMap(document.getElementById('map'), {
//         location: {
//             center: [37.618423, 55.751244],
//             zoom: 10,
//         },
//     });
//
//     map.addChild(new YMapDefaultSchemeLayer());
//     map.addChild(new YMapDefaultFeaturesLayer());
//
//     // ✅ 4. Добавляем popup marker
//     const popup = new YMapPopupMarker(
//         { coordinates: [37.618423, 55.751244] },
//         { content: '<b>Привет, Москва!</b><br>Popup работает 🚀' },
//     );
//
//     map.addChild(popup);
// }
//
// // Для автоинициализации, если на странице есть карта
// if (document.getElementById('map')) {
//     yandexMap();
// }
// // console.log('ymaps3 version:', ymaps3);