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
import {
  JamCoklatIcon,
  JamPutihIcon,
  KendaraanCoklatIcon,
  KendaraanPutihIcon,
} from '../../assets/icons';
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
  tersedia: string;
};

interface PilihSopirCardProps {
  data: SopirType;
  onPress?: ((event: GestureResponderEvent) => void) | undefined;
  style?: StyleProp<ViewStyle>;
}

const PilihSopirCard: React.FC<PilihSopirCardProps> = ({
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
          <View style={{flexGrow: 1}}>
            <TextTitle color="secondary" weight="bold">
              {data.title}
            </TextTitle>

            <View style={{flexDirection: 'row'}}>
              <View style={{flex: 2}}>
                <TextTitle color="secondary" opacity="secondary">
                  {data.sopir_number}
                </TextTitle>
              </View>
              <View style={{flexGrow: 1, paddingTop: 2}}>
                <TextDrawable
                  drawableLeft={JamCoklatIcon}
                  text={`${data.pesanan} pesanan/ ${data.hours} jam`}
                  textColor="secondary"
                />
                <TextDrawable
                  drawableLeft={KendaraanCoklatIcon}
                  styleContainer={{marginTop: 4}}
                  text={data.plate_number}
                  textColor="secondary"
                />
              </View>
            </View>
          </View>
          <View>
            <TextTitle weight="light" color="secondary">
              Jam Tersedia
            </TextTitle>
            <TextTitle weight="bold" textAlign="right" color="secondary">
              {data.tersedia}
            </TextTitle>
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
    flexDirection: 'row',
  },
});

export default PilihSopirCard;
