import React from 'react';
import {SafeAreaView, StyleSheet, View} from 'react-native';
import {getBackgroundColor} from '../../style/styles';
import theme from '../../style/theme';
import {ColorType} from '../../types/propsType';
import {SCREEN_WIDTH} from '../../utils/constants';

interface WaveComponentProps {
  topColor?: ColorType;
  topBackground?: ColorType;
  topBorder?: number | undefined;
  bottomColor?: ColorType;
  bottomBackground?: ColorType;
  bottomBorder?: number | undefined;
  height?: number;
}

const WaveComponent: React.FC<WaveComponentProps> = ({
  topColor = 'primaryDark',
  topBackground = 'white',
  bottomColor = 'white',
  bottomBackground = 'primaryDark',
  height = 80,
  topBorder = 40,
  bottomBorder = 40,
}) => {
  return (
    <View style={{height: height, width: SCREEN_WIDTH}}>
      <View style={[styles.waveContainer, getBackgroundColor(topBackground)]}>
        <View
          style={[
            styles.wave,
            {
              borderBottomRightRadius: topBorder,
            },
            getBackgroundColor(topColor),
          ]}
        />
      </View>
      <View
        style={[styles.waveContainer, getBackgroundColor(bottomBackground)]}>
        <View
          style={[
            styles.wave,
            {
              borderTopLeftRadius: bottomBorder,
            },
            getBackgroundColor(bottomColor),
          ]}
        />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  waveContainer: {
    height: '50%',
    width: '100%',
  },
  wave: {
    height: '100%',
    width: '100%',
  },
});

export default WaveComponent;
