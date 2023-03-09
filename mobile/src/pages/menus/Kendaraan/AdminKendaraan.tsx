import {useNavigation} from '@react-navigation/native';
import React, {useEffect} from 'react';
import {BackHandler, StyleSheet, Text, View} from 'react-native';
import WaveLayout from '../../../layouts/WaveLayout';

interface AdminKendaraanProps {}

const AdminKendaraan: React.FC<AdminKendaraanProps> = ({}) => {
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
    <WaveLayout>
      <View>
        <Text>Admin Kendaraan Page</Text>
      </View>
    </WaveLayout>
  );
};

const styles = StyleSheet.create({});

export default AdminKendaraan;
