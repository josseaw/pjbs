import React, {useEffect} from 'react';
import {
  BackHandler,
  FlatList,
  SectionList,
  StyleSheet,
  Text,
  View,
} from 'react-native';
import TextTitle from '../../../components/Text/TextTitle';
import WaveLayout from '../../../layouts/WaveLayout';
import theme from '../../../style/theme';
import {dataDummyNotif} from '../../screens/NormalNotification';
import NotificationCard from '../../../components/Card/NotificationCard';
import {useNavigation} from '@react-navigation/native';

interface UserKendaraanProps {}

const UserKendaraan: React.FC<UserKendaraanProps> = ({}) => {
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
      <View style={{flexDirection: 'row', justifyContent: 'space-between'}}>
        <TextTitle color="white">Halo, Karina!</TextTitle>
        <Text style={{color: theme.COLOR.WHITE}}>Kam, 17 September 2020</Text>
      </View>
      <SectionList
        sections={dataDummyNotif}
        renderItem={({item}) => <NotificationCard {...item} />}
        keyExtractor={(item, index) => item.title + index}
        renderSectionHeader={({section: {title}}) => (
          <TextTitle
            color="secondary"
            style={[
              {
                marginTop: title === 'Belum Dibaca' ? 24 : 0,
              },
              // styles.titleCategories,
            ]}>
            {title}
          </TextTitle>
        )}
        showsVerticalScrollIndicator={false}
        // renderScrollComponent={(props) => (
        //   <Animated.ScrollView
        //     {...props}
        //     onScroll={onScrollEvent({y: scrollY})}
        //   />
        // )}
        scrollEventThrottle={5}
      />
    </WaveLayout>
  );
};

const styles = StyleSheet.create({});

export default UserKendaraan;
