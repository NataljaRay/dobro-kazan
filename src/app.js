// // import $ from 'jquery/src/jquery';
// import 'slick-carousel'
// import './js/script';
//
// // import "../node_modules/@fancyapps/ui/src/Fancybox/Fancybox.scss"
// console.log("APP LOADED");

import '../node_modules/slick-carousel/slick/slick.scss';
import '../node_modules/slick-carousel/slick/slick-theme.scss';
import './scss/main.scss';
//
//
// /* modules */
// import {menuHandler} from "./js/menu-handler";
// import {textAnimate} from "./js/animate";
// import {slidePopupHandler} from './js/slide-popup-nko';
//
// /* init */
// menuHandler();
// textAnimate();
// slidePopupHandler();

import "./js/script";
import { menuHandler } from "./js/menu-handler";
import { textAnimate } from "./js/animate";
import { slidePopupHandler } from "./js/slide-popup-nko";

document.addEventListener("DOMContentLoaded", () => {
    menuHandler();
    textAnimate();
    slidePopupHandler();
});
