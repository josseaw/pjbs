import React from 'react';
import {
  Animated,
  GestureResponderEvent,
  Image,
  StyleSheet,
  View,
} from 'react-native';
import {HapusIcon} from '../../assets/icons';
import theme from '../../style/theme';
import Swipeable from 'react-native-gesture-handler/Swipeable';
import {TouchableOpacity} from 'react-native-gesture-handler';

export interface SwipeableCardProps {
  onDelete: ((event: GestureResponderEvent) => void) | undefined;
}

const SwipeableCard: React.FC<SwipeableCardProps> = ({children, onDelete}) => {
  const rightAction = (progress: Animated.AnimatedInterpolation) => {
    const scale = progress.interpolate({
      inputRange: [0, 1],
      outputRange: [0, 1],
      extrapolate: 'clamp',
    });

    return (
      <View style={styles.swipeableContainer}>
        <TouchableOpacity onPress={onDelete}>
          <Animated.View style={[styles.iconContainer, {transform: [{scale}]}]}>
            <Image source={HapusIcon} style={styles.icon} />
          </Animated.View>
        </TouchableOpacity>
      </View>
    );
  };

  return <Swipeable renderRightActions={rightAction}>{children}</Swipeable>;
};

const styles = StyleSheet.create({
  swipeableContainer: {
    justifyContent: 'center',
    alignItems: 'center',
    marginBottom: 20,
    paddingHorizontal: 16,
  },
  iconContainer: {
    backgroundColor: theme.COLOR.PRIMARY,
    borderRadius: 100,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 16,
    marginRight: 16,
  },
  icon: {
    width: 32,
    height: 32,
    resizeMode: 'contain',
    alignItems: 'center',
  },
});

export default SwipeableCard;
