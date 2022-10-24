import 'package:ehfesta_mobile/dashboard.dart';
import 'package:flutter/material.dart';
import './global.dart' as global;
import './signup.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:flutter_signin_button/flutter_signin_button.dart';
import 'package:crypto/crypto.dart';
// import 'dart:async';
import 'dart:convert';
import 'package:http/http.dart' as http;

class LoginPage extends StatefulWidget {
  LoginPage({Key? key, this.title}) : super(key: key);

  final String? title;

  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final _tLogin = TextEditingController();
  final _tSenha = TextEditingController();
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  Widget _backButton() {
    return InkWell(
      onTap: () {
        Navigator.pop(context);
      },
      child: Container(
        padding: EdgeInsets.symmetric(horizontal: 10),
        child: Row(
          children: <Widget>[
            Container(
              padding: EdgeInsets.only(left: 0, top: 10, bottom: 10),
              child: Icon(Icons.keyboard_arrow_left, color: Color(0xfff7892b)),
            ),
            Text('voltar',
                style: TextStyle(fontSize: 12, fontWeight: FontWeight.w500))
          ],
        ),
      ),
    );
  }

  Widget _LoginField() {
    return TextFormField(
        controller: _tLogin,
        validator: (value) {
          if (value == null || value.isEmpty) {
            return 'Informar e-mail válido';
          }
          return null;
        },
        keyboardType: TextInputType.text,
        style: TextStyle(color: Color(0xfff7892b)),
        decoration: InputDecoration(
            labelText: "E-mail",
            labelStyle: TextStyle(
              fontWeight: FontWeight.bold,
              fontSize: 20,
              color: Color(0xfff7892b),
              shadows: <Shadow>[
                Shadow(
                  offset: Offset(1.0, 1.0),
                  blurRadius: 4.0,
                  color: Color.fromARGB(255, 105, 57, 14),
                ),
              ],
            ),
            enabledBorder: OutlineInputBorder(
              borderSide: const BorderSide(
                  width: 1, color: Color.fromARGB(255, 105, 57, 14)),
              // borderRadius: BorderRadius.circular(15),
            ),
            fillColor: Color(0xfff3f3f4),
            filled: true));
  }

  Widget _PassField() {
    return TextFormField(
        controller: _tSenha,
        validator: (value) {
          if (value == null || value.isEmpty) {
            return 'Informar senha';
          }
          return null;
        },
        keyboardType: TextInputType.text,
        style: TextStyle(color: Color(0xfff7892b)),
        obscureText: true,
        decoration: InputDecoration(
            labelText: "Senha",
            labelStyle: TextStyle(
              fontWeight: FontWeight.bold,
              fontSize: 20,
              color: Color(0xfff7892b),
              shadows: <Shadow>[
                Shadow(
                  offset: Offset(1.0, 1.0),
                  blurRadius: 4.0,
                  color: Color.fromARGB(255, 105, 57, 14),
                ),
              ],
            ),
            enabledBorder: OutlineInputBorder(
              borderSide: const BorderSide(
                  width: 1, color: Color.fromARGB(255, 105, 57, 14)),
              // borderRadius: BorderRadius.circular(15),
            ),
            fillColor: Color(0xfff3f3f4),
            filled: true));
  }

