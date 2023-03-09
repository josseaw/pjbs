import React, {useState} from 'react';
import {
  StyleSheet,
  TextInput,
  View,
  TextInputProps,
  ImageSourcePropType,
  StyleProp,
  ImageStyle,
  Image,
} from 'react-native';

import globalStyles from '../../style/styles';
import theme from '../../style/theme';

interface DrawableInputProps {
  type?: 'text' | 'password';
  drawableLeft?: ImageSourcePropType | undefined;
  drawableRight?: ImageSourcePropType | undefined;
  stylesIconLeft?: StyleProp<ImageStyle>;
  stylesIconRight?: StyleProp<ImageStyle>;
}

type FinalProps = TextInputProps & DrawableInputProps;

const DrawableInput = React.forwardRef<TextInput, FinalProps>(
  (
    {
      focusable,
      style,
      onChangeText,
      placeholder,
      type = 'text',
      drawableLeft,
      drawableRight,
      stylesIconLeft,
      stylesIconRight,
      ...otherProps
    },
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
        {drawableLeft && (
          <Image
            source={drawableLeft}
            style={[globalStyles.icon, stylesIconLeft, styles.icon]}
          />
        )}
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
        {drawableRight && (
          <Image
            source={drawableRight}
            style={[globalStyles.icon, stylesIconRight, styles.icon]}
          />
        )}
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
});

export default DrawableInput;
