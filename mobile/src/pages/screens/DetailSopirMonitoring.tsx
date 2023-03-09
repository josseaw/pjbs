import {useNavigation} from '@react-navigation/native';
import React, {useEffect} from 'react';
import {
  BackHandler,
  ScrollView,
  SectionList,
  StyleSheet,
  Text,
  View,
} from 'react-native';
import {KendaraanBiruIcon} from '../../assets/icons';
import Background from '../../components/Background';
import DashboardCard from '../../components/Card/DashboardCard';
import SopirMonitoringCard from '../../components/Card/SopirMonitoringCard';
import DividerHorizontal from '../../components/Divider/DividerHorizontal';
import HeaderNormal from '../../components/Header/HeaderNormal';
import ImageIcon from '../../components/ImageIcon';
import TextTitle from '../../components/Text/TextTitle';
import {BadgeType} from '../../utils/common';
import {dataDummy} from '../tabs/SopirTab';
import {dataDummy as dataHistory} from './DashboardSopir';

interface DetailSopirMonitoringProps {}

const DetailSopirMonitoring: React.FC<DetailSopirMonitoringProps> = ({}) => {
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
    <Background>
      <HeaderNormal
        iconLeft="back"
        onPressIconLeft={backAction}
        title="Detail Sopir"
        bgColor="white"
        titleColor="secondary"
      />

      <SectionList
        sections={dataHistory}
        keyExtractor={(item, index) => item.title + index}
        renderItem={({item}) => {
          return (
            <DashboardCard
              data={item}
              // typeBadge={BadgeType.SOPIR}
              noBadge
              renderImage={
                <ImageIcon
                  iconSource={KendaraanBiruIcon}
                  wrapperHeight={80}
                  wrapperWidth={80}
                  wrapperColor="grayLight"
                  borderRadius={20}
                />
              }
            />
          );
        }}
        renderSectionHeader={({section: {title}}) => (
          <TextTitle color="grayLight" weight="bold" style={{marginBottom: 8}}>
            {title}
          </TextTitle>
        )}
        contentContainerStyle={{paddingHorizontal: 16, paddingBottom: 24}}
        ListHeaderComponent={
          <View style={{marginTop: 16, marginBottom: 8}}>
            <View style={styles.dateContainer}>
              <TextTitle color="grayLight">Kam, 17 September 2020</TextTitle>
            </View>
            <SopirMonitoringCard data={dataDummy[0]} />
            <DividerHorizontal color="white" opacity={0.5} margin={12} />
          </View>
        }
      />
    </Background>
  );
};

const styles = StyleSheet.create({
  dateContainer: {alignItems: 'flex-end', marginBottom: 8},
});

export default DetailSopirMonitoring;
