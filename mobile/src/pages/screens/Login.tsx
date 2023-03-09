/* eslint-disable react-native/no-inline-styles */
import {useNavigation} from '@react-navigation/native';
import React, {useEffect, useRef, useState} from 'react';
import {
  Image,
  StatusBar,
  StyleSheet,
  View,
  Animated,
  TextInput,
  Keyboard,
  Alert,
  BackHandler,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {PanahLoginIcon} from '../../assets/icons';
import Background from '../../components/Background';
import LoginInput from '../../components/TextInput/LoginInput';
import TextTitle from '../../components/Text/TextTitle';
import Logo from '../../components/Logo';
import theme from '../../style/theme';
import {BallIndicator} from 'react-native-indicators';
import {SCREEN_HEIGHT, LOGIN_VIEW_HEIGHT} from '../../utils/constants';
import {useKeyboard} from '../../utils/useKeyboard';

interface LoginProps {}

const Login: React.FC<LoginProps> = () => {
  const navigation = useNavigation();

  const passwordRef = useRef<TextInput>(null);
  const [loading, setLoading] = useState(true);
  const [keyBoardHeight] = useKeyboard();

  useEffect(() => {
    setTimeout(() => {
      setLoading(false);
      moveLogoToUp();
      showLoginForm();
    }, 3000);
  }, []);

  /** Start Animation */
  const translateYLogo = useState(new Animated.Value(0))[0];
  const loginAnimation = useRef(new Animated.Value(0)).current;
  const idInputRef = useRef<TextInput>(null);

  function moveLogoToUp() {
    Animated.timing(translateYLogo, {
      toValue: -120,
      duration: 800,
      useNativeDriver: true,
    }).start();
  }

  function showLoginForm() {
    Animated.timing(loginAnimation, {
      toValue: 1,
      duration: 800,
      useNativeDriver: true,
    }).start();
  }

  const innerYLogin = loginAnimation.interpolate({
    inputRange: [0, 1],
    outputRange: [LOGIN_VIEW_HEIGHT, 0],
  });

  const isOpen = useRef(new Animated.Value(0)).current;

  const outerLoginY = isOpen.interpolate({
    inputRange: [0, 1],
    outputRange: [
      SCREEN_HEIGHT - LOGIN_VIEW_HEIGHT,
      (keyBoardHeight - 200) / 2.5,
    ],
  });

  function _keyboardDidShow() {
    Animated.timing(isOpen, {
      toValue: 1,
      duration: 300,
      useNativeDriver: true,
    }).start();
  }

  const _keyboardDidHide = () => {
    Animated.timing(isOpen, {
      toValue: 0,
      duration: 300,
      useNativeDriver: true,
    }).start();
  };

  useEffect(() => {
    Keyboard.addListener('keyboardDidShow', _keyboardDidShow);
    Keyboard.addListener('keyboardDidHide', _keyboardDidHide);

    // cleanup function
    return () => {
      Keyboard.removeListener('keyboardDidShow', _keyboardDidShow);
      Keyboard.removeListener('keyboardDidHide', _keyboardDidHide);
    };
  }, []);
  /** End Animation */

  const onSubmit = () => {
    navigation.navigate('MainMenu');
  };

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
    <>
      <StatusBar
        barStyle="light-content"
        backgroundColor={theme.COLOR.PRIMARY_DARK}
      />
      <Background type="primary">
        <View style={styles.container}>
          <Animated.View
            style={[
              styles.logoContainer,
              {
                transform: [{translateY: translateYLogo}],
              },
            ]}>
            <Logo />

            <BallIndicator
              color="white"
              animating={loading}
              hidesWhenStopped={true}
              size={20}
              style={{marginTop: 30}}
            />
          </Animated.View>
          <Animated.View
            style={[
              StyleSheet.absoluteFill,
              {transform: [{translateY: outerLoginY}]},
            ]}>
            <Animated.View
              style={[
                {
                  height: LOGIN_VIEW_HEIGHT,
                  backgroundColor: 'white',
                  transform: [{translateY: innerYLogin}],
                },
                styles.loginBackground,
              ]}>
              <Animated.View>
                <TextTitle type="page" size="large" color="primary">
                  Masuk
                </TextTitle>
              </Animated.View>
              <Animated.View>
                <Animated.View>
                  <LoginInput
                    ref={idInputRef}
                    onChangeText={(value) => {}}
                    style={styles.loginInput}
                    placeholder="ID"
                    returnKeyType="next"
                    onSubmitEditing={() => passwordRef.current?.focus()}
                    blurOnSubmit={false}
                  />
                  <LoginInput
                    ref={passwordRef}
                    onChangeText={(value) => {}}
                    type="password"
                    style={styles.loginInput}
                    placeholder="Kata Sandi"
                  />
                  <TouchableOpacity
                    activeOpacity={0.3}
                    style={styles.btnLoginWrapper}
                    onPress={onSubmit}>
                    <View style={styles.textBtnLogin}>
                      <TextTitle size="large" color="white">
                        Masuk
                      </TextTitle>
                      <Image
                        source={PanahLoginIcon}
                        style={styles.iconBtnLogin}
                      />
                    </View>
                  </TouchableOpacity>
                </Animated.View>
              </Animated.View>
            </Animated.View>
          </Animated.View>
        </View>
      </Background>
    </>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  logoContainer: {
    flexDirection: 'column',
    width: 84,
    justifyContent: 'center',
    alignItems: 'center',
  },

  loginBackground: {
    height: '100%',
    backgroundColor: theme.COLOR.WHITE,
    borderTopLeftRadius: 80,
    borderTopRightRadius: 80,
    padding: 50,
  },
  loginInput: {marginTop: 20},
  btnLoginWrapper: {
    borderTopRightRadius: 100,
    borderBottomRightRadius: 100,
    backgroundColor: theme.COLOR.PRIMARY,
    marginTop: 20,
    height: 50,
    paddingHorizontal: 32,
  },
  textBtnLogin: {
    height: '100%',
    alignItems: 'center',
    justifyContent: 'space-between',
    flexDirection: 'row',
  },
  iconBtnLogin: {
    resizeMode: 'contain',
    alignItems: 'center',
    height: 20,
  },
});

export default Login;
