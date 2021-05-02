import 'package:http/http.dart' as http;

class Repository {
  httpGetBlogPosts() async {
    var result = await http.get(Uri.parse(
        "http://blog-app-flutter.herokuapp.com/api/get-all-blog-posts"));

    return (result != null) ? result : null;
  }
}
