import React from 'react';
import {GestureResponderEvent, StyleSheet} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import AntdIcon from 'react-native-vector-icons/AntDesign';
import theme from '../../style/theme';

interface ButtonArrowProps {
  onPress?: ((e: GestureResponderEvent) => void) | undefined;
}

const ButtonArrow: React.FC<ButtonArrowProps> = ({onPress}) => {
  return (
    <TouchableOpacity style={styles.button} onPress={onPress}>
      <AntdIcon name="arrowright" color={theme.COLOR.WHITE} size={40} />
    </TouchableOpacity>
  );
};

const styles = StyleSheet.create({
  button: {
    backgroundColor: 'red',
    padding: 16,
    borderRadius: 100,
  },
});

export default ButtonArrow;
