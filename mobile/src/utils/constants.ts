import {Dimensions} from 'react-native';

const {width, height} = Dimensions.get('window');

export const SCREEN_HEIGHT = height;
export const SCREEN_WIDTH = width;

export const TEXT_INPUT_HEIGHT = 150;
export const FOOTER_HEIGHT = 230;
export const LOGIN_VIEW_HEIGHT = TEXT_INPUT_HEIGHT + FOOTER_HEIGHT;

export const MAX_HEADER_HEIGHT = 120;
export const HEADER_HEIGHT = 60;
