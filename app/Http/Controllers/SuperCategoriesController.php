<?php

namespace App\Http\Controllers;

use App\Models\SuperCategories;
use App\Models\Collection;
use Illuminate\Http\Request;

class SuperCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $isEdit = false;
        $superCategory = new SuperCategories();
        $collections = Collection::all();

        return view ('admin.super_category.create-edit', compact([
            'collections',
            'isEdit',
            'superCategory',
        ]));
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'collection_id'=>'required',
            'slug'=>'required',
        ]);

        SuperCategories::create($validateDate);
        
        return redirect('super_cat');
    }

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $superCategories = SuperCategories::with(['collection'])->get();

        return view('admin.super_category.index', compact('superCategories'));
    }

    public function edit($id){
        $superCategory =  SuperCategories::findOrFail($id);
        $collections = Collection::all();
        $isEdit = true;
        
        return view('admin.super_category.create-edit',compact([
            'superCategory',
            'collections',
            'isEdit',
        ]));
    }
    
    public function update(Request $request, $id){
   
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'collection_id'=>'required',
            'slug'=>'required',
        ]);

        $superCategory = SuperCategories::findOrFail($id);
        $superCategory->update($validateDate);
            
        return redirect('super_cat');


    }

    public function destroy($id){

        $delete=SuperCategories::findOrFail($id);
        $delete->delete();
        return redirect ("super_cat");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
