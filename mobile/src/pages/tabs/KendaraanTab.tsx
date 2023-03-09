import React from 'react';
import {View, FlatList} from 'react-native';
import Animated from 'react-native-reanimated';
import {onScrollEvent} from 'react-native-redash';
import Background from '../../components/Background';
import {TabContext} from '../screens/MonitoringTab';
import KendaraanCard from '../../components/Card/KendaraanCard';
import HeaderSortBy from '../../components/Header/HeaderSortBy';

export const dataDummy = [
  {
    id: 1,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Aktif',
  },
  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },
  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },

  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },
  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },

  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },
  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },
  {
    id: 2,
    title: 'Toyota New Innova',
    number: 'L1184WN',
    description: 'Kendaraan operasional',
    status: 'Nonaktif',
  },
];

interface KendaraanTabProps {}

const KendaraanTab: React.FC<KendaraanTabProps> = ({}) => {
  const {scrollY} = React.useContext(TabContext);
  return (
    <Background>
      <FlatList
        data={dataDummy}
        keyExtractor={(item, index) => item.title + index}
        renderItem={({item}) => {
          return <KendaraanCard data={item} />;
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

export default KendaraanTab;
