import React from 'react';
import {
  View,
  FlatList,
  Text,
  BackHandler,
  GestureResponderEvent,
  StyleProp,
  ViewStyle,
  StyleSheet,
} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';
import {JamPutihIcon, KendaraanPutihIcon} from '../../assets/icons';
import {SopirImage} from '../../assets/images';
import {BadgeType, getBadgeColor} from '../../utils/common';
import BadgeText from '../Badge/BadgeText';
import CroppedImage from '../Image/CroppedImage';
import TextDrawable from '../Text/TextDrawable';
import TextTitle from '../Text/TextTitle';

export type SopirType = {
  id: number;
  title: string;
  pesanan: string;
  hours: string;
  sopir_number: string;
  plate_number: string;
  status: string;
};

interface SopirMonitoringCardProps {
  data: SopirType;
  onPress?: ((event: GestureResponderEvent) => void) | undefined;
  style?: StyleProp<ViewStyle>;
}

const SopirMonitoringCard: React.FC<SopirMonitoringCardProps> = ({
  data,
  onPress,
  style,
}) => {
  return (
    <TouchableOpacity onPress={onPress}>
      <View style={[styles.cardContainer, style]}>
        <View>
          <CroppedImage
            width={100}
            height={150}
            cropHeight={80}
            cropWidth={80}
            resizeMode="center"
            source={SopirImage}
            cropLeft={15}
            cropTop={20}
            style={{borderRadius: 20}}
          />
        </View>
        <View style={[styles.detailContainer]}>
          <View style={{flexDirection: 'row'}}>
            <View style={{flex: 1}}>
              <TextTitle color="white" weight="bold">
                {data.title}
              </TextTitle>
            </View>
            <View style={{flex: 1}}>
              <View style={{alignItems: 'flex-end'}}>
                <BadgeText
                  color={getBadgeColor(data.status, BadgeType.MONITORING)}
                  text={data.status}
                />
              </View>
            </View>
          </View>
          <View style={{flexDirection: 'row'}}>
            <View style={{flex: 1}}>
              <TextTitle color="grayLight" weight="bold" opacity="secondary">
                {data.sopir_number}
              </TextTitle>
            </View>
            <View style={{flexGrow: 1}}>
              <TextDrawable
                drawableLeft={JamPutihIcon}
                text={`${data.pesanan} pesanan/ ${data.hours} jam`}
                textColor="white"
              />
              <TextDrawable
                drawableLeft={KendaraanPutihIcon}
                styleContainer={{marginTop: 4}}
                text={data.plate_number}
                textColor="white"
              />
            </View>
          </View>
        </View>
      </View>
    </TouchableOpacity>
  );
};

const styles = StyleSheet.create({
  cardContainer: {flexDirection: 'row', marginVertical: 12},
  detailContainer: {
    flexGrow: 1,
    paddingLeft: 16,
  },
});

export default SopirMonitoringCard;
