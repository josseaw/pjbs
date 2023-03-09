import React from 'react';
import {Animated, StyleProp, StyleSheet, View, ViewStyle} from 'react-native';
import WavySvg from '../../assets/svg/WavySvg';
import {HEADER_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';
import Logo from '../Logo';

interface AnimatedWaveProps {
  styleWrapper?: StyleProp<ViewStyle>;
  scrollY: Animated.Value;
  height?: Boolean;
}

const AnimatedWave: React.FC<AnimatedWaveProps> = ({
  styleWrapper,
  scrollY,
  height,
}) => {
  const scrollLogoPage = scrollY.interpolate({
    inputRange: [0, 60],
    outputRange: [1, 0.7],
    extrapolate: 'clamp',
  });

  const scrollWave = scrollY.interpolate({
    inputRange: [0, 100],
    outputRange: [1, 0.7],
    extrapolate: 'clamp',
  });

  return (
    <Animated.View style={[styleWrapper]}>
      <Animated.View style={[{transform: [{scale: scrollWave}]}]}>
        <WavySvg width={SCREEN_WIDTH} yPosition={154} />
      </Animated.View>
      <Animated.View
        style={[
          {
            transform: [{scale: scrollLogoPage}],
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

export default AnimatedWave;
