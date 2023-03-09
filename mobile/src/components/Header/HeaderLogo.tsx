import React from 'react';
import {
  StyleSheet,
  View,
  Image,
  ImageSourcePropType,
  StyleProp,
  ImageStyle,
  GestureResponderEvent,
  Animated,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import Logo from '../Logo';

import globalStyles from '../../style/styles';

interface HeaderLogoProps {
  iconLeft?: ImageSourcePropType | undefined;
  iconRight?: ImageSourcePropType | undefined;
  notifLeft?: number | undefined;
  notifRight?: number | undefined;
  stylesIconLeft?: StyleProp<ImageStyle>;
  stylesIconRight?: StyleProp<ImageStyle>;
  onPressIconLeft?: (event: GestureResponderEvent) => void;
  onPressIconRight?: (event: GestureResponderEvent) => void;
  scaleLogo: Animated.AnimatedInterpolation;
}

const HeaderLogo: React.FC<HeaderLogoProps> = ({
  iconLeft,
  iconRight,
  stylesIconLeft,
  stylesIconRight,
  onPressIconLeft,
  onPressIconRight,
  scaleLogo,
}) => {
  return (
    <View
      style={[
        globalStyles.headerContainer,
        StyleSheet.absoluteFill,
        globalStyles.toUpper,
        globalStyles.bgWhite,
      ]}>
      {iconLeft && (
        <TouchableOpacity onPress={onPressIconLeft}>
          <Image
            source={iconLeft}
            style={[globalStyles.icon, stylesIconLeft]}
          />
        </TouchableOpacity>
      )}

      <Animated.View
        style={{
          transform: [{scale: scaleLogo}],
        }}>
        <Logo transparent={true} />
      </Animated.View>

      {iconRight && (
        <TouchableOpacity onPress={onPressIconRight}>
          <Image
            source={iconRight}
            style={[globalStyles.icon, stylesIconRight]}
          />
        </TouchableOpacity>
      )}
    </View>
  );
};

export default HeaderLogo;
