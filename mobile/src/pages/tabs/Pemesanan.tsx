import React, {useEffect, useState} from 'react';
import {View, FlatList, GestureResponderEvent} from 'react-native';
import Animated from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import NotificationCard, {
  NotificationCardType,
} from '../../components/Card/NotificationCard';
import theme from '../../style/theme';
import {getBadgeColor} from '../../utils/common';

import {dataDummyNotif} from '../screens/NormalNotification';

import {TabContext} from '../screens/TabNotification';

type DataFlatListType = NotificationCardType & {
  isExpand: Boolean;
  status: string;
};

interface PemesananProps {}

const Pemesanan: React.FC<PemesananProps> = ({}) => {
  const {scrollY} = React.useContext(TabContext);

  const [data, setData] = useState<DataFlatListType[]>([]);

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

  return (
    <View style={{flex: 1, backgroundColor: theme.COLOR.WHITE}}>
      <FlatList
        data={data}
        renderItem={({item, index}) => {
          const {status, isExpand, ...other} = item;
          return (
            <NotificationCard
              data={other}
              textBadge={status}
              colorBadge={getBadgeColor(status)}
              isExpand={isExpand}
              onPressCard={onPressCard(index)}
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

export default Pemesanan;
