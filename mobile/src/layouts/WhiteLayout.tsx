import React from 'react';
import {StatusBar, StyleSheet, Text, View} from 'react-native';
import Background from '../components/Background';
import TextTitle from '../components/Text/TextTitle';
import theme from '../style/theme';

import {MAX_HEADER_HEIGHT, HEADER_HEIGHT} from '../utils/constants';
import HeaderTitle, {HeaderTitleProps} from '../components/Header/HeaderTitle';
import {RiwayatIcon} from '../assets/icons';

import Animated, {Extrapolate, interpolate} from 'react-native-reanimated';

interface WhiteLayoutProps {
  title: string;
  scrollY: Animated.Value<number>;
  noIllustration?: boolean;
}

type WhiteLayoutType = WhiteLayoutProps & HeaderTitleProps;

const WhiteLayout: React.FC<WhiteLayoutType> = ({
  children,
  iconLeft,
  iconRight,
  stylesIconLeft,
  stylesIconRight,
  onPressIconLeft,
  onPressIconRight,
  title = '',
  scrollY,
  noIllustration = false,
}) => {
  const headerHeight = interpolate(scrollY, {
    inputRange: [0, 350],
    outputRange: [MAX_HEADER_HEIGHT, HEADER_HEIGHT],
    extrapolate: Extrapolate.CLAMP,
  });

  const fontSize = interpolate(scrollY, {
    inputRange: [0, 200],
    outputRange: [
      theme.FONT_SIZE.TITLE_PAGE_MEDIUM,
      theme.FONT_SIZE.TITLE_PAGE_SMALL,
    ],
    extrapolate: Extrapolate.CLAMP,
  });

  const opacity = interpolate(scrollY, {
    inputRange: [0, 280, 281],
    outputRange: [1, 0.8, 0],
    extrapolate: Extrapolate.CLAMP,
  });

  const translateY = interpolate(scrollY, {
    inputRange: [0, 300],
    outputRange: [0, -10],
    extrapolate: Extrapolate.CLAMP,
  });

  return (
    <>
      <StatusBar barStyle="dark-content" backgroundColor={theme.COLOR.WHITE} />
      <Background type="secondary" noIllustration={noIllustration}>
        <Animated.View style={[styles.heroContainer, {height: headerHeight}]}>
          <HeaderTitle
            iconLeft={iconLeft}
            iconRight={iconRight}
            onPressIconLeft={onPressIconLeft}
            onPressIconRight={onPressIconRight}
            stylesIconLeft={stylesIconLeft}
            stylesIconRight={stylesIconRight}
            title={title}
            scrollY={scrollY}
          />
          <Animated.Text
            style={[
              {
                transform: [{translateY}],
                opacity,
                fontSize,
              },
              styles.titleHero,
            ]}>
            {title}
          </Animated.Text>
        </Animated.View>

        <View style={styles.content}>{children}</View>
      </Background>
    </>
  );
};

const styles = StyleSheet.create({
  content: {
    flex: 1,
  },
  titleHero: {
    marginLeft: 56,
    marginBottom: 16,
    color: theme.COLOR.SECONDARY,
    fontWeight: 'bold',
  },
  heroContainer: {
    backgroundColor: 'white',
    justifyContent: 'flex-end',
  },
});

export default WhiteLayout;
