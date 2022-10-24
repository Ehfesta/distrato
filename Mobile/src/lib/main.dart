import 'dart:io';

import 'package:flutter/material.dart';
import './dashboard.dart';
import './welcomepage.dart';

void main() {
  HttpOverrides.global = MyHttpOverrides();
  runApp(const MainApp());
}

class MyHttpOverrides extends HttpOverrides {
  @override
  HttpClient createHttpClient(SecurityContext? context) {
    return super.createHttpClient(context)
      ..badCertificateCallback =
          (X509Certificate cert, String host, int port) => true;
  }
}

class MainApp extends StatelessWidget {
  const MainApp({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'EhFesta',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      debugShowCheckedModeBanner: false,
      // home: const Dashboard(),
      home: WelcomePage(),
    );
  }
}
