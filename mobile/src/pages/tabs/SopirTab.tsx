import React from 'react';
import {View, FlatList} from 'react-native';
import Animated from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import {TabContext} from '../screens/MonitoringTab';
import HeaderSortBy from '../../components/Header/HeaderSortBy';
import Background from '../../components/Background';
import {useNavigation} from '@react-navigation/native';
import SopirMonitoringCard from '../../components/Card/SopirMonitoringCard';
import KendaraanCard from '../../components/Card/KendaraanCard';
import {dataDummy as dataKendaraan} from './KendaraanTab';

export const dataDummy = [
  {
    id: 1,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },
  {
    id: 2,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Nonaktif',
  },
  {
    id: 3,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },
  {
    id: 4,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Nonaktif',
  },
  {
    id: 5,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },
  {
    id: 6,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },

  {
    id: 7,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },
  {
    id: 8,
    title: 'Delvin Smith',
    pesanan: '1',
    hours: '16',
    sopir_number: 'SP000',
    plate_number: 'L1184WN',
    status: 'Aktif',
  },
];
// const SopirMonitoringStack = createStackNavigator();

interface SopirTabProps {}

const SopirTab: React.FC<SopirTabProps> = ({}) => {
  const {scrollY} = React.useContext(TabContext);
  const navigation = useNavigation();
  return (
    <Background>
      <FlatList
        data={dataDummy}
        keyExtractor={(item, index) => item.title + index}
        renderItem={({item}) => {
          return (
            <SopirMonitoringCard
              data={item}
              onPress={() => navigation.navigate('Detail Sopir Monitoring')}
            />
          );
        }}
        ListHeaderComponent={<HeaderSortBy date="Kam, 17 September 2020" />}
        contentContainerStyle={{paddingHorizontal: 16}}
        renderScrollComponent={(props) => (
          <Animated.ScrollView
            {...props}
            onScroll={onScrollEvent({y: scrollY})}
          />
        )}
        scrollEventThrottle={16}
        ListFooterComponent={<View style={{height: 214}} />}
      />
    </Background>
  );
};

{
  /* <SopirMonitoringCard
                data={item}
                onPress={() => navigation.navigate('Detail Sopir Monitoring')}
              /> */
}

export default SopirTab;
