import React from 'react';
import {Animated, TextProps, TextStyle} from 'react-native';
import styles, {getTextColor} from '../../style/styles';
import {
  ColorType,
  SizeText,
  WeightText,
  OpacityType,
} from '../../types/propsType';

type TypeTitle = 'normal' | 'page';

interface TextTitleProps {
  type?: TypeTitle;
  size?: SizeText;
  weight?: WeightText;
  opacity?: OpacityType;
  color?: ColorType;
  style?: Animated.WithAnimatedObject<TextStyle> | {};
  textAlign?: 'auto' | 'left' | 'right' | 'center' | 'justify' | undefined;
}

type TextTitleType = TextProps & TextTitleProps;

const TextTitle: React.FC<TextTitleType> = ({
  color = 'primary',
  type = 'normal',
  size = 'medium',
  weight = 'normal',
  opacity = 'primary',
  style,
  children,
  textAlign = 'left',
  ...other
}) => {
  let className = [];

  if (type === 'page') {
    if (size === 'large') {
      className.push(styles.titlePageLarge);
    } else if (size === 'small') {
      className.push(styles.titlePageSmall);
    } else {
      className.push(styles.titlePageMedium);
    }
  } else {
    if (size === 'large') {
      className.push(styles.titleNormalLarge);
    } else if (size === 'small') {
      className.push(styles.titleNormalSmall);
    } else {
      className.push(styles.titleNormalMedium);
    }
  }

  if (weight === 'bold') {
    className.push(styles.textBold);
  } else if (weight === 'light') {
    className.push(styles.textLight);
  } else {
    className.push(styles.textNormal);
  }

  if (opacity === 'secondary') {
    className.push(styles.opacitySecondary);
  } else if (opacity === 'tertiary') {
    className.push(styles.opacityTertiary);
  } else {
    className.push(styles.opacityPrimary);
  }

  className.push(getTextColor(color));

  return (
    <Animated.Text {...other} style={[className, style, {textAlign}]}>
      {children}
    </Animated.Text>
  );
};

export default TextTitle;
