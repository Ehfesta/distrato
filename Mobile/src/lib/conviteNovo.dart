import 'package:flutter/material.dart';
import 'package:flutter_signin_button/button_builder.dart';
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

_buildCard(context) {
  // print("Cod:$conviteCod");

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
    TextEditingController _tEvento = TextEditingController();
    TextEditingController _tDescricao = TextEditingController();
    TextEditingController _tData = TextEditingController();
    TextEditingController _tInicio = TextEditingController();
    TextEditingController _tFim = TextEditingController();

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
          padding: EdgeInsets.symmetric(vertical: 10, horizontal: 10),
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
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Evento",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
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
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Descrição",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              // TextFormField(
              //   controller: _tData,
              //   decoration: InputDecoration(
              //     labelText: "Data",
              //     labelStyle: TextStyle(
              //       fontWeight: FontWeight.bold,
              //       fontSize: 14,
              //       color: Color(0xfff7892b),
              //     ),
              //   ),
              // onTap: () async {
              //   FocusScope.of(context).requestFocus(new FocusNode());

              //   DateTime? pickedDate = await showDatePicker(
              //       context: context,
              //       initialDate: DateTime.now(),
              //       firstDate: DateTime(1900),
              //       lastDate: DateTime(2100));

              //   print(DateFormat('yyyy-MM-dd').format(pickedDate!));
              //   setState(() {
              //     _tData.text = DateFormat('yyyy-MM-dd').format(pickedDate);
              // //   });
              // },
              // ),
              TextFormField(
                  controller: _tData,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.datetime,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Data",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tInicio,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Das",
                    labelStyle: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 14,
                      color: Color(0xfff7892b),
                    ),
                    fillColor: Color(0xfff3f3f4),
                  )),
              SizedBox(height: 5),
              TextFormField(
                  controller: _tFim,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Até",
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

  _cardTipo() {
    final _tOcasiao = TextEditingController();
    final _tPublico = TextEditingController();
    final _tPresente = TextEditingController();
    final _tIndividual = TextEditingController();
    final _tCompartilhar = TextEditingController();
    final _tConvidados = TextEditingController();
    final _tRecados = TextEditingController();

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
          padding: EdgeInsets.symmetric(vertical: 20, horizontal: 20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              TextFormField(
                  controller: _tOcasiao,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Público",
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
                  decoration: InputDecoration(
                    labelText: "Comentários",
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

  _cardObs() {
    final _tObs = TextEditingController();
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Campo Obrigatório';
                    }
                  },
                  keyboardType: TextInputType.text,
                  style: TextStyle(color: Color(0xfff7892b)),
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
    final _tEndereco = TextEditingController();
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
                    validator: (value) {
                      if (value == null || value.isEmpty) {
                        return 'Campo Obrigatório';
                      }
                    },
                    keyboardType: TextInputType.text,
                    style: TextStyle(color: Color(0xfff7892b)),
                    decoration: InputDecoration(
                      labelText: "Endereço",
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
              },
              child: Container(
                decoration: BoxDecoration(
                  image: DecorationImage(
                    image: NetworkImage(
                        global.baseUrl + '/resources/img/Convite/noImage.gif'),
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
                      /******************/
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
                            text: "Criar Convite",
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

class ConviteNovo extends StatelessWidget {
  const ConviteNovo({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        title: Text("Convite"),
      ),
      body: SingleChildScrollView(
        child: _buildCard(context),
      ),
    );
  }
}
