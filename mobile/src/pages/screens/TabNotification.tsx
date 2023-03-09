import React, {useEffect} from 'react';
import {
  StatusBar,
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  BackHandler,
} from 'react-native';
import Background from '../../components/Background';
import TextTitle from '../../components/Text/TextTitle';
import theme from '../../style/theme';

import {MAX_HEADER_HEIGHT, HEADER_HEIGHT} from '../../utils/constants';
import HeaderTitle, {
  HeaderTitleProps,
} from '../../components/Header/HeaderTitle';
import {RiwayatIcon} from '../../assets/icons';

import Animated, {
  Extrapolate,
  interpolate,
  useValue,
} from 'react-native-reanimated';
// import {TouchableOpacity} from 'react-native-gesture-handler';
import {createMaterialTopTabNavigator} from '@react-navigation/material-top-tabs';
import Pemesanan from '../tabs/Pemesanan';
import Persetujuan from '../tabs/Persetujuan';
import {useNavigation} from '@react-navigation/native';
import {ColorType} from '../../types/propsType';
import {getColor} from '../../style/styles';
import {interpolateColors} from '../../utils/interpolateColor';
import FAIcon from 'react-native-vector-icons/FontAwesome';

const Tab = createMaterialTopTabNavigator();
export const TabContext = React.createContext({scrollY: new Animated.Value(0)});

interface TabNotificationProps {
  title: string;
  scrollY: Animated.Value<number>;
}

type TabNotificationType = TabNotificationProps & HeaderTitleProps;
type TabBarCustom = TabBarProps & {
  colorText?: ColorType;
  colorIndicator?: ColorType;
  alignIndicator?: 'center' | 'rightLeft';
  widthIndicator?: number | string;
  bgOnTop?: ColorType;
  colorTextOnTop?: ColorType;
  colorIndicatorOnTop?: ColorType;
  scrollY: Animated.Value<number>;
  heightOnScroll?: number;
};

export const MyTabBar: React.FC<TabBarCustom> = ({
  state,
  descriptors,
  navigation,
  position,
  colorText = 'secondary',
  colorIndicator = 'secondary',
  alignIndicator = 'center',
  widthIndicator = '100%',
  bgOnTop = 'white',
  colorTextOnTop = 'secondary',
  colorIndicatorOnTop = 'secondary',
  scrollY,
  heightOnScroll = 200,
}) => {
  const bgColor = interpolate(scrollY, {
    inputRange: [0, heightOnScroll],
    outputRange: [0, 1],
    extrapolate: Extrapolate.CLAMP,
  });

  const textColor = interpolateColors(
    scrollY,
    [0, heightOnScroll],
    [getColor(colorText), getColor(colorTextOnTop)],
  );

  const indicatorColor = interpolateColors(
    scrollY,
    [0, heightOnScroll],
    [getColor(colorIndicator), getColor(colorIndicatorOnTop)],
  );

  return (
    <View
      style={{
        flexDirection: 'row',
        height: 50,
      }}>
      <Animated.View
        style={[
          StyleSheet.absoluteFill,
          {height: 50, backgroundColor: bgOnTop, opacity: bgColor},
        ]}
      />
      {state.routes.map((route, index: number) => {
        const {options} = descriptors[route.key];
        const label =
          options.tabBarLabel !== undefined
            ? options.tabBarLabel
            : options.title !== undefined
            ? options.title
            : route.name;

        const isFocused = state.index === index;
        const onPress = () => {
          const event = navigation.emit({
            type: 'tabPress',
            target: route.key,
          });

          if (!isFocused && !event.defaultPrevented) {
            navigation.navigate(route.name);
          }
        };

        const onLongPress = () => {
          navigation.emit({
            type: 'tabLongPress',
            target: route.key,
          });
        };
        // modify inputRange for custom behavior
        const inputRange = state.routes.map((_, i) => i);
        const scaleX = Animated.interpolate(position, {
          inputRange,
          outputRange: inputRange.map((i) => (i === index ? 1 : 0)),
          extrapolate: Extrapolate.CLAMP,
        });

        const fontWeight = isFocused
          ? theme.FONT_WEIGHT.BOLD
          : theme.FONT_WEIGHT.NORMAL;

        return (
          <TouchableOpacity
            key={route.key}
            accessibilityRole="button"
            accessibilityState={{selected: true}}
            accessibilityLabel={options.tabBarAccessibilityLabel}
            testID={options.tabBarTestID}
            onPress={onPress}
            onLongPress={onLongPress}
            style={{
              flex: 1,
              flexDirection: 'row',
              alignItems: 'center',
              justifyContent:
                alignIndicator === 'center'
                  ? 'center'
                  : index
                  ? 'flex-end'
                  : 'flex-start',
              paddingHorizontal: 24,
            }}>
            <View>
              <Animated.Text
                style={[
                  {
                    opacity: isFocused ? 1 : 0.5,
                    fontWeight,
                    fontSize: theme.FONT_SIZE.TITLE_LARGE,
                    textAlign:
                      alignIndicator === 'center'
                        ? 'center'
                        : index
                        ? 'right'
                        : 'left',
                    color: textColor,
                  },
                  // getTextColor(colorText),
                ]}>
                {label.toUpperCase()}
              </Animated.Text>
              <Animated.View
                style={[
                  {
                    height: isFocused ? 3 : 0,
                    width: widthIndicator,
                    backgroundColor: indicatorColor,
                  },
                  {transform: [{scaleX}]},
                ]}
              />
            </View>
          </TouchableOpacity>
        );
      })}
    </View>
  );
};

