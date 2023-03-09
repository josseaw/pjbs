import React, {useState} from 'react';
import {StatusBar, StyleSheet, Text, View} from 'react-native';
import theme from '../../style/theme';
import {SCREEN_WIDTH} from '../../utils/constants';
import AntdIcon from 'react-native-vector-icons/AntDesign';
import FAIcon from 'react-native-vector-icons/FontAwesome';
import Animated, {
  Extrapolate,
  interpolate,
  useValue,
} from 'react-native-reanimated';
import TextTitle from '../../components/Text/TextTitle';
import WaveComponent from '../../components/Wave/WaveComponent';
import DrawableInput from '../../components/TextInput/DrawableInput';
import {TouchableOpacity} from 'react-native-gesture-handler';
import Textarea from '../../components/TextInput/Textarea';
import ButtonArrow from '../../components/Button/ButtonArrow';
import Background from '../../components/Background';
import {onScrollEvent} from 'react-native-redash';
import {useNavigation} from '@react-navigation/native';
import TimePicker from '../../components/TimePicker';
import DatePicker from '../../components/DatePicker';
import InputSelect from '../../components/Select/InputSelect';
import Button from '../../components/Button/Button';
import NumberInput from '../../components/TextInput/NumberInput';
interface FormPemesananProps {}

const optionsStatusDinas = [
  {
    label: 'Football',
    value: 'football',
  },
  {
    label: 'Baseball',
    value: 'baseball',
  },
  {
    label: 'Hockey',
    value: 'hockey',
  },
];

const FormPemesanan: React.FC<FormPemesananProps> = ({}) => {
  const navigation = useNavigation();
  const scrollY = useValue(0);
  const [dataForm, setDataForm] = useState({
    penumpang: 1,
  });
  const [tujuan, setTujuan] = useState([
    {name: '', longitude: '', latitude: ''},
  ]);

  const heightHeader = interpolate(scrollY, {
    inputRange: [0, 150],
    outputRange: [85, 60],
    extrapolate: Extrapolate.CLAMP,
  });

  const yHeader = interpolate(scrollY, {
    inputRange: [0, 150],
    outputRange: [20, 0],
    extrapolate: Extrapolate.CLAMP,
  });

  const backAction = () => navigation.goBack();

  const onChange = (name: string, value: string) => {
    setDataForm((old) => ({
      ...old,
      [name]: value,
    }));
  };
  return (
    <>
      <StatusBar
        backgroundColor={theme.COLOR.PRIMARY_DARK}
        barStyle="light-content"
      />
      <View>
        <Animated.View style={[styles.headerContainer, {height: heightHeader}]}>
          <Animated.View
            style={[
              styles.header,
              {
                transform: [{translateY: yHeader}],
              },
            ]}>
            <TouchableOpacity onPress={backAction}>
              <AntdIcon name="arrowleft" size={24} color={theme.COLOR.WHITE} />
            </TouchableOpacity>
            <View style={{flexGrow: 1}}>
              <Animated.Text style={[styles.titleHeader]}>
                Pemesanan Kendaraan
              </Animated.Text>
            </View>
          </Animated.View>
        </Animated.View>
      </View>

      <Animated.ScrollView
        scrollEventThrottle={16}
        onScroll={onScrollEvent({y: scrollY})}
        showsVerticalScrollIndicator={false}
        style={{backgroundColor: theme.COLOR.PRIMARY_DARK}}>
        <Background type="blue">
          <WaveComponent />
          <View style={[styles.formContainer]}>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Tanggal Berangkat</TextTitle>
              <DatePicker placeholder="dd/mm/yy" />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Jam Berangkat</TextTitle>
              <TimePicker />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Tanggal Kembali</TextTitle>
              <DatePicker placeholder="dd/mm/yy" />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Jam Kembali</TextTitle>
              <TimePicker />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 4}}>Jumlah Penumpang</TextTitle>
              <NumberInput
                onPressReduce={(oldValue, currentValue) => {
                  onChange('penumpang', currentValue);
                }}
                onPressIncrease={(oldValue, currentValue) => {
                  onChange('penumpang', currentValue);
                }}
                minValue={1}
                value={String(dataForm.penumpang)}
              />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Status Dinas</TextTitle>
              <InputSelect
                placeholder="Pilih status dinas"
                items={optionsStatusDinas}
                onSelect={(value) => console.warn(value)}
              />
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Tujuan</TextTitle>
              {tujuan.map((item, index) => (
                <DrawableInput
                  style={{marginBottom: 4}}
                  key={index}
                  editable={false}
                />
              ))}
              <View style={styles.btnContainer}>
                <Button style={styles.button}>
                  <View style={styles.textContainer}>
                    <FAIcon name="plus" color={theme.COLOR.WHITE} />
                    <Text style={styles.textButton}>Tambah tujuan</Text>
                  </View>
                </Button>
              </View>
            </View>
            <View style={{marginBottom: 16}}>
              <TextTitle style={{marginBottom: 8}}>Keperluan</TextTitle>
              <Textarea style={styles.textArea} />
            </View>
            <View style={styles.arrowContainer}>
              <ButtonArrow />
            </View>
          </View>

          <View style={{marginBottom: 150}}>
            <WaveComponent
              topBackground="primary"
              topColor="white"
              bottomBackground="white"
              bottomColor="primary"
            />
          </View>
        </Background>
      </Animated.ScrollView>
    </>
  );
};

const styles = StyleSheet.create({
  headerContainer: {
    width: SCREEN_WIDTH,
    backgroundColor: theme.COLOR.PRIMARY_DARK,
    paddingHorizontal: 16,
    justifyContent: 'center',
  },
  header: {flexDirection: 'row', justifyContent: 'center'},
  titleHeader: {
    color: theme.COLOR.WHITE,
    fontWeight: 'bold',
    fontSize: theme.FONT_SIZE.TITLE_PAGE_SMALL,
    marginLeft: 24,
  },
  formContainer: {backgroundColor: theme.COLOR.WHITE, paddingHorizontal: 16},
  btnContainer: {flexDirection: 'row', justifyContent: 'flex-end'},
  button: {paddingHorizontal: 16, borderRadius: 10},
  textContainer: {flexDirection: 'row', alignItems: 'center'},
  textButton: {
    fontWeight: 'bold',
    color: theme.COLOR.WHITE,
    marginLeft: 8,
  },
  textArea: {
    borderRadius: 10,
    borderColor: theme.COLOR.PRIMARY_DARK,
  },
  arrowContainer: {
    flexDirection: 'row',
    marginTop: 8,
    justifyContent: 'flex-end',
  },
});

export default FormPemesanan;
