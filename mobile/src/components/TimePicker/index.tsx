import React, {useEffect, useState} from 'react';
import {
  View,
  TouchableOpacity as Touch,
  Image,
  Modal,
  StyleSheet,
  ViewStyle,
  StyleProp,
  Text,
  ScrollView,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {JamIcon} from '../../assets/icons';
import globalStyles from '../../style/styles';
import theme from '../../style/theme';
import {SCREEN_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';
import Button from '../Button/Button';
import {
  TimePicker as Picker,
  WheelPicker,
} from 'react-native-wheel-picker-android';

import {
  hourTo24Format,
  hourTo12Format,
  getHoursArray,
  getFiveMinutesArray,
  getAmArray,
} from '../../utils/common';
import TextTitle from '../Text/TextTitle';
import ModalBottom from '../Modal/ModalBottom';

const HOUR = 60;

interface TimePickerProps {
  value?: string;
  onTimeChange?: ((text: string) => void) | undefined;
  placeholder?: string;
  style?: StyleProp<ViewStyle>;
}

type StateTimePicker = {
  selectedDate: Date;
  hours: string[];
  minutes: string[];
  selectedHourIndex: number;
  selectedMinuteIndex: number;
};

const TimePicker: React.FC<TimePickerProps> = ({
  value = '',
  onTimeChange = () => {},
  placeholder = '',
  style,
  initDate,
}) => {
  const [visible, setVisible] = useState(false);
  const [valueTemporary, setValueTemporary] = useState<Date>();

  const selectedDate = initDate ? new Date(initDate) : new Date();
  const time24format = selectedDate.getHours();
  const hours = getHoursArray(true);
  const selectedHourIndex = time24format;
  const minutesCount = 12;
  const selectedMinuteIndex = Math.round(
    selectedDate.getMinutes() / (HOUR / minutesCount),
  );

  const [state, setState] = useState<StateTimePicker>({
    selectedDate,
    hours,
    minutes: getFiveMinutesArray(),
    selectedHourIndex,
    selectedMinuteIndex,
  });

  //   useEffect(() => {
  //     if (visible) {
  //       setValueTemporary(value);
  //     }
  //   }, [value, visible]);

  //   const handleSelectedTime = () => {
  //     onTimeChange(valueTemporary);
  //   };

  const handleVisible = () => {
    setVisible((old) => !old);
  };

  const onHourSelected = (position: number) => {
    const {selectedDate: date, hours: hoursData} = state;
    const selectedHour = hoursData[position];

    date.setHours(Number(selectedHour));

    setState((old) => ({...old, selectedHourIndex: position}));
    setValueTemporary(selectedDate);
  };

  const onMinuteSelected = (position: number) => {
    const {selectedDate: date, minutes: minutesData} = state;
    date.setMinutes(Number(minutesData[position]));
    setState((old) => ({...old, selectedMinuteIndex: position}));
    setValueTemporary(selectedDate);
  };

  return (
    <>
      <TouchableOpacity onPress={handleVisible}>
        <View style={[styles.container, style, styles.notFocused]}>
          <View style={styles.textInput}>
            <Text>{placeholder}</Text>
          </View>
          <Image source={JamIcon} style={[globalStyles.icon, styles.icon]} />
        </View>
      </TouchableOpacity>
      <ModalBottom visible={visible}>
        <ScrollView style={styles.scrollContainer}>
          <View style={styles.wheelContainer}>
            <View style={{flex: 1}}>
              <TextTitle
                textAlign="center"
                weight="bold"
                size="small"
                type="page"
                style={{marginBottom: 16}}>
                JAM
              </TextTitle>
              <WheelPicker
                isCyclic
                style={styles.wheelPicker}
                data={state.hours}
                onItemSelected={onHourSelected}
                selectedItem={state.selectedHourIndex}
                initPosition={0}
                selectedItemTextFontFamily="robot"
                itemTextFontFamily="roboto"
                itemTextSize={40}
                selectedItemTextSize={40}
                indicatorColor={theme.COLOR.PRIMARY_DARK}
                indicatorWidth={4}
              />
            </View>
            <View style={{flex: 1}}>
              <TextTitle
                textAlign="center"
                weight="bold"
                size="small"
                type="page"
                style={{marginBottom: 16}}>
                MENIT
              </TextTitle>
              <WheelPicker
                style={styles.wheelPicker}
                isCyclic
                data={state.minutes}
                onItemSelected={onMinuteSelected}
                selectedItem={state.selectedMinuteIndex}
                initPosition={0}
                selectedItemTextFontFamily="robot"
                itemTextFontFamily="roboto"
                itemTextSize={40}
                selectedItemTextSize={40}
                indicatorColor={theme.COLOR.PRIMARY_DARK}
                indicatorWidth={4}
              />
            </View>
          </View>
        </ScrollView>

        <View style={{flexDirection: 'row'}}>
          <Touch style={{flex: 1, marginRight: 4}} onPress={handleVisible}>
            <Button outline text="Kembali" />
          </Touch>
          <Touch style={{flex: 1, marginLeft: 4}}>
            <Button text="Konfirmasi Jam" />
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
  scrollContainer: {
    flexGrow: 1,
  },
  wheelContainer: {
    alignItems: 'center',
    flexDirection: 'row',
    // height: SCREEN_HEIGHT / 2,
    flex: 1,
    paddingHorizontal: 16,
  },
  wheelPicker: {
    height: 250,
    // width: null,
    // flex: 1,
    // backgroundColor: 'green',
  },
});

export default TimePicker;
