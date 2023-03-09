import React from 'react';
import {Modal, StyleSheet, View} from 'react-native';
// import {} from 'react-native-svg';
import theme from '../../style/theme';

interface ModalNormalProps {
  visible: boolean;
}

const ModalNormal: React.FC<ModalNormalProps> = ({visible, children}) => {
  return (
    <Modal
      animationType="slide"
      transparent={true}
      visible={visible}
      statusBarTranslucent={true}>
      <View style={styles.shadow}>
        <View style={styles.modal}>{children}</View>
      </View>
    </Modal>
  );
};

const styles = StyleSheet.create({
  shadow: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: 'rgba(0,0,0,0.5)',
    paddingHorizontal: 24,
  },
  modal: {
    backgroundColor: theme.COLOR.WHITE,
    borderBottomLeftRadius: 60,
    borderTopRightRadius: 60,
    width: '100%',
  },
});

export default ModalNormal;
