<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::all();
        return view('blog.index', compact('blogPosts'));

    }
    public function details($id)
    {

        $blogPost = BlogPost::find($id);
        return view('Blog.blogdetails', compact('blogPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogPost = new BlogPost();
        $blogPost->title = $request->input(key:'blogtitle');
        $blogPost->details = $request->input(key:'blogdescription');
        $blogPost->category_id = $request->input(key:'category');
        $blogPost->user_id = 0;
        $blogPost->featured_image_url = 'null';

        if ($blogPost->save()) {
            $photo = $request->file(key:'featuredphoto');
            if ($photo != null) {
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(10000, 50000) . '.' . $ext;
                if ($photo->move(public_path(), $filename)) {
                    $blogPost = BlogPost::find($blogPost->id);
                    $blogPost->featured_image_url = url(path:'/') . '/' . $filename;
                    $blogPost->save();
                }
            } else {
                $blogPost->featured_image_url = "null";
            }

            return redirect()->back()->with('success', 'Blog added Successfully!');
        } else {
            return redirect()->back()->with('failure', 'Problem occured while adding Blog!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogPost = BlogPost::find($id);
        $categories = Category::all();

        return view('Blog.editBlogPost', compact('blogPost', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogPost = BlogPost::find($id);
        $blogPost->title = $request->input(key:'blogtitle');
        $blogPost->details = $request->input(key:'blogdescription');
        $blogPost->category_id = $request->input(key:'category');
        $blogPost->user_id = 0;
        $blogPost->featured_image_url = 'null';

        if ($blogPost->save()) {
            $photo = $request->file(key:'featuredphoto');
            if ($photo != null) {
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(10000, 50000) . '.' . $ext;
                if ($photo->move(public_path(), $filename)) {
                    $blogPost = BlogPost::find($blogPost->id);
                    $blogPost->featured_image_url = url(path:'/') . '/' . $filename;
                    $blogPost->save();
                }
            }

            return redirect()->back()->with('success', 'Updated Successfully!');
        } else {
            return redirect()->back()->with('failed', 'Update Failed!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }
}