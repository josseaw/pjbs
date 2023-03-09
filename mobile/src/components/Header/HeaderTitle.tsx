import React from 'react';
import {
  GestureResponderEvent,
  Image,
  ImageSourcePropType,
  ImageStyle,
  StyleProp,
  StyleSheet,
  View,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import Animated, {Extrapolate, interpolate} from 'react-native-reanimated';
import globalStyles from '../../style/styles';
import theme from '../../style/theme';

import AntdIcon from 'react-native-vector-icons/AntDesign';

export interface HeaderTitleProps {
  iconLeft?: ImageSourcePropType | 'back' | React.ReactElement | undefined;
  iconRight?: ImageSourcePropType | React.ReactElement | undefined;
  notifLeft?: number | undefined;
  notifRight?: number | undefined;
  stylesIconLeft?: StyleProp<ImageStyle>;
  stylesIconRight?: StyleProp<ImageStyle>;
  onPressIconLeft?: (event: GestureResponderEvent) => void;
  onPressIconRight?: (event: GestureResponderEvent) => void;
  title?: string;
  scrollY: Animated.Value<number>;
}

const HeaderTitle: React.FC<HeaderTitleProps> = ({
  iconLeft,
  iconRight,
  stylesIconLeft,
  stylesIconRight,
  onPressIconLeft,
  onPressIconRight,
  title = '',
  scrollY,
}) => {
  const translateY = interpolate(scrollY, {
    inputRange: [299, 500],
    outputRange: [6, 0],
    extrapolate: Extrapolate.CLAMP,
  });

  const opacity = interpolate(scrollY, {
    inputRange: [0, 279, 280, 400],
    outputRange: [0, 0, 0.8, 1],
    extrapolate: Extrapolate.CLAMP,
  });

  const renderIconLeft = () => {
    if (iconLeft) {
      if (iconLeft === 'back') {
        return (
          <TouchableOpacity onPress={onPressIconLeft}>
            <AntdIcon
              name="arrowleft"
              color={theme.COLOR.SECONDARY}
              size={24}
            />
          </TouchableOpacity>
        );
      } else if (React.isValidElement(iconLeft)) {
        return (
          <TouchableOpacity onPress={onPressIconLeft}>
            {iconLeft}
          </TouchableOpacity>
        );
      } else if (typeof iconLeft !== 'string' && typeof iconLeft !== 'number') {
        return (
          <TouchableOpacity onPress={onPressIconRight}>
            <Image
              source={iconLeft}
              style={[globalStyles.icon, stylesIconLeft]}
            />
          </TouchableOpacity>
        );
      }
    }
    return null;
  };

  const renderIconRight = () => {
    if (iconRight) {
      if (React.isValidElement(iconRight)) {
        return (
          <TouchableOpacity onPress={onPressIconRight}>
            {iconRight}
          </TouchableOpacity>
        );
      } else if (
        typeof iconRight !== 'string' &&
        typeof iconRight !== 'number'
      ) {
        return (
          <TouchableOpacity onPress={onPressIconRight}>
            <Image
              source={iconRight}
              style={[globalStyles.icon, stylesIconRight]}
            />
          </TouchableOpacity>
        );
      }
    }
    return null;
  };

  return (
    <View
      style={[
        globalStyles.headerContainer,
        globalStyles.bgWhite,
        StyleSheet.absoluteFill,
      ]}>
      <View style={styles.headerContent}>
        {renderIconLeft()}
        <Animated.Text
          style={[
            {
              opacity,
              transform: [{translateY}],
            },
            styles.titleHeader,
          ]}>
          {title}
        </Animated.Text>
      </View>
      {renderIconRight()}
    </View>
  );
};

const styles = StyleSheet.create({
  titleHeader: {
    fontSize: theme.FONT_SIZE.TITLE_PAGE_SMALL,
    marginLeft: 16,
    color: theme.COLOR.SECONDARY,
  },
  headerContent: {flexDirection: 'row', alignItems: 'center'},
});

export default HeaderTitle;
