import React from 'react';
import {
  Animated,
  GestureResponderEvent,
  Image,
  StyleSheet,
  Text,
  TouchableHighlight,
  View,
} from 'react-native';
import {
  JamCoklatIcon,
  LokasiCoklatIcon,
  PenumpangIcon,
  TelephoneIcon,
} from '../../assets/icons';
import theme from '../../style/theme';
import {
  TouchableOpacity,
  TouchableWithoutFeedback,
} from 'react-native-gesture-handler';
import BadgeText from '../Badge/BadgeText';
import {ColorType} from '../../types/propsType';
import TextDrawable from '../Text/TextDrawable';

import Button from '../Button/Button';
import TimeInfo, {DataTimeType} from '../TimeInfo';

export type NotificationCardType = {
  title: string;
  time: string;
  telp: string;
  location: string;
  person: string;
  dataTime: DataTimeType;
  otherDetail: {
    statusDinas?: string;
    keperluan?: string;
    catatanManajer?: string;
    catatanAdmin?: string;
  };
};

export interface NotificationCardProps {
  data: NotificationCardType;
  isExpand?: Boolean;
  noTelp?: Boolean;
  showButton?: Boolean;
  colorBadge?: ColorType;
  textBadge?: string;
  noBadge?: Boolean;
  onPressCard?: ((event: GestureResponderEvent) => void) | undefined;
  onReject?: ((event: GestureResponderEvent) => void) | undefined;
  onApprove?: ((event: GestureResponderEvent) => void) | undefined;
}

const NotificationCard: React.FC<NotificationCardProps> = ({
  data,
  isExpand = false,
  showButton = false,
  colorBadge = 'primary',
  noBadge = false,
  noTelp = false,
  textBadge = '',
  onPressCard,
  onReject,
  onApprove,
}) => {
  return (
    <View style={[styles.cardContainer]}>
      <View style={styles.cardPadding}>
        <TouchableWithoutFeedback onPress={onPressCard}>
          <View>
            <View style={{marginBottom: 8}}>
              <View style={{flexDirection: 'row'}}>
                <View style={{flex: 3}}>
                  <Text style={styles.titleCard}>{data.title}</Text>
                </View>
                {!noBadge && (
                  <View style={{flex: 2}}>
                    <View style={{alignItems: 'flex-end'}}>
                      <BadgeText text={textBadge} color={colorBadge} />
                    </View>
                  </View>
                )}
              </View>
            </View>
            <View style={{flexDirection: 'row'}}>
              <View style={{flex: 3}}>
                <TextDrawable
                  drawableLeft={JamCoklatIcon}
                  text={data.time}
                  styleContainer={{marginTop: 6}}
                  opacity
                />
                {!noTelp && (
                  <TextDrawable
                    drawableLeft={TelephoneIcon}
                    text={data.telp}
                    styleContainer={{marginTop: 6}}
                  />
                )}
              </View>
              <View style={{flex: 2}}>
                <TextDrawable
                  drawableLeft={LokasiCoklatIcon}
                  text={data.location}
                  styleContainer={{marginTop: 6, marginLeft: 24}}
                />
                <TextDrawable
                  drawableLeft={PenumpangIcon}
                  text={data.person}
                  styleContainer={{marginTop: 6, marginLeft: 24}}
                />
              </View>
            </View>
            {/* <View style={{marginBottom: 8, height: 40}}></View> */}
            <TimeInfo data={data.dataTime} style={{marginTop: 24}} />
            {/* Jika admin atau manajer */}
            {isExpand && (
              <View style={{marginTop: 24}}>
                <View style={{marginBottom: 8}}>
                  <Text style={styles.title}>Status Dinas</Text>
                  <Text style={styles.description}>
                    {data.otherDetail.statusDinas || '-'}
                  </Text>
                </View>
                <View style={{marginBottom: 8}}>
                  <Text style={styles.title}>Keperluan</Text>
                  <Text style={styles.description}>
                    {data.otherDetail.keperluan || '-'}
                  </Text>
                </View>
                {data.otherDetail.catatanManajer ? (
                  <View style={{marginBottom: 8}}>
                    <Text style={styles.title}>Catatan Manajer</Text>
                    <Text style={styles.description}>
                      {data.otherDetail.catatanManajer}
                    </Text>
                  </View>
                ) : null}
                {data.otherDetail.catatanAdmin ? (
                  <View style={{marginBottom: 8}}>
                    <Text style={styles.title}>Catatan Admin</Text>
                    <Text style={styles.description}>
                      {data.otherDetail.catatanAdmin}
                    </Text>
                  </View>
                ) : null}
              </View>
            )}
          </View>
        </TouchableWithoutFeedback>
      </View>
      {showButton && (
        <View style={styles.cardBottom}>
          <Button
            text="Tolak"
            outline
            style={{marginRight: 8}}
            onPress={onReject}
          />
          <Button text="Setujui" onPress={onApprove} />
        </View>
      )}
    </View>
  );
};

const styles = StyleSheet.create({
  cardContainer: {
    // flexDirection: 'row',
    backgroundColor: theme.COLOR.GRAY_LIGHT,
    borderRadius: 10,
    marginBottom: 20,
    marginHorizontal: 16,
  },
  cardPadding: {
    paddingVertical: 16,
    paddingHorizontal: 40,
  },
  titleCard: {
    fontSize: theme.FONT_SIZE.TITLE_LARGE,
    fontWeight: theme.FONT_WEIGHT.BOLD,
  },
  title: {
    fontSize: theme.FONT_SIZE.TITLE_MEDIUM,
    fontWeight: theme.FONT_WEIGHT.BOLD,
  },
  description: {
    fontSize: theme.FONT_SIZE.TEXT_MEDIUM,
  },
  cardBottom: {
    paddingBottom: 16,
    paddingHorizontal: 40,
    flexDirection: 'row',
    justifyContent: 'center',
  },
});

export default NotificationCard;
