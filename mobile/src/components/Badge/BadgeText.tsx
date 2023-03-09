import React from 'react';
import {View, Text, StyleSheet, StyleProp, ViewStyle} from 'react-native';
import {getBackgroundColor} from '../../style/styles';
import theme from '../../style/theme';
import {ColorType} from '../../types/propsType';

interface BadgeTextProps {
  color?: ColorType;
  text?: string;
  style?: StyleProp<ViewStyle>;
}

const BadgeText: React.FC<BadgeTextProps> = ({
  color = 'primary',
  text,
  style,
}) => {
  return (
    <View style={[styles.badgeContainer, getBackgroundColor(color), style]}>
      <Text style={styles.textBadge}>{text}</Text>
    </View>
  );
};

const styles = StyleSheet.create({
  badgeContainer: {
    paddingVertical: 4,
    paddingHorizontal: 8,
    borderRadius: 100,
  },
  textBadge: {
    color: theme.COLOR.WHITE,
    fontWeight: 'bold',
    fontSize: theme.FONT_SIZE.TITLE_SMALL,
  },
});

export default BadgeText;
