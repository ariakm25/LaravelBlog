<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::orderBy('id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tags::all();

        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('info', 'You must have some categories and tags before create a post.');
            return redirect()->route('home');
        }

        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'featured'      => 'required|image',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required',
            'keyword'       => 'required',
            'description'   => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().'_'.$featured->getClientOriginalName();
        $featured->move('uploads/images', $featured_new_name);

        $post = Post::create([
            'title'         => $request->title,
            'slug'          => str_slug($request->title),
            'category_id'   => $request->category_id,
            'content'       => $request->content,
            'description'   => $request->description,
            'keyword'       => $request->keyword,
            'featured'      => 'uploads/images/'. $featured_new_name
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Success Creating Post');

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        return view('admin.posts.edit')->with('posts', $posts)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'title'         => 'required',
            'content'       => 'required',
            'category_id'   => 'required',
            'keyword'       => 'required',
            'description'   => 'required',
            ]);
            
        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/images', $featured_new_name);
            $post->featured = 'uploads/images/'.$featured_new_name;
        }

        $post->title        = $request->title;
        $post->content      = $request->content;
        $post->category_id  = $request->category_id;
        $post->description  = $request->description;
        $post->keyword      = $request->keyword;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated successfully');
        
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post was trashed');

        return redirect()->route('posts.index');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->orderBy('id')->get();
        return view('admin.posts.trashed')->with('trash', $posts);
    }

    public function deletePermanently($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post deleted pemanently.');

        return redirect()->route('posts.trash');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully.');
        
        return redirect()->route('posts.index');
    }
}
