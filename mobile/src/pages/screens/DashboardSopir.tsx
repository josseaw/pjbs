import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useState} from 'react';
import ToggleSwitch from 'toggle-switch-react-native';
import {
  Animated,
  BackHandler,
  Dimensions,
  SectionList,
  StatusBar,
  StyleSheet,
  View,
} from 'react-native';
import {
  KendaraanBiruIcon,
  NotifikasiIcon,
  PengaturanIcon,
} from '../../assets/icons';
import Background from '../../components/Background';
import HeaderLogo from '../../components/Header/HeaderLogo';
import ImageIcon from '../../components/ImageIcon';
import TextTitle from '../../components/Text/TextTitle';
import theme from '../../style/theme';
import {BadgeType} from '../../utils/common';
import AnimatedWave from '../../components/Background/AnimatedWave';
import DashboardCard from '../../components/Card/DashboardCard';

export const dataDummy = [
  {
    id: 1,
    title: 'Hari ini',
    data: [
      {
        id: 1,
        title: 'Delvin Smith',
        time: 'diajukan',
        status: 'Selesai',
        locations: [{name: 'Kantor BPKB'}],
      },
      {
        id: 2,
        title: '',
        time: 'Menunggu',
        status: 'Berlangsung',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 2,
        title: '',
        time: 'Menunggu',
        status: 'Berlangsung',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 2,
        title: '',
        time: 'Menunggu',
        status: 'Berlangsung',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 2,
        title: '',
        time: 'Menunggu',
        status: 'Berlangsung',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
    ],
  },
  {
    id: 2,
    title: 'Besok',
    data: [
      {
        id: 1,
        title: '',
        time: 'diajukan',
        status: '',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 1,
        title: '',
        time: 'diajukan',
        status: '',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 1,
        title: '',
        time: 'diajukan',
        status: '',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
    ],
  },
];

interface DashboardSopirProps {}

const DashboardSopir: React.FC<DashboardSopirProps> = ({}) => {
  const navigation = useNavigation();
  const scrollY = new Animated.Value(0);

  const [data, setData] = useState([]);

  const scaleLogo = scrollY.interpolate({
    inputRange: [0, 60],
    outputRange: [0, 0.7],
    extrapolate: 'clamp',
  });

  const onPressIconRight = () => {
    navigation.navigate('Notifikasi');
  };

  useEffect(() => {
    const backAction = () => {
      navigation.goBack();
      return true;
    };
    const backHandler = BackHandler.addEventListener(
      'hardwareBackPress',
      backAction,
    );

    return () => backHandler.remove();
  }, []);

  return (
    <>
      <StatusBar barStyle="dark-content" backgroundColor={theme.COLOR.WHITE} />
      <Background type="primary">
        <HeaderLogo
          iconLeft={PengaturanIcon}
          iconRight={NotifikasiIcon}
          onPressIconLeft={() => {}}
          onPressIconRight={onPressIconRight}
          scaleLogo={scaleLogo}
        />

        <View>
          <SectionList
            sections={dataDummy}
            keyExtractor={(item, index) => item.title + index}
            renderItem={({item}) => {
              return (
                <DashboardCard
                  data={item}
                  typeBadge={BadgeType.SOPIR}
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
              <TextTitle
                color="grayLight"
                weight="bold"
                style={{marginBottom: 8}}>
                {title}
              </TextTitle>
            )}
            contentContainerStyle={{paddingHorizontal: 16, paddingBottom: 24}}
            ListHeaderComponent={<HeaderDashboardSopir scrollY={scrollY} />}
            onScroll={(e) => {
              scrollY.setValue(e.nativeEvent.contentOffset.y);
            }}
          />
        </View>
      </Background>
    </>
  );
};

const HeaderDashboardSopir = ({scrollY}) => {
  const [checked, setChecked] = useState<Boolean>(false);
  return (
    <View>
      <AnimatedWave styleWrapper={{marginHorizontal: -16}} scrollY={scrollY} />
      <View style={{paddingTop: 60, paddingBottom: 16}}>
        <View style={{flexDirection: 'row'}}>
          <View style={{flex: 1}}>
            <TextTitle size="large" color="white">
              Halo
            </TextTitle>
          </View>
          <View style={{flex: 1, alignItems: 'flex-end'}}>
            <TextTitle color="white">Kam, 17 September 2020</TextTitle>
          </View>
        </View>
        <View>
          <TextTitle color="white" weight="bold" type="page" size="large">
            Delvin!
          </TextTitle>
        </View>
        <View
          style={{
            marginTop: 16,
            flexDirection: 'column',
            justifyContent: 'flex-start',
          }}>
          <TextTitle color="white">
            Konfirmasi keaktifan Anda hari ini
          </TextTitle>
          <View
            style={{
              alignItems: 'flex-start',
              marginTop: 8,
            }}>
            <ToggleSwitch
              isOn={checked}
              onColor={theme.COLOR.DANGER}
              offColor={theme.COLOR.GRAY_DARK}
              onToggle={(value: Boolean) => setChecked(value)}
            />
          </View>
        </View>
        <View style={[styles.divider]} />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  logoPage: {
    width: Dimensions.get('window').width,
    alignItems: 'center',
    marginTop: 60,
    marginHorizontal: -16,
  },
  content: {
    flex: 1,
    paddingHorizontal: 16,
    paddingTop: 44,
    paddingBottom: 16,
  },
  button: {
    paddingVertical: 12,
  },
  divider: {
    marginBottom: 12,
    marginTop: 36,
    borderTopWidth: 1,
    borderColor: theme.COLOR.GRAY_LIGHT,
    opacity: 0.5,
  },
});

export default DashboardSopir;
