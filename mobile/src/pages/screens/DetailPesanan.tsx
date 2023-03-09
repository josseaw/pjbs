import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useState} from 'react';
import {BackHandler, Image, SafeAreaView, View} from 'react-native';
import {ScrollView} from 'react-native-gesture-handler';
import Animated, {useValue} from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import {TelephoneIcon} from '../../assets/icons';
import {SopirImage} from '../../assets/images';
import NotificationCard, {
  NotificationCardType,
} from '../../components/Card/NotificationCard';
import CroppedImage from '../../components/Image/CroppedImage';
import ImageIcon from '../../components/ImageIcon';
import TextDrawable from '../../components/Text/TextDrawable';
import TextTitle from '../../components/Text/TextTitle';
import WhiteLayout from '../../layouts/WhiteLayout';
import theme from '../../style/theme';
import {getBadgeColor} from '../../utils/common';
import {dataDummyNotif} from './NormalNotification';

interface DetailPesananProps {}

// type DetailPesananType = NotificationCardType & {status: string};

const DetailPesanan: React.FC<DetailPesananProps> = ({}) => {
  const scrollY = useValue(0);
  const navigation = useNavigation();
  const [data, setData] = useState<NotificationCardType>({
    title: '',
    location: '',
    person: '',
    telp: '',
    time: '',
    dataTime: {
      timeZone: '',
      fromDate: '',
      fromTime: '',
      toDate: '',
      toTime: '',
    },
    otherDetail: {
      statusDinas: '',
      keperluan: '',
      catatanManajer: '',
      catatanAdmin: '',
    },
  });

  const backAction = () => {
    navigation.goBack();
    return true;
  };

  useEffect(() => {
    setData(() => {
      return {
        title: dataDummyNotif[0].title,
        location: dataDummyNotif[0].location,
        person: dataDummyNotif[0].person,
        telp: dataDummyNotif[0].telp,
        time: dataDummyNotif[0].time,
        dataTime: {
          timeZone: dataDummyNotif[0].timeZone,
          fromDate: dataDummyNotif[0].fromDate,
          fromTime: dataDummyNotif[0].fromTime,
          toDate: dataDummyNotif[0].toDate,
          toTime: dataDummyNotif[0].toTime,
        },
        otherDetail: {
          statusDinas: dataDummyNotif[0].statusDinas,
          keperluan: dataDummyNotif[0].keperluan,
          catatanManajer: dataDummyNotif[0].catatanManajer,
          catatanAdmin: dataDummyNotif[0].catatanAdmin,
        },
      };
    });

    const backHandler = BackHandler.addEventListener(
      'hardwareBackPress',
      backAction,
    );

    return () => backHandler.remove();
  }, []);
  return (
    <WhiteLayout
      title="Detail Pesanan"
      scrollY={scrollY}
      iconLeft="back"
      onPressIconLeft={backAction}>
      <Animated.ScrollView
        onScroll={onScrollEvent({y: scrollY})}
        scrollEventThrottle={16}
        showsVerticalScrollIndicator={false}>
        <View
          style={{
            paddingHorizontal: 16,
            marginTop: 16,
            marginBottom: 24,
          }}>
          <View style={{flexDirection: 'row'}}>
            <View>
              <CroppedImage
                width={100}
                height={150}
                cropHeight={70}
                cropWidth={70}
                resizeMode="center"
                source={SopirImage}
                cropLeft={15}
                cropTop={20}
                style={{borderRadius: 20}}
              />
            </View>
            <View
              style={{
                flexGrow: 1,
                paddingLeft: 16,
              }}>
              <View style={{flexDirection: 'row'}}>
                <View style={{flex: 1}}>
                  <TextTitle color="secondary" weight="bold">
                    {data.title}
                  </TextTitle>
                  <TextTitle
                    color="secondary"
                    weight="light"
                    opacity="tertiary">
                    SP000
                  </TextTitle>
                </View>
                <View style={{flex: 1}}>
                  <TextTitle color="secondary">Toyota New Inova</TextTitle>
                  <TextTitle
                    color="secondary"
                    weight="light"
                    opacity="secondary">
                    L1184WN
                  </TextTitle>
                </View>
              </View>
              <View style={{marginTop: 8}}>
                <TextDrawable
                  text={data.telp}
                  drawableLeft={TelephoneIcon}
                  drawableWidth={16}
                  drawableHeight={16}
                  textSize={theme.FONT_SIZE.TEXT_LARGE}
                  bold
                />
              </View>
            </View>
          </View>
        </View>
        <NotificationCard
          data={data}
          textBadge={dataDummyNotif[0].status}
          colorBadge={getBadgeColor(dataDummyNotif[0].status)}
          isExpand
          noTelp
        />
      </Animated.ScrollView>
    </WhiteLayout>
  );
};

export default DetailPesanan;
