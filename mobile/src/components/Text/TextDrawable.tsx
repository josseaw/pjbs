import React from 'react';
import {
  Image,
  ImageSourcePropType,
  StyleProp,
  StyleSheet,
  Text,
  View,
  ViewStyle,
} from 'react-native';
import theme from '../../style/theme';
import globalStyles, {getTextColor} from '../../style/styles';
import {ColorType} from '../../types/propsType';

interface TextDrawableProps {
  drawableLeft?: ImageSourcePropType | undefined;
  drawableRight?: ImageSourcePropType | undefined;
  drawableHeight?: number | string;
  drawableWidth?: number | string;
  drawableType?: 'image' | 'icon';
  text: string;
  styleContainer?: StyleProp<ViewStyle>;
  opacity?: Boolean;
  textColor?: ColorType;
  textSize?: number | string;
  bold?: Boolean;
}

const TextDrawable: React.FC<TextDrawableProps> = ({
  drawableLeft,
  drawableRight,
  text,
  styleContainer,
  opacity,
  textColor = 'secondary',
  drawableHeight = 16,
  drawableWidth = 16,
  textSize = theme.FONT_SIZE.TEXT_SMALL,
  bold = false,
}) => {
  return (
    <View style={[styles.container, styleContainer]}>
      {drawableLeft && (
        <Image
          source={drawableLeft}
          style={[styles.icon, {width: drawableWidth, height: drawableHeight}]}
        />
      )}
      <Text
        style={[
          styles.text,
          opacity ? globalStyles.opacityTertiary : globalStyles.opacityPrimary,
          getTextColor(textColor),
          {fontWeight: bold ? 'bold' : 'normal', fontSize: textSize},
        ]}>
        {text}
      </Text>
      {drawableRight && <Image source={drawableRight} style={[styles.icon]} />}
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flexDirection: 'row',
  },
  icon: {
    resizeMode: 'contain',
    alignItems: 'center',
  },
  text: {
    marginLeft: 8,
    flexGrow: 1,
    flexShrink: 1,
  },
});

export default TextDrawable;
