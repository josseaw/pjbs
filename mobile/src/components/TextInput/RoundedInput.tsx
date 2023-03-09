import React, {useState} from 'react';
import {StyleSheet, TextInput, View, TextInputProps} from 'react-native';
import theme from '../../style/theme';

interface RoundedInputProps {
  type?: 'text' | 'password';
}

type FinalProps = TextInputProps & RoundedInputProps;

const RoundedInput = React.forwardRef<TextInput, FinalProps>(
  (
    {focusable, style, onChangeText, placeholder, type = 'text', ...otherProps},
    forwardedRef,
  ) => {
    const [focusState, setFocusState] = useState(focusable);
    return (
      <View
        style={[
          styles.container,
          style,
          focusState ? styles.focused : styles.notFocused,
        ]}>
        <TextInput
          {...otherProps}
          ref={forwardedRef}
          focusable={focusState}
          onChangeText={onChangeText}
          onFocus={() => setFocusState(true)}
          onBlur={() => setFocusState(false)}
          style={styles.textInput}
          placeholder={placeholder}
          secureTextEntry={type === 'password'}
        />
      </View>
    );
  },
);

const styles = StyleSheet.create({
  focused: {
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    color: theme.COLOR.PRIMARY,
    backgroundColor: theme.COLOR.WHITE,
    borderColor: theme.COLOR.PRIMARY_LIGHT,
    borderWidth: 1,
  },
  textInput: {
    paddingLeft: 15,
    width: '100%',
    paddingVertical: 8,
  },
  notFocused: {
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    color: theme.COLOR.GRAY_LIGHT,
    backgroundColor: theme.COLOR.WHITE,
    borderColor: theme.COLOR.WHITE,
    borderWidth: 1,
  },
  container: {
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: 50,
  },
  inputStyle: {
    flex: 1,
  },
});

export default RoundedInput;
