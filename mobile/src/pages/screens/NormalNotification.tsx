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
import FAIcon from 'react-native-vector-icons/FontAwesome';
import theme from '../../style/theme';
export const dataDummyNotif = [
  {
    id: 1,
    title: 'Admin',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Disetujui',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 2,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Menunggu',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 3,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Ditolak',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer: '',
    catatanAdmin: '',
  },
  {
    id: 4,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Ditolak',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 5,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Disetujui',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer: '',
    catatanAdmin: '',
  },
  {
    id: 6,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Menunggu',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer: '',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 7,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Ditolak',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin: '',
  },
  {
    id: 8,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Disetujui',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 9,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Menunggu',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanAdmin:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
  },
  {
    id: 10,
    title: 'Pemesanan kendaraan menunggupersetujuan Anda.',
    time: 'diajukan pada 18 september 2020',
    telp: '082212345678',
    location: 'Kantor BPKB',
    person: '4',
    status: 'Ditolak',
    timeZone: 'WIB',
    fromTime: '08:00',
    fromDate: '20 September 2020',
    toTime: '16:00',
    toDate: '20 September 2020',
    statusDinas: 'Dalam kota tugas operasional',
    keperluan:
      'Menjemput narasumber untuk dintar ke kantor PJBS dan pulang diantar kembali ke kantor BPKP',
    catatanManajer: '',
    catatanAdmin: '',
  },
];

interface NormalNotificationProps {}
type DataFlatListType = NotificationCardType & {
  status: string;
};

const NormalNotification: React.FC<NormalNotificationProps> = ({}) => {
  const [data, setData] = useState<DataFlatListType[]>([]);
  const scrollY = useValue(0);
  const navigation = useNavigation();

  const backAction = () => {
    navigation.goBack();
    return true;
  };

  useEffect(() => {
    setData(() => {
      return dataDummyNotif.map((item) => {
        const dataCard: NotificationCardType = {
          title: item.title,
          location: item.location,
          person: item.person,
          telp: item.telp,
          time: item.time,
          dataTime: {
            timeZone: item.timeZone,
            fromDate: item.fromDate,
            fromTime: item.fromTime,
            toDate: item.toDate,
            toTime: item.toTime,
          },
          otherDetail: {
            statusDinas: item.statusDinas,
            keperluan: item.keperluan,
            catatanManajer: item.catatanManajer,
            catatanAdmin: item.catatanAdmin,
          },
        };
        return {...dataCard, status: item.status};
      });
    });

    const backHandler = BackHandler.addEventListener(
      'hardwareBackPress',
      backAction,
    );

    return () => backHandler.remove();
  }, []);

  const onPressCard = (index: number) => (e: GestureResponderEvent) => {
    navigation.navigate('Detail Pesanan');
  };

  return (
    <WhiteLayout
      title="Notifikasi"
      scrollY={scrollY}
      iconLeft="back"
      onPressIconLeft={backAction}
      iconRight={<FAIcon name="eye" size={24} color={theme.COLOR.SECONDARY} />}>
      <View>
        <FlatList
          data={data}
          renderItem={({item, index}) => {
            const {status, ...other} = item;
            return (
              <NotificationCard
                data={other}
                textBadge={status}
                colorBadge={getBadgeColor(status)}
                // isExpand={isExpand}
                onPressCard={onPressCard(index)}
              />
            );
          }}
          keyExtractor={(item, index) => item.title + index}
          showsVerticalScrollIndicator={false}
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
const styles = StyleSheet.create({
  titleCategories: {
    marginBottom: 8,
    marginLeft: 56,
  },
});

export default NormalNotification;
