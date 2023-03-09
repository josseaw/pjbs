import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useState} from 'react';
import {
  View,
  FlatList,
  GestureResponderEvent,
  StyleSheet,
  Alert,
  TouchableOpacity,
} from 'react-native';
import Animated from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import Button from '../../components/Button/Button';
import NotificationCard, {
  NotificationCardType,
} from '../../components/Card/NotificationCard';
import SwipeableCard from '../../components/Card/SwipeableCard';
import ModalNormal from '../../components/Modal/ModalNormal';
import TextTitle from '../../components/Text/TextTitle';
import Textarea from '../../components/TextInput/Textarea';
import theme from '../../style/theme';
import {dataDummyNotif} from '../screens/NormalNotification';

import {TabContext} from '../screens/TabNotification';

type DataFlatListType = NotificationCardType & {
  isExpand: Boolean;
  status: string;
};

const initialState = {
  title: '',
  time: '',
  telp: '',
  location: '',
  person: '',
  dataTime: {
    fromTime: '',
    timeZone: '',
    fromDate: '',
    toTime: '',
    toDate: '',
  },
  otherDetail: {
    statusDinas: '',
    keperluan: '',
    catatanManajer: '',
    catatanAdmin: '',
  },
  isExpand: false,
  status: '',
};

interface PemesananProps {}

const Pemesanan: React.FC<PemesananProps> = ({}) => {
  const {scrollY} = React.useContext(TabContext);
  const navigation = useNavigation();

  const [data, setData] = useState<DataFlatListType[]>([]);
  const [dataSelected, setDataSelected] = useState<DataFlatListType>(
    initialState,
  );
  const [modalReject, setModalReject] = useState<boolean>(false);

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
        return {...dataCard, isExpand: false, status: item.status};
      });
    });
  }, []);

  const onPressCard = (index: number) => (e: GestureResponderEvent) => {
    const cardData = [...data];
    cardData[index].isExpand = !cardData[index].isExpand;
    setData(cardData);
  };

  const handleModalReject = (
    index?: number,
    dataReject: DataFlatListType = initialState,
  ) => {
    setDataSelected(dataReject);

    setModalReject((old) => !old);
  };

  const onReject = () => {
    handleModalReject();
    Alert.alert('Berhasil menolak');
  };

  const onApprove = () => {
    navigation.navigate('Pilih Sopir');
  };

  return (
    <View style={{flex: 1, backgroundColor: theme.COLOR.WHITE}}>
      <ModalNormal visible={modalReject}>
        <View style={{paddingVertical: 24, paddingHorizontal: 48}}>
          <TextTitle
            textAlign="center"
            color="secondary"
            weight="bold"
            size="small"
            type="page">
            Tolak Pengajuan
          </TextTitle>
          <Textarea
            placeholder="Masukkan alasan penolakan disini..."
            style={{marginTop: 24}}
          />
          <View style={styles.cardBottom}>
            <TouchableOpacity onPress={() => handleModalReject()}>
              <Button
                text="Batal"
                outline
                style={{flexGrow: 1, marginRight: 16}}
              />
            </TouchableOpacity>
            <TouchableOpacity onPress={onReject}>
              <Button text="Lanjut" style={{flexGrow: 1}} />
            </TouchableOpacity>
          </View>
        </View>
      </ModalNormal>
      <FlatList
        data={data}
        renderItem={({item, index}) => {
          const {status, isExpand, ...other} = item;
          return (
            <NotificationCard
              data={other}
              isExpand={isExpand}
              onPressCard={onPressCard(index)}
              onReject={() => handleModalReject()}
              onApprove={() => onApprove()}
              noBadge
              showButton
            />
          );
        }}
        keyExtractor={(item, index) => item.title + index}
        showsVerticalScrollIndicator={false}
        contentContainerStyle={{paddingTop: 16}}
        renderScrollComponent={(props) => (
          <Animated.ScrollView
            {...props}
            onScroll={onScrollEvent({y: scrollY})}
          />
        )}
        scrollEventThrottle={5}
      />
    </View>
  );
};

const styles = StyleSheet.create({
  cardBottom: {
    flexDirection: 'row',
    justifyContent: 'center',
    marginTop: 16,
  },
});

export default Pemesanan;
