import React from 'react';
import {StyleSheet, View} from 'react-native';
import {JamPutihIcon, LokasiPutihIcon} from '../../assets/icons';
import {BadgeType, getBadgeColor} from '../../utils/common';
import BadgeText from '../Badge/BadgeText';
import TextDrawable from '../Text/TextDrawable';
import TextTitle from '../Text/TextTitle';

export type DashboardDataType = {
  id: number;
  title: string;
  status: string;
  time: string;
  locations: LocationType[];
};

export type LocationType = {name: string};

interface DashboardCardProps {
  renderImage:
    | React.ComponentClass<any, any>
    | React.FunctionComponent<any>
    | React.ReactElement<any, string>;
  data: DashboardDataType;
  typeBadge?: BadgeType;
  noBadge?: Boolean;
}

const DashboardCard: React.FC<DashboardCardProps> = ({
  renderImage,
  data,
  typeBadge = BadgeType.NORMAL,
  noBadge = false,
}) => {
  return (
    <View style={styles.cardContainer}>
      <View>{renderImage}</View>
      <View style={styles.detailContainer}>
        <View style={{flexDirection: 'row'}}>
          <View style={{flex: 1}}>
            <TextTitle color="white" weight="bold">
              {data.title}
            </TextTitle>
          </View>
          <View style={{flex: 1}}>
            <View style={{alignItems: 'flex-end'}}>
              {!noBadge &&
                (data.status ? (
                  <BadgeText
                    color={getBadgeColor(data.status, typeBadge)}
                    text={data.status}
                  />
                ) : null)}
            </View>
          </View>
        </View>
        <TextDrawable
          text={data.time}
          drawableLeft={JamPutihIcon}
          textColor="grayLight"
          styleContainer={{marginTop: 6}}
        />
        {data.locations.map((loc) => (
          <TextDrawable
            text={loc.name}
            drawableLeft={LokasiPutihIcon}
            textColor="grayLight"
            styleContainer={{marginTop: 6}}
          />
        ))}
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  cardContainer: {flexDirection: 'row', marginVertical: 8},
  detailContainer: {
    flexGrow: 1,
    paddingLeft: 16,
  },
});

export default DashboardCard;
