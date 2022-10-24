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
      .get(Uri.parse('${global.baseUrl}/APIComentarios/$conviteCod'), headers: {
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
          color: global.logUser['cod'] != product["UserCod"]
              ? Colors.white.withOpacity(0.6)
              : Color.fromARGB(255, 96, 141, 201).withOpacity(0.6),
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
                        Align(
                          alignment: Alignment.topLeft,
                          child: const SizedBox(height: 5.0),
                        ),
                        Align(
                          alignment: Alignment.centerRight,
                          child: Text(
                            product["dataDesc"],
                            style: TextStyle(
                                fontSize: 14,
                                color: Color.fromARGB(255, 87, 86, 86)),
                            maxLines: 1,
                          ),
                        ),
                        Align(
                          alignment: Alignment.topLeft,
                          child: Row(
                            children: <Widget>[
                              Center(
                                child: new Container(
                                  width: 40.0,
                                  height: 40.0,
                                  decoration: BoxDecoration(
                                    shape: BoxShape.circle,
                                    image: DecorationImage(
                                      fit: BoxFit.fill,
                                      image: NetworkImage(
                                        '${global.baseUrl}resources/img/Perfil/' +
                                            (product["Userimg"]),
                                      ),
                                    ),
                                  ),
                                ),
                              ),
                              Container(
                                padding: EdgeInsets.symmetric(horizontal: 5),
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  mainAxisAlignment: MainAxisAlignment.start,
                                  children: <Widget>[
                                    Text(
                                      product["UserNome"],
                                      style: TextStyle(
                                        fontSize: 15,
                                        fontWeight: FontWeight.bold,
                                      ),
                                      maxLines: 1,
                                    ),
                                  ],
                                ),
                              ),
                            ],
                          ),
                        ),
                        Align(
                          alignment: Alignment.topLeft,
                          child: const SizedBox(height: 7.0),
                        ),
                        Align(
                          alignment: Alignment.centerLeft,
                          child: Text(
                            product["Comentario"],
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

class Comentarios extends StatelessWidget {
  @override
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  Comentarios({this.conviteCod});

  final String? conviteCod;

  _enviaComent(context, coment, userNome, codConvite) async {
    final response = await http.post(
      Uri.parse(global.baseUrl + 'APIComentarios/SendComentario'),
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': global.Token,
      },
      body: jsonEncode(
        <String, String>{
          'coment': coment,
          'userCod': userNome,
          'codConvite': codConvite,
        },
      ),
    );
    final resp = jsonDecode(response.body);
    inspect(resp);
    if (resp['status'] == '200') {
    } else {
      showDialog(
          context: context,
          builder: (context) => AlertDialog(
                title: new Text("Confirmação"),
                content: Text("!! Erro ao enviar comentário !!!"),
                actions: <Widget>[
                  // define os botões na base do dialogo
                  new TextButton(
                    child: new Text("Fechar"),
                    onPressed: () {
                      Navigator.of(context).pop();
                    },
                  ),
                ],
              ));
    }
  }

  Future<void> _dialogComent(BuildContext context) {
    final _tComent = TextEditingController();

    return showDialog<void>(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: const Text('Enviar comentário'),
          content: Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.stretch,
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              SizedBox(height: 10),
              TextField(
                  controller: _tComent,
                  keyboardType: TextInputType.multiline,
                  minLines: 1,
                  maxLines: 5,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Comentário",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderSide: const BorderSide(
                          width: 1, color: Color.fromARGB(255, 105, 57, 14)),
                      // borderRadius: BorderRadius.circular(15),
                    ),
                    // fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 30),
              ElevatedButton.icon(
                style: ElevatedButton.styleFrom(
                  primary: Color(0xff009d7c), // Background color
                ),
                icon: FaIcon(
                  FontAwesomeIcons.paperPlane,
                  size: 20,
                ),
                label: Text('Enviar', style: TextStyle(fontSize: 18)),
                onPressed: () {
                  // var result = _enviaComent(context, _tComent.text,
                  //     global.logUser['cod'], conviteCod);
                  // Navigator.of(context).pop();
                  Navigator.pushReplacement(
                      context,
                      MaterialPageRoute(
                          builder: (context) =>
                              Comentarios(conviteCod: conviteCod)));
                },
              ),
              SizedBox(height: 5),
            ],
          ),
          actions: <Widget>[
            TextButton(
              style: TextButton.styleFrom(
                textStyle: Theme.of(context).textTheme.labelLarge,
              ),
              child: const Text('Fechar'),
              onPressed: () {
                Navigator.of(context).pop();
              },
            ),
          ],
        );
      },
    );
  }

  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        title: Text("Comentários"),
        actions: <Widget>[
          IconButton(
            icon: const Icon(
              Icons.add_card,
              semanticLabel: 'Comentário',
            ),
            onPressed: () {
              _dialogComent(context);
            },
          ),
        ],
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
