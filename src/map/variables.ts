import type {LngLat, YMapLocationRequest} from '@yandex/ymaps3-types';
import type {YMapDefaultMarkerProps} from '@yandex/ymaps3-default-ui-theme';

export const LOCATION: YMapLocationRequest = {
    // center: [39.7112, 43.5797], // starting position [lng, lat]
    // zoom: 14.5 // starting zoom

    // center: [49.130081, 55.819951],
    center: [49.145081, 55.806951],
    // zoom: 13
    zoom: 12
};

export const FIRST_MARKER_PROPS: {iconName: YMapDefaultMarkerProps['iconName']; coordinates: LngLat} = {
    // iconName: 'star',
    iconName: 'none',
    coordinates: [49.120607, 55.822028]
};
export const SECOND_MARKER_PROPS: {iconName: YMapDefaultMarkerProps['iconName']; coordinates: LngLat} = {
    // iconName: 'waterpark',
    iconName: 'star',
    coordinates: [49.173725, 55.797217]
};
