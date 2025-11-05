// import $ from 'jquery/src/jquery';
// import 'slick-carousel'
import './js/script';

// import "../node_modules/@fancyapps/ui/src/Fancybox/Fancybox.scss"
import '../node_modules/slick-carousel/slick/slick.scss';
import '../node_modules/slick-carousel/slick/slick-theme.scss';
import './scss/main.scss';


/* modules */
import {menuHandler} from "./js/menu-handler";
import {textAnimate} from "./js/animate";
import {yandexMap} from "./js/map";

/* init */
menuHandler();
textAnimate();
yandexMap();
