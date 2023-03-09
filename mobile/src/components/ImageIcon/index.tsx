import React from 'react';
import {
  ImageProps,
  StyleProp,
  View,
  ViewStyle,
  Image,
  ImageSourcePropType,
  StyleSheet,
} from 'react-native';
import {getBackgroundColor} from '../../style/styles';
import {ColorType} from '../../types/propsType';

interface ImageIconProps {
  borderRadius?: number | undefined;
  wrapperColor?: ColorType | undefined;
  wrapperStyle?: StyleProp<ViewStyle> | {};
  wrapperWidth?: number | string;
  wrapperHeight?: number | string;
  iconStyle?: StyleProp<ImageProps> | {};
  iconWidth?: number | undefined;
  iconHeight?: number | undefined;
  iconSource: ImageSourcePropType;
}

const ImageIcon: React.FC<ImageIconProps> = ({
  borderRadius = 10,
  wrapperColor = 'primary',
  wrapperStyle = {},
  wrapperWidth = 85,
  wrapperHeight = 85,
  iconStyle = {},
  iconWidth = 60,
  iconHeight = 60,
  iconSource,
}) => {
  const finalWrapperStyle: StyleProp<ViewStyle> = {
    ...wrapperStyle,
    borderRadius,
    width: wrapperWidth,
    height: wrapperHeight,
    justifyContent: 'center',
    alignItems: 'center',
  };

  return (
    <View style={[finalWrapperStyle, getBackgroundColor(wrapperColor)]}>
      <Image
        style={[
          styles.defaultIconStyle,
          iconStyle,
          {width: iconWidth, height: iconHeight},
        ]}
        source={iconSource}
        resizeMethod="resize"
      />
    </View>
  );
};

const styles = StyleSheet.create({
  defaultIconStyle: {
    resizeMode: 'contain',
    alignItems: 'center',
  },
});

export default ImageIcon;
