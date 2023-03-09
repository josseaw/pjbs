import React from 'react';
import {StyleSheet, View} from 'react-native';
import {KendaraanBiruIcon} from '../../assets/icons';
import theme from '../../style/theme';
import {BadgeType, getBadgeColor} from '../../utils/common';
import BadgeText from '../Badge/BadgeText';
import TextDrawable from '../Text/TextDrawable';
import TextTitle from '../Text/TextTitle';

export type KendaraanType = {
  id: number;
  title: string;
  number: string;
  description: string;
  status: string;
};

interface KendaraanCardProps {
  data: KendaraanType;
}

const KendaraanCard: React.FC<KendaraanCardProps> = ({data}) => {
  return (
    <View style={styles.cardContainer}>
      <View style={styles.detailContainer}>
        <View style={{flexDirection: 'row'}}>
          <View style={{flexGrow: 1}}>
            <View>
              <TextTitle size="large" weight="bold">
                {data.title}
              </TextTitle>
              <TextTitle size="large" weight="light">
                {data.number}
              </TextTitle>
            </View>
          </View>
          <View style={{alignItems: 'flex-end'}}>
            {data.status ? (
              <BadgeText
                color={getBadgeColor(data.status, BadgeType.MONITORING)}
                text={data.status}
              />
            ) : (
              ''
            )}
          </View>
        </View>
        <View>
          <TextDrawable
            text={data.description}
            drawableLeft={KendaraanBiruIcon}
          />
        </View>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  cardContainer: {
    backgroundColor: theme.COLOR.GRAY_LIGHT,
    borderRadius: 20,
    paddingHorizontal: 20,
    paddingVertical: 16,
    // marginHorizontal: 16,
    marginBottom: 8,
  },
  detailContainer: {
    justifyContent: 'space-between',
    flexGrow: 1,
  },
  dotContainer: {
    paddingVertical: 16,
    paddingLeft: 32,
    paddingRight: 12,
    justifyContent: 'center',
  },
  dot: {
    width: 6,
    height: 6,
    backgroundColor: theme.COLOR.PRIMARY,
    borderRadius: 6,
    marginVertical: 4,
  },
});

export default KendaraanCard;
