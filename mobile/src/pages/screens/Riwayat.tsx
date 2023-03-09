import {useNavigation} from '@react-navigation/native';
import React, {useEffect} from 'react';
import {BackHandler, StatusBar, StyleSheet, Text} from 'react-native';
import Background from '../../components/Background';
import theme from '../../style/theme';

interface RiwayatProps {}

const Riwayat: React.FC<RiwayatProps> = ({}) => {
  const navigation = useNavigation();
  const backAction = () => {
    navigation.goBack();
    return true;
  };

  useEffect(() => {
    const backHandler = BackHandler.addEventListener(
      'hardwareBackPress',
      backAction,
    );

    return () => backHandler.remove();
  }, []);
  return (
    <>
      <StatusBar
        barStyle="light-content"
        backgroundColor={theme.COLOR.PRIMARY_DARK}
      />
      <Background>
        <Text>Riwayat</Text>
      </Background>
    </>
  );
};

const styles = StyleSheet.create({});

export default Riwayat;
