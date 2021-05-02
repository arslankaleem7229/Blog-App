import 'package:blogapp/repository/repository.dart';

class BlogPostService {
  Repository _blogPosts;
  BlogPostService() {
    _blogPosts = Repository();
  }
  getAllBlogPost() async {
    return await _blogPosts.httpGetBlogPosts();
  }
}
