import 'dart:convert';
import 'package:flutter/material.dart';
import './global.dart' as global;
import 'package:http/http.dart' as http;
import 'dart:developer';
import 'package:url_launcher/url_launcher.dart';
import './convite.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

_getConvites(conviteCod) async {
  final response = await http
      .get(Uri.parse('${global.baseUrl}/APIConvidados/$conviteCod'), headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'Authorization': global.Token,
  });

  final resp = jsonDecode(response.body);
  var data = [];
  if (resp['status'] == '200') {
    data = resp['data'];
  } else if (resp['status'] == '402') {
    data = [];
  }

  return data;
}

Future<Widget> _buildGridCards(context, conviteCod) async {
  List products2 = await _getConvites(conviteCod);

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
      childAspectRatio: 3 / 1,
      padding: const EdgeInsets.all(12.0),
      children: products2.map((product) {
        return Card(
          color: Colors.white.withOpacity(0.6),
          clipBehavior: Clip.antiAlias,
          // TODO: Adjust card heights (103)
          child: Column(
            // TODO: Center items on the card (103)
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              Expanded(
                child: Container(
                  child: Padding(
                    padding: const EdgeInsets.fromLTRB(16.0, 0.0, 16.0, 0.0),
                    child: Column(
                      children: <Widget>[
                        new Align(
                          alignment: Alignment.centerLeft,
                          child: const SizedBox(height: 4.0),
                        ),
                        new Align(
                          alignment: Alignment.centerLeft,
                          child: Text(
                            product["Nome"],
                            style: TextStyle(
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),
                            maxLines: 1,
                          ),
                        ),
                        new Align(
                          alignment: Alignment.centerLeft,
                          child: Text(
                            product["UserEmail"],
                            style: TextStyle(
                                fontSize: 14,
                                color: Color.fromARGB(255, 87, 86, 86)),
                            maxLines: 1,
                          ),
                        ),
                        new Align(
                          alignment: Alignment.centerLeft,
                          child: Text(
                            "Acompanhantes:" + product["convQtd"],
                            style: TextStyle(
                              fontSize: 14,
                              color: Color.fromARGB(255, 87, 86, 86),
                            ),
                            maxLines: 1,
                          ),
                        ),
                        new Align(
                          alignment: Alignment.centerLeft,
                          child: Text(
                            product["Detalhes"] != null
                                ? product["Detalhes"]
                                : "",
                            style: TextStyle(
                              fontSize: 14,
                              color: Color.fromARGB(255, 87, 86, 86),
                            ),
                            maxLines: 1,
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

class ListaConvidados extends StatelessWidget {
  @override
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  ListaConvidados({this.conviteCod});

  final String? conviteCod;

  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        title: Text("Lista de Convidados"),
      ),
      body: FutureBuilder<Widget>(
          future: _buildGridCards(context, conviteCod),
          builder: (context, AsyncSnapshot snapshot) {
            if (snapshot.hasData) {
              return snapshot.data;
            } else {
              return Center(
                child: CircularProgressIndicator(),
              );
            }
          }),
    );
  }
}
