import React from 'react';
import {StyleProp, StyleSheet, View, ViewStyle} from 'react-native';
import WavySvg from '../../assets/svg/WavySvg';
import {HEADER_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';
import Logo from '../Logo';

import Animated, {interpolate, Extrapolate} from 'react-native-reanimated';

interface AnimatedWaveReanimatedProps {
  styleWrapper?: StyleProp<ViewStyle>;
  scrollY: Animated.Value<number>;
  height?: Boolean;
}

const AnimatedWaveReanimated: React.FC<AnimatedWaveReanimatedProps> = ({
  styleWrapper,
  scrollY,
}) => {
  const opacity = interpolate(scrollY, {
    inputRange: [0, 120],
    outputRange: [1, 0],
    extrapolate: Extrapolate.CLAMP,
  });

  const scrollWave = interpolate(scrollY, {
    inputRange: [0, 200],
    outputRange: [1, 0.2],
    extrapolate: Extrapolate.CLAMP,
  });

  const translateY = interpolate(scrollY, {
    inputRange: [0, 200],
    outputRange: [0, -100],
    extrapolate: Extrapolate.CLAMP,
  });

  const scale = interpolate(scrollY, {
    inputRange: [0, 180],
    outputRange: [1, 0.6],
    extrapolate: Extrapolate.CLAMP,
  });

  return (
    <Animated.View style={[styleWrapper]}>
      <Animated.View style={[{transform: [{scale: scrollWave}]}]}>
        <WavySvg width={SCREEN_WIDTH} yPosition={154} />
      </Animated.View>
      <Animated.View
        style={[
          {
            transform: [{translateY}, {scale}],
            opacity,
          },
          styles.logo,
        ]}>
        <Logo transparent={true} />
      </Animated.View>
    </Animated.View>
  );
};

const styles = StyleSheet.create({
  logo: {width: SCREEN_WIDTH, alignItems: 'center', marginTop: 60},
});

export default AnimatedWaveReanimated;
