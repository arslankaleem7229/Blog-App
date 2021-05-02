import 'dart:convert';

import 'package:blogapp/models/blog_post.dart';
import 'package:blogapp/services/blog_post_service.dart';
import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  BlogPostService _blogPostService = BlogPostService();
  Future<List<BlogPost>> getAllBlogPosts() async {
    var result = await _blogPostService.getAllBlogPost();
    List<BlogPost> listBlogPost = [];
    if (result != null) {
      var blogs = json.decode(result.body);
      blogs.forEach((post) {
        BlogPost _blogPost = BlogPost();

        _blogPost.id = post['id'];
        _blogPost.title = post['title'];
        _blogPost.details = post['details'];
        _blogPost.category = post['category']['name'];
        _blogPost.imageUrl = post['featured_image_url'];
        listBlogPost.add(_blogPost);
      });
    }
    return listBlogPost;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.amber,
        appBar: AppBar(
          title: Text("BlogApp"),
        ),
        body: FutureBuilder<List<BlogPost>>(
          future: getAllBlogPosts(),
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              return ListView.builder(
                itemCount: snapshot.data.length,
                itemBuilder: (context, index) {
                  return Card(
                    child: Column(
                      children: [
                        Text("${snapshot.data[index].id}"),
                        Text("${snapshot.data[index].title}"),
                        Text("${snapshot.data[index].category}"),
                        Text("${snapshot.data[index].details}"),
                        Image(
                          image:
                              NetworkImage("${snapshot.data[index].imageUrl}"),
                        ),
                      ],
                    ),
                  );
                },
              );
            } else
              return CircularProgressIndicator();
          },
        ));
  }
}
