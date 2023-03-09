import React from 'react';
import {createStackNavigator} from '@react-navigation/stack';
import {
  Login,
  MainMenu,
  NormalNotification,
  TabNotification,
  Riwayat,
  DetailPesanan,
  Dashboard,
  DashboardSopir,
  MonitoringTab,
  DetailSopirMonitoring,
  PilihSopir,
  KonfirmasiPersetujuan,
  FormPemesanan,
} from '../pages/screens';
import {AdminKendaraan, UserKendaraan} from '../pages/menus';

interface RouterProps {}

const RouteStack = createStackNavigator();

const Router: React.FC<RouterProps> = ({}) => {
  return (
    <RouteStack.Navigator initialRouteName="Login" headerMode="none">
      <RouteStack.Screen name="Login" component={Login} />
      <RouteStack.Screen name="MainMenu" component={MainMenu} />
      <RouteStack.Screen
        name="NormalNotification"
        component={NormalNotification}
      />
      <RouteStack.Screen name="Dashboard" component={Dashboard} />
      <RouteStack.Screen name="Dashboard Sopir" component={DashboardSopir} />
      <RouteStack.Screen name="TabNotification" component={TabNotification} />
      <RouteStack.Screen name="Riwayat" component={Riwayat} />
      <RouteStack.Screen name="AdminKendaraanMenu" component={AdminKendaraan} />
      <RouteStack.Screen name="UserKendaraanMenu" component={UserKendaraan} />
      <RouteStack.Screen name="Detail Pesanan" component={DetailPesanan} />
      <RouteStack.Screen name="Monitoring Tab" component={MonitoringTab} />
      <RouteStack.Screen
        name="Detail Sopir Monitoring"
        component={DetailSopirMonitoring}
      />
      <RouteStack.Screen name="Pilih Sopir" component={PilihSopir} />
      <RouteStack.Screen
        name="Konfirmasi Persetujuan"
        component={KonfirmasiPersetujuan}
      />
      <RouteStack.Screen name="Form Pemesanan" component={FormPemesanan} />
    </RouteStack.Navigator>
  );
};

export default Router;