  Widget _submitButton() {
    return Container(
      height: 50,
      margin: const EdgeInsets.symmetric(vertical: 20),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          SignInButtonBuilder(
            text: 'Entrar',
            padding: EdgeInsets.symmetric(
                horizontal: MediaQuery.of(context).size.height * 0.1),
            icon: Icons.login,
            onPressed: () {
              _onClickLogin(context);
            },
            backgroundColor: Color(0xfff7892b),
            width: 95,
          )
        ],
      ),
    );
  }

  Widget _divider() {
    return Container(
      margin: const EdgeInsets.symmetric(vertical: 10),
      child: Row(
        children: <Widget>[
          SizedBox(
            width: 20,
          ),
          Expanded(
            child: Padding(
              padding: EdgeInsets.symmetric(horizontal: 10),
              child: Divider(
                thickness: 1,
              ),
            ),
          ),
          Text('ou'),
          Expanded(
            child: Padding(
              padding: EdgeInsets.symmetric(horizontal: 10),
              child: Divider(
                thickness: 1,
              ),
            ),
          ),
          SizedBox(
            width: 20,
          ),
        ],
      ),
    );
  }

  Widget _facebookButton() {
    return Container(
      height: 50,
      margin: EdgeInsets.symmetric(vertical: 20),
      decoration: BoxDecoration(
        borderRadius: BorderRadius.all(Radius.circular(10)),
      ),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          SignInButton(
            Buttons.FacebookNew,
            text: "Entrar com Facebook",
            onPressed: () {},
          )
        ],
      ),
    );
  }

  Widget _createAccountLabel() {
    return InkWell(
      onTap: () {
        Navigator.push(
            context, MaterialPageRoute(builder: (context) => SignUpPage()));
      },
      child: Container(
        margin: EdgeInsets.symmetric(vertical: 20),
        padding: EdgeInsets.all(15),
        alignment: Alignment.bottomCenter,
        child: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text(
              'Don\'t have an account ?',
              style: TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
            ),
            // SizedBox(
            //   width: 10,
            // ),
            Text(
              'Register',
              style: TextStyle(
                  color: Color(0xfff79c4f),
                  fontSize: 13,
                  fontWeight: FontWeight.w600),
            ),
          ],
        ),
      ),
    );
  }

  Widget _title() {
    return RichText(
      textAlign: TextAlign.center,
      text: TextSpan(
        text: 'EhFesta',
        style: GoogleFonts.portLligatSans(
          textStyle: Theme.of(context).textTheme.headline1,
          fontSize: 80,
          fontWeight: FontWeight.w900,
          color: Color(0xfff7892b),
          shadows: [
            Shadow(
              blurRadius: 10.0,
              color: Color.fromARGB(255, 51, 34, 3),
              offset: Offset(5.0, 5.0),
            ),
          ],
        ),
      ),
    );
  }

  Widget _emailPasswordWidget() {
    return Column(
      children: <Widget>[
        _LoginField(),
        SizedBox(height: 10),
        _PassField(),
      ],
    );
  }

  _getUser(final login, final senha) async {
    // print("_getUser");
    // print(global.baseUrl + '/APILogin/' + login);
    final response = await http
        .get(Uri.parse(global.baseUrl + '/APILogin/' + login), headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': global.Token,
    });
    // print(response);
    final resp = jsonDecode(response.body);
    // print(resp);

    if (resp['status'] == '200') {
      final data = resp['data'][0];
      Codec<String, String> stringToBase64 = utf8.fuse(base64);
      var digest1 = utf8.encode(senha);
      var senhahash = sha256.convert(digest1);
      String nsenha = "${senhahash}AzY${stringToBase64.encode(senha)}";
      // print(data['Email']);
      // print(data['Senha']);
      // print(nsenha);

      if (data['Senha'] == nsenha) {
        // print("Senha OK");
        // print(data);
        global.logUser['id'] = data['ID'];
        global.logUser['cod'] = data['Cod'];
        global.logUser['nome'] = data['Nome'];
        global.logUser['email'] = data['Email'];
        global.logUser['img'] = data['imgpessoa'];
        // print(global.logUser);

        Navigator.push(
            context, MaterialPageRoute(builder: (context) => DashBoard()));
      } else {
        // print("Senha Errada");
        showDialog(
            context: context,
            builder: (context) => AlertDialog(
                  title: new Text("Login não permitido"),
                  content: Text("Senha não confere ou usuário não existe!"),
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
    } else {
      // print("Senha Errada");
      showDialog(
          context: context,
          builder: (context) => AlertDialog(
                title: new Text("Login não permitido"),
                content: Text("Senha não confere ou usuário não existe!"),
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
    return jsonDecode(response.body);
  }

  _onClickLogin(BuildContext context) {
    final login = _tLogin.text;
    final senha = _tSenha.text;
    if (_formKey.currentState!.validate()) {
      var response = _getUser(login, senha);
      // debugPrint(response);
      return;
    }
  }

  @override
  Widget build(BuildContext context) {
    final height = MediaQuery.of(context).size.height;
    return Scaffold(
        body: Container(
      height: height,
      decoration: BoxDecoration(
        image: DecorationImage(
          image:
              NetworkImage(global.baseUrl + '/resources/images/ehfesta3.jpeg'),
          opacity: 0.3,
          fit: BoxFit.cover,
        ),
      ),
      child: SingleChildScrollView(
        child: Stack(
          children: <Widget>[
            Container(
              padding: EdgeInsets.symmetric(horizontal: 20),
              child: Form(
                key: _formKey,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.center,
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: <Widget>[
                    SizedBox(height: height * .3),
                    _title(),
                    SizedBox(height: 40),
                    _emailPasswordWidget(),
                    SizedBox(height: 10),
                    _submitButton(),
                    _divider(),
                    _facebookButton(),
                    // _createAccountLabel(),
                  ],
                ),
              ),
            ),
            Positioned(top: 50, left: 0, child: _backButton()),
          ],
        ),
      ),
    ));
  }
}
