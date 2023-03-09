import {createMaterialTopTabNavigator} from '@react-navigation/material-top-tabs';
import {useNavigation} from '@react-navigation/native';
import React, {useEffect} from 'react';
import {BackHandler, StatusBar} from 'react-native';
import {NotifikasiIcon, PengaturanIcon} from '../../assets/icons';
import Background from '../../components/Background';
import AnimatedWaveReanimated from '../../components/Background/AnimatedWaveReanimated';
import HeaderLogoReanimated from '../../components/Header/HeaderLogoReanimated';

import theme from '../../style/theme';
import KendaraanTab from '../tabs/KendaraanTab';
import {MyTabBar} from './TabNotification';
import SopirTab from '../tabs/SopirTab';
import {HEADER_HEIGHT, MAX_HEADER_HEIGHT} from '../../utils/constants';
import Reanimated, {
  Extrapolate,
  interpolate,
  useValue,
} from 'react-native-reanimated';

export const TabContext = React.createContext({
  scrollY: new Reanimated.Value(0),
});

const Tab = createMaterialTopTabNavigator();

interface MonitoringTabProps {}

const MonitoringTab: React.FC<MonitoringTabProps> = ({}) => {
  const navigation = useNavigation();
  const scrollY = useValue(0);

  const onPressIconRight = () => {};
  const headerHeight = interpolate(scrollY, {
    inputRange: [0, 200],
    outputRange: [160, 60],
    extrapolate: Extrapolate.CLAMP,
  });
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
        <Reanimated.View style={{height: headerHeight}}>
          <HeaderLogoReanimated
            iconLeft={PengaturanIcon}
            iconRight={NotifikasiIcon}
            onPressIconLeft={() => {}}
            onPressIconRight={onPressIconRight}
            scrollY={scrollY}
          />
          <AnimatedWaveReanimated scrollY={scrollY} />
        </Reanimated.View>
        <TabContext.Provider value={{scrollY}}>
          <Tab.Navigator
            tabBar={(props) => (
              <MyTabBar
                {...props}
                colorText="white"
                colorIndicator="white"
                alignIndicator="rightLeft"
                widthIndicator={60}
                scrollY={scrollY}
                colorTextOnTop="primary"
                colorIndicatorOnTop="primary"
                heightOnScroll={200}
              />
            )}>
            <Tab.Screen name="Kendaraan" component={KendaraanTab} />
            <Tab.Screen name="Sopir" component={SopirTab} />
          </Tab.Navigator>
        </TabContext.Provider>
      </Background>
    </>
  );
};

export default MonitoringTab;
