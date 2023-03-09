import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useState} from 'react';
import {
  BackHandler,
  FlatList,
  GestureResponderEvent,
  SectionList,
  StyleSheet,
  View,
} from 'react-native';
import TextTitle from '../../components/Text/TextTitle';
import WhiteLayout from '../../layouts/WhiteLayout';

import Animated, {useValue} from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import SwipeableCard from '../../components/Card/SwipeableCard';
import NotificationCard, {
  NotificationCardType,
} from '../../components/Card/NotificationCard';
import {getBadgeColor} from '../../utils/common';
import PilihSopirCard from '../../components/Card/PilihSopirCard';

export const dataDummy = [
  {
    id: 1,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 2,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Nonaktif',
    tersedia: '16:00',
  },
  {
    id: 3,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 4,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Nonaktif',
    tersedia: '16:00',
  },
  {
    id: 5,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 6,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },

  {
    id: 7,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 8,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 9,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
  {
    id: 10,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
    tersedia: '16:00',
  },
];

interface PilihSopirCard {}

const PilihSopir: React.FC<PilihSopirCard> = ({}) => {
  const scrollY = useValue(0);
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

  const onChooseSopir = (data) => {
    navigation.navigate('Konfirmasi Persetujuan');
  };

  return (
    <WhiteLayout
      title="Pilih Sopir"
      scrollY={scrollY}
      iconLeft="back"
      onPressIconLeft={backAction}
      noIllustration>
      <View>
        <FlatList
          data={dataDummy}
          renderItem={({item, index}) => {
            return (
              <PilihSopirCard data={item} onPress={() => onChooseSopir(item)} />
            );
          }}
          keyExtractor={(item, index) => item.title + index}
          showsVerticalScrollIndicator={false}
          contentContainerStyle={{paddingHorizontal: 16}}
          renderScrollComponent={(props) => (
            <Animated.ScrollView
              {...props}
              onScroll={onScrollEvent({y: scrollY})}
            />
          )}
          scrollEventThrottle={5}
        />
      </View>
    </WhiteLayout>
  );
};

export default PilihSopir;
