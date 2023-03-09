import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useState} from 'react';
import {
  Animated,
  BackHandler,
  Dimensions,
  SectionList,
  SectionListRenderItem,
  StatusBar,
  StyleSheet,
  View,
} from 'react-native';
import {Text} from 'react-native-svg';
import {
  ArsipIcon,
  EditIcon,
  JamPutihIcon,
  LokasiPutihIcon,
  NotifikasiIcon,
  PengaturanIcon,
  PenggunaIcon,
  SurveyIcon,
} from '../../assets/icons';
import {SopirImage} from '../../assets/images';
import WavySvg from '../../assets/svg/WavySvg';
import Background from '../../components/Background';
import AnimatedWave from '../../components/Background/AnimatedWave';
import BadgeText from '../../components/Badge/BadgeText';
import Button from '../../components/Button/Button';
import DashboardCard from '../../components/Card/DashboardCard';
import HeaderLogo from '../../components/Header/HeaderLogo';
import CroppedImage from '../../components/Image/CroppedImage';
import ImageIcon from '../../components/ImageIcon';
import Logo from '../../components/Logo';
import TextDrawable from '../../components/Text/TextDrawable';
import TextTitle from '../../components/Text/TextTitle';
import theme from '../../style/theme';
import {getBadgeColor} from '../../utils/common';

const dataDummy = [
  {
    id: 1,
    title: 'Hari ini',
    data: [
      {
        id: 1,
        title: 'Delvin Smith',
        time: 'diajukan',
        status: 'Disetujui',
        locations: [{name: 'Kantor BPKB'}],
      },
      {
        id: 2,
        title: '',
        time: 'Menunggu',
        status: 'Menunggu',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 3,
        title: '',
        time: 'Menunggu',
        status: 'Menunggu',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 4,
        title: '',
        time: 'Menunggu',
        status: 'Menunggu',
        locations: [{name: 'Kantor BPKB'}, {name: 'Kantor KUA'}],
      },
      {
        id: 5,
        title: '',
        time: 'Menunggu',
        status: 'Menunggu',
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
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 2,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 3,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 4,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 5,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 6,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 7,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
      {
        id: 8,
        title: '',
        time: 'diajukan',
        status: 'Ditolak',
        locations: [
          {name: 'Kantor BPKB'},
          {name: 'Jl. Simpang Sulfat Utara No. 44, Malang'},
        ],
      },
    ],
  },
];

interface DashboardProps {}

const Dashboard: React.FC<DashboardProps> = ({}) => {
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

  const getImage = (status: string) => {
    switch (status) {
      case 'Menunggu':
        return (
          <ImageIcon
            iconSource={PenggunaIcon}
            wrapperHeight={80}
            wrapperWidth={80}
            wrapperColor="grayLight"
            borderRadius={20}
          />
        );

      case 'Ditolak':
        return (
          <ImageIcon
            iconSource={SurveyIcon}
            wrapperHeight={80}
            wrapperWidth={80}
            wrapperColor="grayLight"
            borderRadius={20}
          />
        );

      default:
        return (
          <CroppedImage
            width={100}
            height={150}
            cropHeight={80}
            cropWidth={80}
            resizeMode="center"
            source={SopirImage}
            cropLeft={15}
            cropTop={20}
            style={{borderRadius: 20}}
          />
        );
    }
  };

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
            keyExtractor={(item, index) => String(item.id + index)}
            renderItem={({item}) => (
              <DashboardCard renderImage={getImage(item.status)} data={item} />
            )}
            renderSectionHeader={({section: {title}}) => (
              <TextTitle
                color="grayLight"
                weight="bold"
                style={{marginBottom: 8}}>
                {title}
              </TextTitle>
            )}
            contentContainerStyle={{paddingHorizontal: 16, paddingBottom: 24}}
            ListHeaderComponent={
              <HeaderDashboard scrollY={scrollY} navigation={navigation} />
            }
            onScroll={(e) => {
              scrollY.setValue(e.nativeEvent.contentOffset.y);
            }}
          />
        </View>
      </Background>
    </>
  );
};

const HeaderDashboard = ({scrollY, navigation}) => {
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
          <View style={{flex: 1}}>
            <TextTitle size="large" color="white">
              Kam, 17 September 2020
            </TextTitle>
          </View>
        </View>
        <View>
          <TextTitle color="white" weight="bold" type="page" size="large">
            Admin!
          </TextTitle>
        </View>
        <View style={{flexDirection: 'row', marginTop: 16}}>
          <Button
            color="danger"
            text="Pesan Kendaraan"
            style={[styles.button, {marginRight: 8}]}
            onPress={() => navigation.navigate('Form Pemesanan')}
          />
          <Button
            color="white"
            textColor="danger"
            text="Monitoring"
            onPress={() => navigation.navigate('Monitoring Tab')}
            style={[styles.button]}
          />
        </View>
        <View style={[styles.divider]} />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
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
    marginTop: 32,
    borderTopWidth: 1,
    borderColor: theme.COLOR.GRAY_LIGHT,
    opacity: 0.5,
  },
});

export default Dashboard;
