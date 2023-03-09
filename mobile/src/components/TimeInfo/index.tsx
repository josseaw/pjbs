import React from 'react';
import {StyleProp, StyleSheet, Text, View, ViewStyle} from 'react-native';
import {getBackgroundColor, getColor, getTextColor} from '../../style/styles';
import theme from '../../style/theme';
import {ColorType} from '../../types/propsType';

export type DataTimeType = {
  fromTime: string;
  timeZone: string;
  fromDate: string;
  toTime: string;
  toDate: string;
};

interface TimeInfoProps {
  style?: StyleProp<ViewStyle>;
  colorDot?: ColorType;
  colorDivider?: ColorType | 'default';
  colorLineLeft?: ColorType | 'default';
  textColor?: ColorType;
  data: DataTimeType;
}

const TimeInfo: React.FC<TimeInfoProps> = ({
  style,
  colorDot = 'primary',
  colorDivider = 'default',
  colorLineLeft = 'default',
  textColor = 'secondary',
  data,
}) => {
  return (
    <View style={[styles.container, style]}>
      <View style={styles.lineLeftContainer}>
        <View style={[styles.dot, getBackgroundColor(colorDot)]} />
        <View
          style={[
            styles.lineLeft,
            colorLineLeft === 'default'
              ? styles.lineLeftDefault
              : {borderColor: getColor(colorLineLeft)},
          ]}
        />
        <View style={[styles.dot, getBackgroundColor(colorDot)]} />
      </View>
      <View style={{flexGrow: 1}}>
        <View style={[styles.containerTime]}>
          <Text style={[styles.titleTimePrimary, getTextColor(textColor)]}>
            {data.fromTime}
          </Text>
          <Text style={[styles.timeZone, getTextColor(textColor)]}>
            {data.timeZone}
          </Text>
          <Text style={[styles.date, getTextColor(textColor)]}>
            {data.fromDate}
          </Text>
        </View>
        <View
          style={[
            styles.divider,
            colorDivider === 'default'
              ? styles.lineLeftDefault
              : {borderColor: getColor(colorDivider)},
          ]}
        />
        <View style={[styles.containerTime]}>
          <Text style={[styles.titleTimePrimary, getTextColor(textColor)]}>
            {data.toTime}
          </Text>
          <Text style={[styles.timeZone, getTextColor(textColor)]}>
            {data.timeZone}
          </Text>

          <Text style={[styles.date, getTextColor(textColor)]}>
            {data.toDate}
          </Text>
        </View>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flexDirection: 'row',
  },
  lineLeftContainer: {
    paddingVertical: 6,
    paddingRight: 8,
    alignItems: 'center',
    justifyContent: 'center',
  },
  dot: {
    width: 6,
    height: 6,
    borderRadius: 100,
  },
  lineLeft: {
    marginVertical: 4,
    borderRightWidth: 1,
    opacity: 0.75,
    flexGrow: 1,
  },
  lineLeftDefault: {
    borderColor: '#453823',
  },
  containerTime: {
    flexDirection: 'row',
    alignItems: 'flex-end',
  },
  titleTimePrimary: {
    fontSize: theme.FONT_SIZE.TITLE_LARGE,
    fontWeight: theme.FONT_WEIGHT.BOLD,
  },
  timeZone: {
    marginLeft: 4,
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    fontWeight: theme.FONT_WEIGHT.BOLD,
    marginBottom: 2,
  },
  date: {
    fontSize: theme.FONT_SIZE.TEXT_SMALL,
    marginBottom: 2,
    marginLeft: 12,
  },
  divider: {
    marginVertical: 6,
    borderTopWidth: 1,
    borderColor: '#453823',
    opacity: 0.1,
  },
});

export default TimeInfo;
