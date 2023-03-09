import {ColorType} from '../types/propsType';
import moment from 'moment';

export function titleCase(str: string): string {
  let splitStr = str.toLowerCase().split(' ');
  for (var i = 0; i < splitStr.length; i++) {
    splitStr[i] =
      splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
  }

  return splitStr.join(' ');
}

export function typedKeys<T>(o: T): (keyof T)[] {
  // type cast should be safe because that's what really Object.keys() does
  return Object.keys(o) as (keyof T)[];
}

export enum BadgeType {
  NORMAL = 'normal',
  SOPIR = 'sopir',
  MONITORING = 'monitoring',
}

export const getBadgeColor = (
  status: string,
  type: BadgeType = BadgeType.NORMAL,
): ColorType => {
  let color: ColorType = 'success';

  const getStatus = (status || '').toLocaleLowerCase();
  if (type === BadgeType.NORMAL) {
    if (getStatus === 'Menunggu'.toLowerCase()) {
      color = 'warning';
    } else if (getStatus === 'Ditolak'.toLowerCase()) {
      color = 'danger';
    } else {
      color = 'success';
    }
  } else if (type === BadgeType.SOPIR) {
    if (getStatus === 'Berlangsung'.toLowerCase()) {
      color = 'warning';
    } else {
      color = 'success';
    }
  } else if (type === BadgeType.MONITORING) {
    if (getStatus === 'Nonaktif'.toLowerCase()) {
      color = 'grayDark';
    } else {
      color = 'danger';
    }
  }

  return color;
};

const DEFAULT_DATE_PICKER_FORMAT = 'ddd MMM D';

const AM = 'AM';
const PM = 'PM';

// it takes in format '12 AM' and return 24 format
export function hourTo24Format(hour: string) {
  return parseInt(moment(hour, ['h A']).format('H'), 10);
}

// it takes in format 23 and return [11,'PM'] format
export function hourTo12Format(hour: number) {
  const currDate = new Date();
  currDate.setHours(hour);
  return dateTo12Hour(currDate.toISOString());
}

export const dateTo12Hour = (dateString: string) => {
  const localDate = new Date(dateString);
  let hour = localDate.getHours();
  if (hour === 12) {
    return ['12', PM];
  }
  if (hour === 0) {
    return ['12', AM];
  }
  const afterMidday = hour % 12 === hour;
  hour = afterMidday ? hour : hour % 12;
  const amPm = afterMidday ? AM : PM;
  return [hour.toString(), amPm];
};

export function getHoursArray(format24: boolean) {
  const hours = format24 ? {min: 0, max: 23} : {min: 1, max: 12};
  const arr = [];
  for (let i = hours.min; i <= hours.max; i++) {
    arr.push(`00${i}`.slice(-2));
  }
  return arr;
}

export function getFiveMinutesArray() {
  const arr = [];
  arr.push('00');
  arr.push('05');
  for (let i = 10; i < 60; i += 5) {
    arr.push(`${i}`);
  }
  return arr;
}
