import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

// _getConvite() async {
//   final response =
//       await http.get(Uri.parse('${global.baseUrl}/APIConvites'), headers: {
//     'Content-Type': 'application/json',
//     'Accept': 'application/json',
//     'Authorization': global.Token,
//   });
//   final resp = jsonDecode(response.body);
//   if (resp['status'] == '200') {
//     final data = resp['data'];
//     // print("url");
//     // inspect(data);
//     return data;
//   }
//   final data = ["Texto não encontrado"];
//   return data;
// }

Future<Widget> _buildCard(context, conviteCod) async {
  // print("Cod:$conviteCod");

  // var texto = await _getConvite();
  var texto =
      "Mudar tosso esse texto!!! Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?";

  bool concordo = false;
  // inspect(products);

  Widget _labelText(txtLabel) {
    return RichText(
      textAlign: TextAlign.justify,
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

  return Container(
    height: MediaQuery.of(context).size.height,
    decoration: BoxDecoration(
      image: DecorationImage(
        image: NetworkImage(
            'https://www.ehfesta.com.br/resources/images/ehfesta3.jpeg'),
        opacity: 0.2,
        fit: BoxFit.cover,
      ),
    ),
    padding: EdgeInsets.symmetric(horizontal: 20),
    child: Form(
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        mainAxisAlignment: MainAxisAlignment.start,
        children: <Widget>[
          SizedBox(width: MediaQuery.of(context).size.height, height: 10.0),
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
                        child: RichText(
                          textAlign: TextAlign.justify,
                          text: TextSpan(
                            text: texto,
                            style: GoogleFonts.sourceSansPro(
                              textStyle: Theme.of(context).textTheme.headline1,
                              fontSize: 14,
                              fontWeight: FontWeight.w400,
                              color: Color.fromARGB(255, 83, 74, 66),
                            ),
                          ),
                        ),
                      ),
                      SizedBox(height: 30),
                      ElevatedButton.icon(
                        icon: FaIcon(
                          FontAwesomeIcons.gift,
                          size: 30,
                        ),
                        label:
                            Text('Presentear', style: TextStyle(fontSize: 18)),
                        onPressed: () {},
                      ),
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

class Presentear extends StatelessWidget {
  @override
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  Presentear({this.conviteCod});

  final String? conviteCod;

  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        title: Text("Presente Virtual"),
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
