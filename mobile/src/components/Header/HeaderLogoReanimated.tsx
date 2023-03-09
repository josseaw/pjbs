import React from 'react';
import {
  StyleSheet,
  View,
  Image,
  ImageSourcePropType,
  StyleProp,
  ImageStyle,
  GestureResponderEvent,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import Logo from '../Logo';
import Animated, {Extrapolate, interpolate} from 'react-native-reanimated';

import globalStyles from '../../style/styles';

interface HeaderLogoReanimatedProps {
  iconLeft?: ImageSourcePropType | undefined;
  iconRight?: ImageSourcePropType | undefined;
  notifLeft?: number | undefined;
  notifRight?: number | undefined;
  stylesIconLeft?: StyleProp<ImageStyle>;
  stylesIconRight?: StyleProp<ImageStyle>;
  onPressIconLeft?: (event: GestureResponderEvent) => void;
  onPressIconRight?: (event: GestureResponderEvent) => void;
  scrollY: Animated.Value<number>;
}

const HeaderLogoReanimated: React.FC<HeaderLogoReanimatedProps> = ({
  iconLeft,
  iconRight,
  stylesIconLeft,
  stylesIconRight,
  onPressIconLeft,
  onPressIconRight,
  scrollY,
}) => {
  const scaleLogo = interpolate(scrollY, {
    inputRange: [0, 60],
    outputRange: [0, 0.7],
    extrapolate: Extrapolate.CLAMP,
  });
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

export default HeaderLogoReanimated;
