import 'dart:convert';
import 'package:flutter/material.dart';
import './global.dart' as global;
import 'package:http/http.dart' as http;
import 'dart:developer';
import 'package:url_launcher/url_launcher.dart';
import './convite.dart';
import './conviteNovo.dart';
import './eventos.dart';
import './dashboardConv.dart';
import './dashboard.dart';

class DashBoardConv extends StatelessWidget {
  const DashBoardConv({Key? key}) : super(key: key);

  _getConvites() async {
    final response = await http.get(
        Uri.parse(
            '${global.baseUrl}/APIConvitesConv/${global.logUser['email']}'),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': global.Token,
        });
    final resp = jsonDecode(response.body);
    if (resp['status'] == '200') {
      final data = resp['data'];
      // print("url");
      // inspect(data);
      return data;
    }
    final data = [];
    return data;
  }

  Future<Widget> _buildGridCards(context) async {
    List products2 = await _getConvites();

    // inspect(products2);

    if (products2.isEmpty) {
      return GridView.count(
        crossAxisCount: 1,
        padding: const EdgeInsets.all(12.0),
        childAspectRatio: 8.0 / 9.0,
      );
    }

    return GridView.count(
        crossAxisCount: 1,
        childAspectRatio: 18 / 17,
        padding: const EdgeInsets.all(12.0),
        children: products2.map((product) {
          return Card(
            color: Color(int.parse(product["StatusHex"])),
            clipBehavior: Clip.antiAlias,
            // TODO: Adjust card heights (103)
            child: Column(
              // TODO: Center items on the card (103)
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                AspectRatio(
                  aspectRatio: 18 / 11,
                  child: GestureDetector(
                    onTap: () {
                      // print(product["Cod"]);
                      Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) =>
                                  Convite(conviteCod: product["conv_Cod"])));
                    },
                    child: Container(
                      decoration: BoxDecoration(
                        image: DecorationImage(
                          colorFilter: new ColorFilter.mode(
                              product["conv_Status"] == '4'
                                  ? Colors.white.withOpacity(0.4)
                                  : product["conv_Status"] == '5'
                                      ? Colors.white.withOpacity(0.4)
                                      : Colors.white.withOpacity(1.0),
                              BlendMode.dstATop),
                          image: NetworkImage(
                              '${global.baseUrl}/resources/img/Convite/' +
                                  (product["conv_Img"] ?? 'noImage.gif')),
                          fit: BoxFit.contain,
                        ),
                      ),
                    ),
                  ),
                ),
                Expanded(
                  child: Container(
                    child: Padding(
                      padding: const EdgeInsets.fromLTRB(16.0, 0.0, 16.0, 0.0),
                      child: Column(
                        children: <Widget>[
                          // TODO: Handle overflowing labels (103)
                          new Align(
                            alignment: Alignment.centerRight,
                            child: Text(
                              'Status: ' + product["conv_StatusDesc"],
                              style: TextStyle(
                                  fontSize: 12,
                                  fontWeight: FontWeight.bold,
                                  color: product["conv_Status"] == '4'
                                      ? Colors.white.withOpacity(0.4)
                                      : product["conv_Status"] == '5'
                                          ? Colors.white.withOpacity(0.4)
                                          : Colors.white.withOpacity(1.0)),
                              maxLines: 1,
                            ),
                          ),
                          new Align(
                            alignment: Alignment.centerLeft,
                            child: Text(
                              product["conv_Titulo"],
                              style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.bold,
                                  color: product["conv_Status"] == '4'
                                      ? Colors.white.withOpacity(0.4)
                                      : product["conv_Status"] == '5'
                                          ? Colors.white.withOpacity(0.4)
                                          : Colors.white.withOpacity(1.0)),
                              maxLines: 1,
                            ),
                          ),
                          new Align(
                            alignment: Alignment.centerLeft,
                            child: const SizedBox(height: 4.0),
                          ),
                          new Align(
                            alignment: Alignment.centerLeft,
                            child: Text(
                              product["conv_Descricao"],
                              style: TextStyle(
                                  fontSize: 14,
                                  color: product["conv_Status"] == '4'
                                      ? Colors.white.withOpacity(0.4)
                                      : product["conv_Status"] == '5'
                                          ? Colors.white.withOpacity(0.4)
                                          : Colors.white.withOpacity(1.0)),
                              maxLines: 1,
                            ),
                          ),
                          new Align(
                            alignment: Alignment.centerLeft,
                            child: const SizedBox(height: 4.0),
                          ),
                          new Align(
                            alignment: Alignment.centerLeft,
                            child: Text(
                              product["conv_DataEventoDesc"],
                              style: TextStyle(
                                  fontSize: 18,
                                  color: product["conv_Status"] == '4'
                                      ? Colors.white.withOpacity(0.4)
                                      : product["conv_Status"] == '5'
                                          ? Colors.white.withOpacity(0.4)
                                          : Colors.white.withOpacity(1.0)),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              ],
            ),
          );
        }).toList());
    // return Cards;
  }

  // TODO: Add a variable for Category (104)
  @override
  Widget build(BuildContext context) {
    // TODO: Return an AsymmetricView (104)
    // TODO: Pass Category variable to AsymmetricView (104)
    return Scaffold(
      appBar: AppBar(
        leading: new Padding(
          padding: const EdgeInsets.all(8.0),
          child: GestureDetector(
            onTap: () {
              print("Tapped a Container");
            },
            child: Container(
              width: 40.0,
              height: 40.0,
              decoration: BoxDecoration(
                shape: BoxShape.circle,
                image: DecorationImage(
                  fit: BoxFit.fill,
                  image: NetworkImage(
                    '${global.baseUrl}resources/img/Perfil/${global.logUser['img']}',
                  ),
                ),
              ),
            ),
          ),
        ),
        title: const Text('Convites Recebidos'),
        actions: [
          PopupMenuButton(
            icon: Icon(Icons.more_vert),
            itemBuilder: (BuildContext context) => <PopupMenuEntry>[
              const PopupMenuItem(
                child: ListTile(
                  leading: Icon(Icons.add_box),
                  title: Text('Novo Convite'),
                ),
                value: 1,
              ),
              const PopupMenuItem(
                child: ListTile(
                  leading: Icon(Icons.account_box),
                  title: Text('Meus Contives'),
                ),
                value: 2,
              ),
              const PopupMenuItem(
                child: ListTile(
                  leading: Icon(Icons.check_box_outlined),
                  title: Text('Convites Recebidos'),
                ),
                value: 3,
              ),
              PopupMenuDivider(),
              const PopupMenuItem(
                child: ListTile(
                  leading: Icon(Icons.person_pin_circle_outlined),
                  title: Text('Eventos'),
                ),
                value: 4,
              ),
            ],
            onSelected: (result) {
              if (result == 1) {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => ConviteNovo()),
                );
              } else if (result == 2) {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => DashBoard()),
                );
              } else if (result == 3) {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => DashBoardConv()),
                );
              } else if (result == 4) {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => Eventos()),
                );
              }
            },
          ),
        ],
      ),
      body: FutureBuilder<Widget>(
          future: _buildGridCards(context),
          builder: (context, AsyncSnapshot snapshot) {
            if (snapshot.hasData) {
              return snapshot.data;
            } else {
              return Center(
                child: CircularProgressIndicator(),
              );
            }
          }),
      resizeToAvoidBottomInset: false,
    );
  }
}
