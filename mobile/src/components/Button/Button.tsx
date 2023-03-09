import React from 'react';
import {
  GestureResponderEvent,
  StyleProp,
  StyleSheet,
  Text,
  View,
  ViewStyle,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {getBackgroundColor, getColor, getTextColor} from '../../style/styles';
import {ColorType} from '../../types/propsType';

interface ButtonProps {
  style?: StyleProp<ViewStyle>;
  color?: ColorType;
  text?: string | undefined;
  outline?: boolean;
  onPress?: ((e: GestureResponderEvent) => void) | undefined;
  textColor?: ColorType;
}

const Button: React.FC<ButtonProps> = ({
  style,
  color = 'primary',
  textColor = 'white',
  text,
  children,
  outline,
  onPress,
}) => {
  return (
    <TouchableOpacity
      onPress={onPress}
      style={[
        styles.buttonOutline,
        {borderColor: getColor(color)},
        outline ? styles.transparent : getBackgroundColor(color),
        style,
      ]}>
      <View>
        {children ? (
          children
        ) : (
          <Text
            style={[
              styles.text,
              outline ? getTextColor(color) : getTextColor(textColor),
            ]}>
            {text}
          </Text>
        )}
      </View>
    </TouchableOpacity>
  );
};

const styles = StyleSheet.create({
  buttonOutline: {
    borderRadius: 100,
    paddingVertical: 8,
    paddingHorizontal: 40,
    borderWidth: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  text: {fontWeight: 'bold'},
  transparent: {backgroundColor: 'transparent'},
});

export default Button;
