<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\CategoryApp;
use Session;

class AppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.apps.index')->with('apps', App::orderBy('id', 'DESC')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryApp::all();

        if($categories->count() == 0 ){
            Session::flash('info', 'You must have some categories app before create a post.');
            return redirect()->route('home');
        }

        return view('admin.apps.create')->with('categories', $categories);
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
            'title'            => 'required',
            'content'          => 'required',
            'category_app_id'  => 'required',
            'featured'         => 'required|image',
            'platform'         => 'required',
            'license'          => 'required',
            'size'             => 'required',
            'version'          => 'required',
            'rating'           => 'required',
            'keyword'          => 'required',
            'description'      => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().'_'.$featured->getClientOriginalName();
        $featured->move('uploads/apps', $featured_new_name);

        App::create([
            'title'             => $request->title,
            'slug'              => str_slug($request->title),
            'content'           => $request->content,
            'category_app_id'   => $request->category_app_id,
            'featured'          => 'uploads/apps/'. $featured_new_name,
            'platform'          => $request->platform,
            'license'           => $request->license,
            'size'              => $request->size,
            'rating'            => $request->rating,
            'version'           => $request->version,
            'keyword'           => $request->keyword,
            'description'       => $request->description
        ]);

        Session::flash('success', 'Success Creating App');

        return redirect()->route('apps.index');

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
        $posts = App::find($id);

        return view('admin.apps.edit')->with('apps', $posts)->with('categories', CategoryApp::all());
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
            'title'            => 'required',
            'content'          => 'required',
            'category_app_id'  => 'required',
            'platform'         => 'required',
            'license'          => 'required',
            'size'             => 'required',
            'rating'           => 'required',
            'version'          => 'required',
            'keyword'          => 'required',
            'description'      => 'required'
        ]);
            
        $app = App::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/apps', $featured_new_name);
            $app->featured = 'uploads/apps/'.$featured_new_name;
        }

        $app->title             = $request->title;
        $app->content           = $request->content;
        $app->category_app_id   = $request->category_app_id;
        $app->description       = $request->description;
        $app->keyword           = $request->keyword;
        $app->platform          = $request->platform;
        $app->license           = $request->license;
        $app->size              = $request->size;
        $app->rating            = $request->rating;
        $app->version           = $request->version;

        $app->save();

        Session::flash('success','Apps updated successfully');
        
        return redirect()->route('apps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = App::find($id);
        $app->delete();

        Session::flash('success', 'App was deleted');

        return redirect()->route('apps.index');
    }
}
