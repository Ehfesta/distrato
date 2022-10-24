import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/http.dart' as http;
import './global.dart' as global;
import 'dart:developer';
import 'dart:convert';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:maps_launcher/maps_launcher.dart';
import './presentear.dart';
import './listaConvidados.dart';
import './comentarios.dart';
import './dashboard.dart';

_getConvite(conviteCod) async {
  final response = await http
      .get(Uri.parse('${global.baseUrl}/APIConvites/${conviteCod}'), headers: {
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

Future<Widget> _buildCard(context, conviteCod) async {
  // print("Cod:$conviteCod");

  List products = await _getConvite(conviteCod);

  // inspect(products);

  final product = products[0];

  String? endereco = product["Endereco"];

  int Proprietario = 0;
  global.logUser['cod'] == product["cadUserID"]
      ? Proprietario = 1
      : Proprietario = 0;

  // inspect(product);
  if (products.isEmpty) {
    return Container(
      padding: EdgeInsets.symmetric(horizontal: 20),
      child: Form(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            SizedBox(width: MediaQuery.of(context).size.height),
            Text("Convite não encontrado!"),
            // _createAccountLabel(),
          ],
        ),
      ),
    );
  }

  Widget _labelText(txtLabel) {
    return RichText(
      textAlign: TextAlign.center,
      text: TextSpan(
        text: txtLabel,
        style: GoogleFonts.sourceSansPro(
          textStyle: Theme.of(context).textTheme.headline1,
          fontSize: 14,
          fontWeight: FontWeight.w400,
          color: Color.fromARGB(255, 83, 74, 66),
        ),
      ),
    );
  }

  Widget _fieldText(txtField) {
    return RichText(
      textAlign: TextAlign.center,
      text: TextSpan(
        text: txtField,
        style: GoogleFonts.sourceSansPro(
          textStyle: Theme.of(context).textTheme.headline1,
          fontSize: 20,
          fontWeight: FontWeight.w600,
          color: Color.fromARGB(255, 15, 13, 11),
        ),
      ),
    );
  }

  _cardTitulo() {
    TextEditingController _tEvento = TextEditingController()
      ..text = product["Titulo"];
    TextEditingController _tDescricao = TextEditingController()
      ..text = product["Descricao"];
    TextEditingController _tData = TextEditingController()
      ..text = product["DataEventoDesc"];
    TextEditingController _tInicio = TextEditingController()
      ..text = product["HoraInicioDesc"];
    TextEditingController _tFim = TextEditingController()
      ..text = product["HoraFimDesc"];

    return Row(
      children: <Widget>[
        Container(
          width: 40,
          color: Color(0xFF009d7c),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              FaIcon(FontAwesomeIcons.calendarAlt, color: Colors.white),
            ],
          ),
        ),
        Container(
          color: Colors.white,
          width: MediaQuery.of(context).size.width * 0.77,
          padding: EdgeInsets.symmetric(vertical: 0, horizontal: 20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              TextFormField(
                  controller: _tEvento,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Evento",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tDescricao,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Descricao",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tData,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Data",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              TextFormField(
                  controller: _tInicio,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Das",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              TextFormField(
                  controller: _tFim,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Até",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
            ],
          ),
        ),
      ],
    );
  }

  _cardTipo() {
    final _tOcasiao = TextEditingController()..text = product["TipoEventoDesc"];
    final _tPublico = TextEditingController()
      ..text = product["TipoPublicoDesc"];
    final _tPresente = TextEditingController()
      ..text = product["PresenteVirtualDesc"];
    final _tIndividual = TextEditingController()
      ..text = product["ConvidarDesc"];
    final _tCompartilhar = TextEditingController()
      ..text = product["CompartilharDesc"];
    final _tConvidados = TextEditingController()
      ..text = product["ListaConvidadosDesc"];
    final _tRecados = TextEditingController()
      ..text = product["MuralRecadoDesc"];

    return Row(
      children: <Widget>[
        Container(
          width: 40,
          color: Color(0xFF52add5),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              FaIcon(FontAwesomeIcons.bookmark, color: Colors.white),
            ],
          ),
        ),
        Container(
          color: Colors.white,
          width: MediaQuery.of(context).size.width * 0.77,
          padding: EdgeInsets.symmetric(vertical: 10, horizontal: 20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              TextFormField(
                  controller: _tOcasiao,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Ocasião",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tPublico,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Publico",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tPresente,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Presente Virtual",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tIndividual,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Individual",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tCompartilhar,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Compartilhar",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tConvidados,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Lista Convidados",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tRecados,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Comentários",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
            ],
          ),
        ),
      ],
    );
  }

  _cardObs() {
    final _tObs = TextEditingController()..text = product["Obs"];
    return Row(
      children: <Widget>[
        Container(
          width: 40,
          color: Color(0xFF6c757d),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              FaIcon(FontAwesomeIcons.bullhorn, color: Colors.white),
            ],
          ),
        ),
        Container(
          color: Colors.white,
          width: MediaQuery.of(context).size.width * 0.77,
          padding: EdgeInsets.symmetric(vertical: 20, horizontal: 20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              TextFormField(
                  controller: _tObs,
                  keyboardType: TextInputType.text,
                  style: TextStyle(
                    color: Color.fromARGB(255, 15, 13, 11),
                  ),
                  decoration: InputDecoration(
                    labelText: "Observação",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
            ],
          ),
        ),
      ],
    );
  }

  _cardEndereco() {
    final _tEndereco = TextEditingController()..text = product["Endereco"];

    return Row(
      children: <Widget>[
        Container(
          width: 40,
          color: Color(0xFF001f3f),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              FaIcon(FontAwesomeIcons.flag, color: Colors.white),
            ],
          ),
        ),
        GestureDetector(
          child: Container(
            color: Colors.white,
            width: MediaQuery.of(context).size.width * 0.77,
            padding: EdgeInsets.symmetric(vertical: 20, horizontal: 20),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                TextFormField(
                    controller: _tEndereco,
                    keyboardType: TextInputType.text,
                    style: TextStyle(
                      color: Color.fromARGB(255, 15, 13, 11),
                    ),
                    decoration: InputDecoration(
                      labelText: "Endereço",
                      labelStyle: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 14,
                        color: Color(0xfff7892b),
                      ),
                      fillColor: Color(0xfff3f3f4),
                    )),
                SizedBox(height: 10),
              ],
            ),
          ),
        ),
      ],
    );
  }

  return Container(
    decoration: BoxDecoration(
      image: DecorationImage(
        image: NetworkImage('${global.baseUrl}resources/images/ehfesta3.jpeg'),
        opacity: 0.2,
        fit: BoxFit.cover,
      ),
    ),
    padding: EdgeInsets.symmetric(horizontal: 20),
    child: Form(
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        mainAxisAlignment: MainAxisAlignment.start,
        children: <Widget>[
          SizedBox(width: MediaQuery.of(context).size.height, height: 10.0),
          AspectRatio(
            aspectRatio: 18 / 11,
            child: GestureDetector(
              onTap: () {
                // print(product["Cod"]);
                Navigator.push(context, MaterialPageRoute(builder: (_) {
                  return Scaffold(
                    body: GestureDetector(
                      child: Container(
                        decoration: BoxDecoration(
                          image: DecorationImage(
                            image: NetworkImage(global.baseUrl +
                                '/resources/img/Convite/' +
                                (product["Img"] ?? 'noImage.gif')),
                            fit: BoxFit.none,
                          ),
                        ),
                      ),
                      onTap: () {
                        Navigator.pop(context);
                      },
                    ),
                  );
                  ;
                }));
              },
              child: Container(
                decoration: BoxDecoration(
                  image: DecorationImage(
                    image: NetworkImage(global.baseUrl +
                        '/resources/img/Convite/' +
                        (product["Img"] ?? 'noImage.gif')),
                    fit: BoxFit.contain,
                  ),
                ),
              ),
            ),
          ),
          Stack(
            children: <Widget>[
              Container(
                // color: Color(0xFF009d7c),
                width: MediaQuery.of(context).size.width,
                child: Form(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.center,
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: <Widget>[
                      SizedBox(height: 10),
                      IntrinsicHeight(
                        child: _cardTitulo(),
                      ),
                      SizedBox(height: 10),
                      IntrinsicHeight(
                        child: _cardTipo(),
                      ),
                      SizedBox(height: 10),
                      IntrinsicHeight(
                        child: _cardObs(),
                      ),
                      SizedBox(height: 10),
                      /******************/
                      // Localização
                      IntrinsicHeight(
                        child: _cardEndereco(),
                      ),

                      SizedBox(height: 10),
                      ElevatedButton(
                        onPressed: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => DashBoard()),
                          );
                        },
                        child: RichText(
                          textAlign: TextAlign.center,
                          text: TextSpan(
                            text: "Salvar Convite",
                            style: GoogleFonts.sourceSansPro(
                              textStyle: Theme.of(context).textTheme.headline1,
                              fontSize: 14,
                              fontWeight: FontWeight.bold,
                              color: Colors.white,
                            ),
                          ),
                        ),
                        style: ElevatedButton.styleFrom(
                            primary: Color(0xFF009d7c),
                            padding: EdgeInsets.symmetric(
                                vertical: 5, horizontal: 30) // Background color
                            ),
                      ),
                      SizedBox(height: 20),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ],
      ),
    ),
  );
}

class ConviteEdit extends StatelessWidget {
  @override
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  ConviteEdit({this.conviteCod});

  final String? conviteCod;

  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        title: Text("Alterar Convite"),
      ),
      body: SingleChildScrollView(
        child: FutureBuilder<Widget>(
            future: _buildCard(context, conviteCod),
            builder: (context, AsyncSnapshot snapshot) {
              if (snapshot.hasData) {
                return snapshot.data;
              } else {
                return Center(
                  child: CircularProgressIndicator(),
                );
              }
            }),
      ),
    );
  }
}