const TabNotification: React.FC<TabNotificationType> = () => {
  const navigation = useNavigation();
  const scrollY = useValue(0);
  const headerHeight = interpolate(scrollY, {
    inputRange: [0, 350],
    outputRange: [MAX_HEADER_HEIGHT, HEADER_HEIGHT],
    extrapolate: Extrapolate.CLAMP,
  });

  const fontSize = interpolate(scrollY, {
    inputRange: [0, 200],
    outputRange: [
      theme.FONT_SIZE.TITLE_PAGE_MEDIUM,
      theme.FONT_SIZE.TITLE_PAGE_SMALL,
    ],
    extrapolate: Extrapolate.CLAMP,
  });

  const opacity = interpolate(scrollY, {
    inputRange: [0, 280, 281],
    outputRange: [1, 0.8, 0],
    extrapolate: Extrapolate.CLAMP,
  });

  const translateY = interpolate(scrollY, {
    inputRange: [0, 300],
    outputRange: [0, -10],
    extrapolate: Extrapolate.CLAMP,
  });

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
    <>
      <StatusBar barStyle="dark-content" backgroundColor={theme.COLOR.WHITE} />
      <Background type="secondary">
        <Animated.View style={[styles.heroContainer, {height: headerHeight}]}>
          <HeaderTitle
            iconLeft="back"
            onPressIconLeft={backAction}
            title="Notifikasi"
            scrollY={scrollY}
            iconRight={
              <FAIcon name="eye" size={24} color={theme.COLOR.SECONDARY} />
            }
          />
          <Animated.Text
            style={[
              {
                transform: [{translateY}],
                opacity,
                fontSize,
              },
              styles.titleHero,
            ]}>
            Notifikasi
          </Animated.Text>
        </Animated.View>
        <TabContext.Provider value={{scrollY}}>
          <Tab.Navigator
            tabBar={(props) => <MyTabBar {...props} />}
            lazy={true}>
            <Tab.Screen
              name="TabNotification"
              component={Persetujuan}
              options={{tabBarLabel: 'Persetujuan'}}
            />
            <Tab.Screen
              name="Pemesanan"
              component={Pemesanan}
              options={{tabBarLabel: 'Pemesanan'}}
            />
          </Tab.Navigator>
        </TabContext.Provider>
      </Background>
    </>
  );
};

interface TabBarProps {
  state?: any;
  descriptors?: any;
  navigation?: any;
  position?: any;
}

const styles = StyleSheet.create({
  content: {
    flex: 1,
  },
  titleHero: {marginLeft: 56, marginBottom: 16, color: theme.COLOR.SECONDARY},
  heroContainer: {
    backgroundColor: 'white',
    justifyContent: 'flex-end',
  },
});

export default TabNotification;
