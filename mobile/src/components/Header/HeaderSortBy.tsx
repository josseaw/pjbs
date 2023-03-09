import React, {useState} from 'react';
import {ScrollView, StyleSheet, TouchableOpacity, View} from 'react-native';
import Button from '../Button/Button';
import ModalBottom from '../Modal/ModalBottom';
import TextTitle from '../Text/TextTitle';
import RoundedInput from '../TextInput/RoundedInput';
import Radio from 'radio-buttons-react-native';
import theme from '../../style/theme';
import {SCREEN_HEIGHT} from '../../utils/constants';

interface HeaderSortByProps {
  onFilter?:
    | ((value: {label: string; value: string; index: number}) => void)
    | undefined;
  onChangeText?: ((text: string) => void) | undefined;
  date: string;
}

const data = [
  {
    label: 'Semua Status',
    value: 'all',
    index: 1,
  },
  {
    label: 'Aktif',
    value: 'aktif',
    index: 2,
  },
  {
    label: 'Nonaktif',
    value: 'nonaktif',
    index: 3,
  },
];

const HeaderSortBy: React.FC<HeaderSortByProps> = ({
  onFilter,
  onChangeText,
  date,
}) => {
  const [filter, setFilter] = useState({
    status: false,
    name: 'all',
  });
  return (
    <View style={styles.headerContainer}>
      <View style={{flexDirection: 'row'}}>
        <View style={{flex: 1, paddingRight: 4}}>
          <Button
            text="Filter"
            color="danger"
            style={{paddingVertical: 12}}
            onPress={() => {
              setFilter((old) => ({...old, status: true}));
            }}
          />
          <ModalBottom
            visible={filter.status}
            style={{height: SCREEN_HEIGHT / 2.2}}>
            <TextTitle
              type="page"
              size="small"
              style={{marginLeft: 16, marginBottom: 16}}>
              Filter Status
            </TextTitle>
            <ScrollView>
              <Radio
                data={data}
                selectedBtn={(e) => {
                  console.warn(e);
                }}
                activeColor={theme.COLOR.PRIMARY}
              />
            </ScrollView>
            <View style={{flexDirection: 'row'}}>
              <TouchableOpacity
                style={{flex: 1, marginRight: 4}}
                onPress={() => setFilter((old) => ({...old, status: false}))}>
                <Button outline text="Kembali" style={styles.button} />
              </TouchableOpacity>
              <TouchableOpacity
                style={{flex: 1, marginLeft: 4}}
                onPress={() => setFilter((old) => ({...old, status: false}))}>
                <Button text="Konfirmasi" style={styles.button} />
              </TouchableOpacity>
            </View>
          </ModalBottom>
        </View>
        <View style={styles.inputContainer}>
          <RoundedInput onChangeText={onChangeText} />
        </View>
      </View>
      <View style={styles.dateContainer}>
        <TextTitle color="grayLight">{date}</TextTitle>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  dateContainer: {alignItems: 'flex-end', marginTop: 20},
  inputContainer: {flex: 2, paddingLeft: 4},
  headerContainer: {paddingTop: 32, paddingBottom: 16},
  cardBottom: {
    flexDirection: 'row',
    justifyContent: 'center',
    marginTop: 16,
  },
  button: {borderRadius: 10, paddingVertical: 12},
});

export default HeaderSortBy;
