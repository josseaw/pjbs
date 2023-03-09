import React from 'react';
import {Image, StyleProp, StyleSheet, ViewStyle, View} from 'react-native';
import {LogoImage} from '../../assets/images';
import theme from '../../style/theme';

interface LogoProps {
  style?: StyleProp<ViewStyle> | {};
  transparent?: Boolean;
}

const Logo: React.FC<LogoProps> = ({style, transparent = false}) => {
  const styleBackground = transparent ? styles.transparent : styles.fill;
  return (
    <View
      style={{
        ...styles.logoWrapper,
        ...styleBackground,
      }}>
      <Image source={LogoImage} style={[styles.logo, style]} />
    </View>
  );
};
const styles = StyleSheet.create({
  logo: {
    width: 74,
    height: 74,
    resizeMode: 'contain',
    alignItems: 'center',
  },
  logoWrapper: {
    justifyContent: 'center',
    alignItems: 'center',
  },
  fill: {
    backgroundColor: theme.COLOR.WHITE,
    height: 84,
    width: 84,
    borderRadius: 4,
  },
  transparent: {
    height: 74,
    width: 74,
  },
});

export default Logo;
