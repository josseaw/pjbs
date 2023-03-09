import React, {useState} from 'react';
import {StyleSheet, TextInput, View, TextInputProps} from 'react-native';
import theme from '../../style/theme';

const Textarea = React.forwardRef<TextInput, TextInputProps>(
  (
    {focusable, style, onChangeText, placeholder, ...otherProps},
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
          multiline={true}
          numberOfLines={8}
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
    borderColor: theme.COLOR.PRIMARY,
    borderWidth: 1,
  },
  textInput: {
    paddingLeft: 15,
    width: '100%',
    paddingVertical: 8,
    textAlignVertical: 'top',
  },
  notFocused: {
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    color: theme.COLOR.GRAY_LIGHT,
    backgroundColor: theme.COLOR.WHITE,
    borderColor: theme.COLOR.GRAY_DARK,
    borderWidth: 1,
  },
  container: {
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: 20,
  },
  inputStyle: {
    flex: 1,
  },
});

export default Textarea;
