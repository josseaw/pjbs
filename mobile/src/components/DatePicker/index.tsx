import React, {useState} from 'react';
import {
  Image,
  StyleProp,
  StyleSheet,
  Text,
  View,
  ViewStyle,
  TouchableOpacity as Touch,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {KalenderIcon} from '../../assets/icons';
import globalStyles from '../../style/styles';
import theme from '../../style/theme';
import {SCREEN_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';
import Button from '../Button/Button';
import ModalBottom from '../Modal/ModalBottom';
import {Calendar, LocaleConfig} from 'react-native-calendars';
import AntdIcon from 'react-native-vector-icons/AntDesign';

interface DatePickerProps {
  placeholder?: string;
  style?: StyleProp<ViewStyle>;
}

LocaleConfig.locales['id'] = {
  monthNames: [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ],
  monthNamesShort: [
    'JAN',
    'FEB',
    'MAR',
    'APR',
    'MEI',
    'JUN',
    'JUL.',
    'AGUS',
    'SEPT',
    'OCT',
    'NOV',
    'DES',
  ],
  dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtuu'],
  dayNamesShort: ['MING', 'SEN', 'SEL', 'RAB', 'KAM', 'JUM', 'SAB'],
  today: 'Hari ini',
};
LocaleConfig.defaultLocale = 'id';

const DatePicker: React.FC<DatePickerProps> = ({placeholder, style}) => {
  const [visible, setVisible] = useState(false);

  const handleVisible = () => setVisible((old) => !old);
  return (
    <>
      <TouchableOpacity onPress={handleVisible}>
        <View style={[styles.container, style, styles.notFocused]}>
          <View style={styles.textInput}>
            <Text>{placeholder}</Text>
          </View>
          <Image
            source={KalenderIcon}
            style={[globalStyles.icon, styles.icon]}
          />
        </View>
      </TouchableOpacity>

      <ModalBottom visible={visible}>
        <View>
          <Calendar
            enableSwipeMonths={true}
            hideExtraDays
            renderArrow={(directions) => (
              <AntdIcon name={directions} color={theme.COLOR.PRIMARY_DARK} />
            )}
            theme={{
              selectedDayBackgroundColor: theme.COLOR.PRIMARY_DARK,
              selectedDayTextColor: theme.COLOR.WHITE,
              dayTextColor: theme.COLOR.PRIMARY_DARK,
              monthTextColor: theme.COLOR.PRIMARY_DARK,
            }}
          />
        </View>
        <View style={{flexDirection: 'row'}}>
          <Touch style={{flex: 1, marginRight: 4}} onPress={handleVisible}>
            <Button outline text="Kembali" style={styles.button} />
          </Touch>
          <Touch style={{flex: 1, marginLeft: 4}}>
            <Button text="Konfirmasi Jam" style={styles.button} />
          </Touch>
        </View>
      </ModalBottom>
    </>
  );
};

const styles = StyleSheet.create({
  shadow: {
    flex: 1,
    backgroundColor: 'rgba(0,0,0,0.5)',
  },
  modalBottom: {
    backgroundColor: theme.COLOR.WHITE,
    borderTopLeftRadius: 80,
    width: SCREEN_WIDTH,
    height: SCREEN_HEIGHT / 2,
    padding: 24,
    justifyContent: 'space-between',
  },
  textInput: {
    paddingLeft: 4,
    flexGrow: 1,
    // backgroundColor: 'red',
  },
  notFocused: {
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    color: theme.COLOR.GRAY_LIGHT,
    backgroundColor: theme.COLOR.WHITE,
    borderColor: theme.COLOR.PRIMARY,
    borderWidth: 1,
  },
  container: {
    flexDirection: 'row',
    justifyContent: 'center',
    padding: 3,
    alignItems: 'center',
    height: 50,
    borderRadius: 8,
  },
  inputStyle: {
    flex: 1,
  },
  icon: {
    marginHorizontal: 8,
  },
  button: {borderRadius: 10, paddingVertical: 12},
});

export default DatePicker;
