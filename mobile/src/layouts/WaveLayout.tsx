import React from 'react';
import {
  StatusBar,
  View,
  ImageSourcePropType,
  Dimensions,
  Animated,
  ScrollView,
  StyleSheet,
  GestureResponderEvent,
} from 'react-native';
import Background from '../components/Background';
import HeaderLogo from '../components/Header/HeaderLogo';
import theme from '../style/theme';
import WavySvg from '../assets/svg/WavySvg';
import Logo from '../components/Logo';

interface WaveLayoutProps {
  iconLeft?: ImageSourcePropType | undefined;
  iconRight?: ImageSourcePropType | undefined;
  onPressIconLeft?: (event: GestureResponderEvent) => void;
  onPressIconRight?: (event: GestureResponderEvent) => void;
}

const WaveLayout: React.FC<WaveLayoutProps> = ({
  children,
  iconLeft,
  iconRight,
  onPressIconLeft,
  onPressIconRight,
}) => {
  const scrollY = new Animated.Value(0);

  const scaleLogo = scrollY.interpolate({
    inputRange: [0, 60],
    outputRange: [0, 0.7],
    extrapolate: 'clamp',
  });

  const scrollLogoPage = scrollY.interpolate({
    inputRange: [0, 60],
    outputRange: [1, 0.7],
    extrapolate: 'clamp',
  });

  const scrollWave = scrollY.interpolate({
    inputRange: [0, 100],
    outputRange: [1, 0.8],
    extrapolate: 'clamp',
  });

  return (
    <>
      <StatusBar barStyle="dark-content" backgroundColor={theme.COLOR.WHITE} />
      <Background type="primary">
        <HeaderLogo
          iconLeft={iconLeft}
          iconRight={iconRight}
          onPressIconLeft={onPressIconLeft}
          onPressIconRight={onPressIconRight}
          scaleLogo={scaleLogo}
        />
        <ScrollView
          onScroll={(e) => {
            scrollY.setValue(e.nativeEvent.contentOffset.y);
          }}
          scrollEventThrottle={1}
          showsVerticalScrollIndicator={false}>
          <Animated.View style={{transform: [{scale: scrollWave}]}}>
            <WavySvg width={Dimensions.get('window').width} />
          </Animated.View>
          <Animated.View
            style={[{transform: [{scale: scrollLogoPage}]}, styles.logoPage]}>
            <Logo transparent={true} />
          </Animated.View>
          <View style={styles.content}>{children}</View>
        </ScrollView>
      </Background>
    </>
  );
};

const styles = StyleSheet.create({
  logoPage: {
    width: Dimensions.get('window').width,
    flexDirection: 'row',
    justifyContent: 'center',
    marginTop: 60,
    zIndex: 81,
  },
  content: {
    flex: 1,
    paddingHorizontal: 16,
    paddingTop: 44,
    paddingBottom: 16,
  },
});

export default WaveLayout;
