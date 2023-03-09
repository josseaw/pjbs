import {useNavigation} from '@react-navigation/native';
import React, {useEffect} from 'react';
import {
  Alert,
  BackHandler,
  View,
  ImageSourcePropType,
  StyleSheet,
  GestureResponderEvent,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {
  ArsipIcon,
  AtkIcon,
  InventarisIcon,
  KendaraanBiruIcon,
  NotifikasiIcon,
  PerbaikanFasilitasIcon,
  RiwayatIcon,
  RuanganRapatIcon,
  SurveyIcon,
} from '../../assets/icons';
import ImageIcon from '../../components/ImageIcon';
import TextTitle from '../../components/Text/TextTitle';
import WaveLayout from '../../layouts/WaveLayout';
export type DataMenuType = {
  id: number;
  title: string;
  image: ImageSourcePropType;
  onPress: ((event: GestureResponderEvent) => void) | undefined;
};

interface MainMenuProps {}

const MainMenu: React.FC<MainMenuProps> = ({}) => {
  const navigation = useNavigation();

  const dataMenu: DataMenuType[] = [
    {
      id: 1,
      title: 'Kendaraan',
      image: KendaraanBiruIcon,
      onPress: () => navigation.navigate('Dashboard'),
    },
    {
      id: 2,
      title: 'Ruang Rapat',
      image: RuanganRapatIcon,
      onPress: () => {
        navigation.navigate('TabNotification');
      },
    },
    {
      id: 3,
      title: 'ATK',
      image: AtkIcon,
      onPress: () => navigation.navigate('Dashboard Sopir'),
    },
    {
      id: 4,
      title: 'Perbaikan Fasilitas',
      image: PerbaikanFasilitasIcon,
      onPress: () => {},
    },
    {
      id: 5,
      title: 'Arsip',
      image: ArsipIcon,
      onPress: () => {},
    },
    {
      id: 6,
      title: 'Inventaris',
      image: InventarisIcon,
      onPress: () => {},
    },
    {
      id: 7,
      title: 'Survey',
      image: SurveyIcon,
      onPress: () => {},
    },
  ];

  useEffect(() => {
    const backAction = () => {
      Alert.alert('Konfirmasi!', 'Anda yakin untuk keluar aplikasi?', [
        {
          text: 'Tidak',
          onPress: () => null,
          style: 'cancel',
        },
        {text: 'Iya', onPress: () => BackHandler.exitApp()},
      ]);
      return true;
    };

    const backHandler = BackHandler.addEventListener(
      'hardwareBackPress',
      backAction,
    );

    return () => backHandler.remove();
  }, []);

  return (
    <WaveLayout
      iconLeft={RiwayatIcon}
      iconRight={NotifikasiIcon}
      onPressIconLeft={() => {
        navigation.navigate('Riwayat');
      }}
      onPressIconRight={() => {
        navigation.navigate('NormalNotification');
      }}>
      <View style={styles.content}>
        {dataMenu.map((data, index) => (
          <View key={index} style={styles.menuContainer}>
            <TouchableOpacity style={styles.menuWrapper} onPress={data.onPress}>
              <ImageIcon
                key={index}
                wrapperColor="grayLight"
                iconSource={data.image}
              />
              <TextTitle style={styles.title} color="white" textAlign="center">
                {data.title}
              </TextTitle>
            </TouchableOpacity>
          </View>
        ))}
      </View>
    </WaveLayout>
  );
};

const styles = StyleSheet.create({
  content: {
    flex: 1,
    flexDirection: 'row',
    flexWrap: 'wrap',
  },
  menuContainer: {
    width: '33%',
    marginVertical: '4%',
    aspectRatio: 1,
    alignItems: 'center',
  },
  menuWrapper: {
    alignItems: 'center',
  },
  title: {marginTop: 10},
});

export default MainMenu;
