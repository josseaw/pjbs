import React from 'react';
import Picker, {Item} from 'react-native-picker-select';
import theme from '../../style/theme';
import AntdIcon from 'react-native-vector-icons/AntDesign';
import {StyleSheet} from 'react-native';

interface InputSelectProps {
  placeholder?: string;
  items: Item[];
  value?: string;
  onSelect?: (value: any, index: number) => void;
}

const InputSelect: React.FC<InputSelectProps> = ({
  placeholder = '',
  items,
  value,
  onSelect = () => {},
}) => {
  return (
    <Picker
      items={items}
      value={value}
      onValueChange={onSelect}
      placeholder={{
        label: placeholder,
        value: null,
        color: theme.COLOR.GRAY_DARK,
      }}
      style={pickerSelectStyles}
      useNativeAndroidPickerStyle={false}
      Icon={() => <AntdIcon name="caretdown" />}
    />
  );
};

const pickerSelectStyles = StyleSheet.create({
  inputIOS: {
    fontSize: 16,
    paddingVertical: 12,
    paddingHorizontal: 10,
    borderColor: theme.COLOR.PRIMARY,
    borderWidth: 1,
    borderRadius: 4,
    color: 'black',
    paddingRight: 30, // to ensure the text is never behind the icon
  },
  inputAndroid: {
    fontSize: 16,
    paddingHorizontal: 10,
    paddingVertical: 8,
    borderColor: theme.COLOR.PRIMARY,
    borderWidth: 1,
    borderRadius: 8,
    color: 'black',
    paddingRight: 30, // to ensure the text is never behind the icon
  },
  iconContainer: {
    top: 15,
    right: 15,
  },
});

export default InputSelect;
