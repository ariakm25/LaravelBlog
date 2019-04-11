<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryApp;
use Session;

class CategoryAppsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryApps.index')->with('categories', CategoryApp::orderBy('id','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryApps.create');
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
            'name' => 'required'
        ]);

        $category = new CategoryApp;
        $category->name = $request->name;
        $category->save();
        
        Session::flash('success', 'Success');

        return redirect()->route('categoryApps');
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
        $category = CategoryApp::find($id);

        return view('admin.categoryApps.edit')->with('category', $category);
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
        $category = CategoryApp::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Success');

        return redirect()->route('categoryApps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryApp::find($id);

        if($category->posts)
        {
            foreach($category->posts as $post)
            {
                $post->forceDelete();
            }
        }

        $category->delete();

        Session::flash('success', 'Success');

        return redirect()->route('categoryApps');
    }
}
