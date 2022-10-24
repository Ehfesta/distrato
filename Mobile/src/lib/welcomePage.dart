import 'package:flutter/material.dart';
import './loginPage.dart';
import './signup.dart';
import 'package:google_fonts/google_fonts.dart';
import './global.dart' as global;

class WelcomePage extends StatefulWidget {
  WelcomePage({Key? key, this.title}) : super(key: key);

  final String? title;

  _WelcomePageState createState() => _WelcomePageState();
}

class _WelcomePageState extends State<WelcomePage> {
  Widget _submitButton() {
    return InkWell(
      onTap: () {
        Navigator.push(
            context, MaterialPageRoute(builder: (context) => LoginPage()));
      },
      child: Container(
        width: MediaQuery.of(context).size.width,
        padding: EdgeInsets.symmetric(vertical: 13),
        alignment: Alignment.center,
        decoration: BoxDecoration(
            borderRadius: BorderRadius.all(Radius.circular(5)),
            boxShadow: <BoxShadow>[
              BoxShadow(
                  color: Color(0xffdf8e33).withAlpha(100),
                  offset: Offset(2, 4),
                  blurRadius: 8,
                  spreadRadius: 2)
            ],
            color: Colors.white),
        child: Text(
          'Entrar',
          style: TextStyle(fontSize: 20, color: Color(0xfff7892b)),
        ),
      ),
    );
  }

  Widget _signUpButton() {
    return InkWell(
      onTap: () {
        Navigator.push(
            context, MaterialPageRoute(builder: (context) => SignUpPage()));
      },
      child: Container(
        width: MediaQuery.of(context).size.width,
        padding: EdgeInsets.symmetric(vertical: 13),
        alignment: Alignment.center,
        decoration: BoxDecoration(
          borderRadius: BorderRadius.all(Radius.circular(5)),
          border: Border.all(color: Colors.white, width: 2),
        ),
        child: Text(
          'Cadastrar',
          style: TextStyle(fontSize: 20, color: Colors.white),
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

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: Container(
          padding: EdgeInsets.symmetric(horizontal: 20),
          height: MediaQuery.of(context).size.height,
          decoration: BoxDecoration(
            image: DecorationImage(
              image: NetworkImage(
                  global.baseUrl + '/resources/images/ehfesta3.jpeg'),
              fit: BoxFit.cover,
            ),
          ),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.end,
            children: <Widget>[
              Padding(padding: EdgeInsets.only(top: 50)),
              _title(),
              SizedBox(
                height: 80,
              ),
              _submitButton(),
              SizedBox(
                height: 20,
              ),
              _signUpButton(),
              SizedBox(
                height: 20,
              ),
            ],
          ),
        ),
      ),
    );
  }
}
