import React from 'react';
import {
  StyleProp,
  StyleSheet,
  TextInput,
  TouchableOpacity,
  View,
  ViewStyle,
} from 'react-native';
import FAIcon from 'react-native-vector-icons/FontAwesome5';
import theme from '../../style/theme';

interface NumberInputProps {
  style?: StyleProp<ViewStyle>;
  value?: string;
  onPressReduce: (oldValue: string, currentValue: string) => void;
  onPressIncrease: (oldValue: string, currentValue: string) => void;
  minValue?: number;
  maxValue?: number;
}

const NumberInput: React.FC<NumberInputProps> = ({
  value,
  style,
  onPressIncrease = () => {},
  onPressReduce = () => {},
  minValue = 0,
  maxValue = 100000,
}) => {
  const handleMinus = () => {
    const oldValue = Number(value || minValue);
    let currentValue = Number(value || minValue);

    if (oldValue > minValue) {
      currentValue -= 1;
    }

    onPressReduce(String(oldValue), String(currentValue));
  };
  const handlePlus = () => {
    const oldValue = Number(value || minValue);
    let currentValue = Number(value || minValue);

    if (oldValue < maxValue) {
      currentValue += 1;
    }

    onPressIncrease(String(oldValue), String(currentValue));
  };
  return (
    <View style={[styles.container, style]}>
      <TouchableOpacity style={styles.button} onPress={handleMinus}>
        <FAIcon name="minus" color={theme.COLOR.WHITE} />
      </TouchableOpacity>

      <TextInput
        keyboardType="numeric"
        style={styles.input}
        value={value || String(minValue)}
      />

      <TouchableOpacity style={styles.button} onPress={handlePlus}>
        <FAIcon name="plus" color={theme.COLOR.WHITE} />
      </TouchableOpacity>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {flexDirection: 'row', alignItems: 'center'},
  button: {
    backgroundColor: theme.COLOR.PRIMARY_DARK,
    paddingVertical: 12,
    paddingHorizontal: 12,
    borderRadius: 8,
  },
  input: {
    width: 50,
    color: theme.COLOR.PRIMARY_DARK,
    alignItems: 'center',
    textAlign: 'center',
  },
});

export default NumberInput;
