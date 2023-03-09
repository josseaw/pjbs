import React from 'react';
import {StyleSheet, View} from 'react-native';
import {getBackgroundColor} from '../../style/styles';
import {ColorType} from '../../types/propsType';

interface DividerHorizontalProps {
  color?: ColorType | 'default';
  margin?: number | string | 'default';
  opacity?: number;
}

const DividerHorizontal: React.FC<DividerHorizontalProps> = ({
  color = 'default',
  margin = 'default',
  opacity = 0.3,
}) => {
  return (
    <View
      style={[
        styles.divider,
        color === 'default' ? styles.defaultColor : getBackgroundColor(color),
        margin === 'default' ? styles.defaultMargin : {marginVertical: margin},
        {opacity},
      ]}
    />
  );
};

const styles = StyleSheet.create({
  divider: {
    height: 1,
    width: '100%',
  },
  defaultColor: {
    backgroundColor: '#453823',
  },
  defaultMargin: {
    marginVertical: 6,
  },
});

export default DividerHorizontal;
