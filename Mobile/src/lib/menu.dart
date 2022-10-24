import 'dart:convert';
import 'package:flutter/material.dart';
import './global.dart' as global;
import 'dart:developer';

class Menu extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
      leading: IconButton(
        icon: const Icon(
          Icons.menu,
          semanticLabel: 'menu',
        ),
        onPressed: () {
          print('Menu button');
        },
      ),
      title: const Text('EhFesta'),
      actions: <Widget>[
        // IconButton(
        //   icon: const Icon(
        //     Icons.search,
        //     semanticLabel: 'search',
        //   ),
        //   onPressed: () {
        //     print('Search button');
        //   },
        // ),
        // IconButton(
        //   icon: const Icon(
        //     Icons.tune,
        //     semanticLabel: 'filter',
        //   ),
        //   onPressed: () {
        //     print('Filter button');
        //   },
        // ),
      ],
    ));
  }
}
