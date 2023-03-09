import React from 'react';
import {
  GestureResponderEvent,
  ImageSourcePropType,
  ImageStyle,
  StyleProp,
  StyleSheet,
  View,
  Image,
  Text,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import globalStyles, {
  getBackgroundColor,
  getTextColor,
} from '../../style/styles';
import theme from '../../style/theme';
import {ColorType} from '../../types/propsType';

import AntdIcon from 'react-native-vector-icons/AntDesign';

interface HeaderNormalProps {
  bgColor?: ColorType;
  titleColor?: ColorType;
  iconLeft?: ImageSourcePropType | 'back' | undefined;
  iconRight?: ImageSourcePropType | undefined;
  notifLeft?: number | undefined;
  notifRight?: number | undefined;
  stylesIconLeft?: StyleProp<ImageStyle>;
  stylesIconRight?: StyleProp<ImageStyle>;
  onPressIconLeft?: (event: GestureResponderEvent) => void;
  onPressIconRight?: (event: GestureResponderEvent) => void;
  title?: string;
}

const HeaderNormal: React.FC<HeaderNormalProps> = ({
  bgColor = 'primary',
  titleColor = 'primary',
  iconLeft,
  iconRight,
  notifLeft,
  notifRight,
  stylesIconLeft,
  stylesIconRight,
  onPressIconLeft,
  onPressIconRight,
  title,
}) => {
  return (
    <View style={[globalStyles.headerContainer, getBackgroundColor(bgColor)]}>
      <View style={styles.headerContent}>
        {iconLeft && (
          <TouchableOpacity onPress={onPressIconLeft}>
            {iconLeft === 'back' ? (
              <AntdIcon
                name="arrowleft"
                color={theme.COLOR.SECONDARY}
                size={24}
              />
            ) : (
              <Image
                source={iconLeft}
                style={[globalStyles.icon, stylesIconLeft]}
              />
            )}
          </TouchableOpacity>
        )}

        <Text style={[styles.titleHeader, getTextColor(titleColor)]}>
          {title}
        </Text>
      </View>

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

const styles = StyleSheet.create({
  titleHeader: {
    fontSize: theme.FONT_SIZE.TITLE_PAGE_SMALL,
    marginLeft: 16,
  },
  headerContent: {flexDirection: 'row', alignItems: 'center'},
});

export default HeaderNormal;
