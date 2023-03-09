import {StyleSheet} from 'react-native';
import {HEADER_HEIGHT} from '../utils/constants';
import theme from './theme';

const globalStyles = StyleSheet.create({
  titlePageLarge: {
    fontSize: theme.FONT_SIZE.TITLE_PAGE_LARGE,
  },
  titlePageMedium: {
    fontSize: theme.FONT_SIZE.TITLE_PAGE_MEDIUM,
  },
  titlePageSmall: {
    fontSize: theme.FONT_SIZE.TITLE_PAGE_SMALL,
  },
  titleNormalLarge: {
    fontSize: theme.FONT_SIZE.TITLE_LARGE,
  },
  titleNormalMedium: {
    fontSize: theme.FONT_SIZE.TITLE_MEDIUM,
  },
  titleNormalSmall: {
    fontSize: theme.FONT_SIZE.TITLE_SMALL,
  },
  textBold: {
    fontWeight: 'bold',
  },
  textNormal: {
    fontWeight: '400',
  },
  textLight: {
    fontWeight: '200',
  },
  textPrimary: {
    color: theme.COLOR.PRIMARY,
  },
  textPrimaryLight: {
    color: theme.COLOR.PRIMARY_LIGHT,
  },
  textPrimaryDark: {
    color: theme.COLOR.PRIMARY_DARK,
  },
  textSecondary: {
    color: theme.COLOR.SECONDARY,
  },
  textSuccess: {
    color: theme.COLOR.SUCCESS,
  },
  textWarning: {
    color: theme.COLOR.WARNING,
  },
  textDanger: {
    color: theme.COLOR.DANGER,
  },
  textGrayDark: {
    color: theme.COLOR.GRAY_DARK,
  },
  textGrayLight: {
    color: theme.COLOR.GRAY_LIGHT,
  },
  textWhite: {
    color: theme.COLOR.WHITE,
  },
  bgPrimary: {
    backgroundColor: theme.COLOR.PRIMARY,
  },
  bgPrimaryLight: {
    backgroundColor: theme.COLOR.PRIMARY_LIGHT,
  },
  bgPrimaryDark: {
    backgroundColor: theme.COLOR.PRIMARY_DARK,
  },
  bgSecondary: {
    backgroundColor: theme.COLOR.SECONDARY,
  },
  bgSuccess: {
    backgroundColor: theme.COLOR.SUCCESS,
  },
  bgWarning: {
    backgroundColor: theme.COLOR.WARNING,
  },
  bgDanger: {
    backgroundColor: theme.COLOR.DANGER,
  },
  bgGrayDark: {
    backgroundColor: theme.COLOR.GRAY_DARK,
  },
  bgGrayLight: {
    backgroundColor: theme.COLOR.GRAY_LIGHT,
  },
  bgWhite: {
    backgroundColor: theme.COLOR.WHITE,
  },
  opacityPrimary: {
    opacity: theme.OPACITY.PRIMARY,
  },
  opacitySecondary: {
    opacity: theme.OPACITY.SECONDARY,
  },
  opacityTertiary: {
    opacity: theme.OPACITY.TERTIARY,
  },
  icon: {
    height: 24,
    width: 24,
    resizeMode: 'contain',
    alignItems: 'center',
  },
  headerContainer: {
    flexDirection: 'row',
    height: HEADER_HEIGHT,
    paddingHorizontal: 16,
    alignItems: 'center',
    justifyContent: 'space-between',
  },
  toUpper: {zIndex: 999},
});

export const getTextColor = (color: string) => {
  let styleColor = {};

  switch (color) {
    case 'primary':
      styleColor = globalStyles.textPrimary;
      break;
    case 'primaryLight':
      styleColor = globalStyles.textPrimaryLight;
      break;
    case 'primaryDark':
      styleColor = globalStyles.textPrimaryDark;
      break;
    case 'secondary':
      styleColor = globalStyles.textSecondary;
      break;
    case 'success':
      styleColor = globalStyles.textSuccess;
      break;
    case 'warning':
      styleColor = globalStyles.textWarning;
      break;
    case 'danger':
      styleColor = globalStyles.textDanger;
      break;
    case 'grayLight':
      styleColor = globalStyles.textGrayLight;
      break;
    case 'grayDark':
      styleColor = globalStyles.textGrayDark;
      break;
    case 'white':
      styleColor = globalStyles.textWhite;
      break;

    default:
      styleColor = globalStyles.textPrimary;
      break;
  }

  return styleColor;
};

export const getBackgroundColor = (color: string) => {
  let styleColor = {};

  switch (color) {
    case 'primary':
      styleColor = globalStyles.bgPrimary;
      break;
    case 'primaryLight':
      styleColor = globalStyles.bgPrimaryLight;
      break;
    case 'primaryDark':
      styleColor = globalStyles.bgPrimaryDark;
      break;
    case 'secondary':
      styleColor = globalStyles.bgSecondary;
      break;
    case 'success':
      styleColor = globalStyles.bgSuccess;
      break;
    case 'warning':
      styleColor = globalStyles.bgWarning;
      break;
    case 'danger':
      styleColor = globalStyles.bgDanger;
      break;
    case 'grayLight':
      styleColor = globalStyles.bgGrayLight;
      break;
    case 'grayDark':
      styleColor = globalStyles.bgGrayDark;
      break;
    case 'white':
      styleColor = globalStyles.bgWhite;
      break;

    default:
      styleColor = globalStyles.bgPrimary;
      break;
  }

  return styleColor;
};

export const getColor = (color: string): string => {
  let styleColor = '';
  switch (color) {
    case 'primary':
      styleColor = theme.COLOR.PRIMARY;
      break;
    case 'primaryLight':
      styleColor = theme.COLOR.PRIMARY_LIGHT;
      break;
    case 'primaryDark':
      styleColor = theme.COLOR.PRIMARY_DARK;
      break;
    case 'secondary':
      styleColor = theme.COLOR.SECONDARY;
      break;
    case 'success':
      styleColor = theme.COLOR.SUCCESS;
      break;
    case 'warning':
      styleColor = theme.COLOR.WARNING;
      break;
    case 'danger':
      styleColor = theme.COLOR.DANGER;
      break;
    case 'grayLight':
      styleColor = theme.COLOR.GRAY_LIGHT;
      break;
    case 'grayDark':
      styleColor = theme.COLOR.GRAY_DARK;
      break;
    case 'white':
      styleColor = theme.COLOR.WHITE;
      break;

    default:
      styleColor = theme.COLOR.PRIMARY;
      break;
  }

  return styleColor;
};

export default globalStyles;
