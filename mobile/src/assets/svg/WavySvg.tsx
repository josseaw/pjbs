import React from 'react';
import {Dimensions, StyleProp, StyleSheet, View, ViewStyle} from 'react-native';
import Svg, {Path, Mask, G, Rect} from 'react-native-svg';
import {SCREEN_HEIGHT, SCREEN_WIDTH} from '../../utils/constants';

interface WavySvgProps {
  width?: number | string;
  yPosition?: number | string;
  styleWrapper?: StyleProp<ViewStyle>;
}

const WavySvg: React.FC<WavySvgProps> = ({
  width = 415,
  yPosition = 154,
  styleWrapper,
}) => {
  return (
    <View style={[StyleSheet.absoluteFill, {width}, styleWrapper]}>
      <View style={{height: 151}}>
        <Svg width="100%" height={yPosition} viewBox="0 0 1460 532" fill="none">
          <Mask id="header-wave" x="0" y="0" height={532}>
            <Rect width="100%" height={532} fill="white" />
          </Mask>
          <G mask="url(#header-wave)">
            <Path
              d="M-11.8664 224.569C-11.8664 224.569 179.534 125.986 462.722 405.306C745.909 684.627 731.52 82.1716 731.52 82.1716V0.0175781H-31.6626L-11.8664 224.569Z"
              fill="white"
            />
            <Path
              d="M1473.97 224.555C1473.97 224.555 1282.56 125.972 999.378 405.292C716.19 684.613 730.579 82.1575 730.579 82.1575L730.579 0.00346844L1493.76 0.00346844L1473.97 224.555Z"
              fill="white"
            />
            <Path
              d="M732.206 531.229C894.444 531.229 1025.96 412.309 1025.96 265.614C1025.96 118.92 894.444 0 732.206 0C569.967 0 438.447 118.92 438.447 265.614C438.447 412.309 569.967 531.229 732.206 531.229Z"
              fill="white"
            />
          </G>
        </Svg>
      </View>
    </View>
  );
};

export default WavySvg;
