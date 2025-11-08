import type {LngLat, YMapLocationRequest} from '@yandex/ymaps3-types';
import type {YMapDefaultMarkerProps} from '@yandex/ymaps3-default-ui-theme';

export const LOCATION: YMapLocationRequest = {
    center: [49.145081, 55.806951],
    zoom: 13
};

export const FIRST_MARKER_PROPS: {iconName: YMapDefaultMarkerProps['iconName']; coordinates: LngLat} = {
    // iconName: 'star',
    coordinates: [49.120607, 55.822028]
};
export const SECOND_MARKER_PROPS: {iconName: YMapDefaultMarkerProps['iconName']; coordinates: LngLat} = {
    // iconName: 'star',
    coordinates: [49.173725, 55.797217]
};
