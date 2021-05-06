<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        

        return view ('admin.collections.create');
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);

        $collection = new Collection();
        $collection->fill($request->only([
            'name',
            'description',
            'slug'
        ]));

        $collection->save();
            
        return redirect('collections');
    }

    public function index(){
        $collections = Collection::all();

        return view('admin/collections/index',compact([
            'collections'
        ]));
    }

    public function edit($id){
        $collection = Collection::findOrFail($id);
        
        return view('admin.collections.edit',compact([
            'collection'
        ]));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
        ]);

        $collection = Collection::findOrFail($id);
        $collection->fill($request->only([
            'name',
            'description',
            'slug'
        ]));
        $collection->save();
            
        return redirect('collections');
    }

    public function destroy($id){
        $collection = Collection::findOrFail($id);

        $collection->delete();
        return redirect ("collections");
    }
}
