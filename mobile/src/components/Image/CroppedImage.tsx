import React from 'react';
import {
  Image,
  ImageSourcePropType,
  StyleProp,
  StyleSheet,
  View,
  ViewStyle,
} from 'react-native';

interface CroppedImageProps {
  cropHeight: number | string;
  cropWidth: number | string;
  cropTop: number | string;
  cropLeft: number | string;
  width: number | string;
  height: number | string;
  source: ImageSourcePropType;
  resizeMode: 'cover' | 'contain' | 'stretch' | 'repeat' | 'center' | undefined;
  style?: StyleProp<ViewStyle>;
}

const CroppedImage: React.FC<CroppedImageProps> = ({
  cropHeight,
  cropWidth,
  cropTop,
  cropLeft,
  width,
  height,
  source,
  resizeMode,
  style,
}) => {
  return (
    <View
      style={[
        {
          overflow: 'hidden',
          height: cropHeight,
          width: cropWidth,
          backgroundColor: 'transparent',
        },
        style,
      ]}>
      <Image
        style={{
          position: 'absolute',
          top: Number(cropTop) * -1,
          left: Number(cropLeft) * -1,
          width: width,
          height: height,
        }}
        source={source}
        resizeMode={resizeMode}
        resizeMethod={'resize'}
      />
    </View>
  );
};

export default CroppedImage;
