import React, {Children} from 'react';
import {Image, SafeAreaView, StyleSheet} from 'react-native';
import LinearGradient from 'react-native-linear-gradient';
import {IllustrationWhite, IllustrationBlue} from '../../assets/images';
import theme from '../../style/theme';

type TypeBackground = 'primary' | 'secondary' | 'blue';

interface BackgroundProps {
  type?: TypeBackground;
  noIllustration?: boolean;
}

const Background: React.FC<BackgroundProps> = ({
  type = 'primary',
  children,
  noIllustration = false,
  noGradient = false,
}) => {
  const colors =
    type === 'primary'
      ? [theme.COLOR.PRIMARY_DARK, theme.COLOR.PRIMARY]
      : type === 'secondary'
      ? [theme.COLOR.WHITE, theme.COLOR.WHITE]
      : [theme.COLOR.PRIMARY, theme.COLOR.PRIMARY];
  const illustration =
    type === 'primary' || type === 'blue'
      ? IllustrationWhite
      : IllustrationBlue;
  return (
    <LinearGradient
      colors={colors}
      style={styles.container}
      start={{x: 1.3, y: 0.6}}>
      {!noIllustration && (
        <Image source={illustration} style={styles.illustration} />
      )}
      {children}
    </LinearGradient>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  illustration: {
    position: 'absolute',
    bottom: -24,
    left: 0,
    width: 250,
    height: 170,
    resizeMode: 'contain',
    alignItems: 'center',
  },
});

export default Background;
