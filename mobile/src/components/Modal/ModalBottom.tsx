import React from 'react';
import {Modal, StyleProp, StyleSheet, View, ViewStyle} from 'react-native';
import theme from '../../style/theme';
import {SCREEN_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';

interface ModalBottomProps {
  visible: boolean;
  style?: StyleProp<ViewStyle>;
}

const ModalBottom: React.FC<ModalBottomProps> = ({
  visible,
  style,
  children,
}) => {
  return (
    <Modal
      animationType="slide"
      transparent={true}
      visible={visible}
      statusBarTranslucent={true}>
      <View style={styles.shadow}>
        <View style={[styles.modalBottom, style]}>{children}</View>
      </View>
    </Modal>
  );
};

const styles = StyleSheet.create({
  shadow: {
    flex: 1,
    backgroundColor: 'rgba(0,0,0,0.5)',
    justifyContent: 'flex-end',
  },
  modalBottom: {
    backgroundColor: theme.COLOR.WHITE,
    borderTopLeftRadius: 80,
    width: SCREEN_WIDTH,
    height: SCREEN_HEIGHT / 2 + 40,
    padding: 24,
    justifyContent: 'space-between',
  },
});

export default ModalBottom;
