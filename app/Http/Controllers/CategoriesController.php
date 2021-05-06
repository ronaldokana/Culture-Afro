<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\SuperCategories;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
   
    public function create(){
        $superCategories = SuperCategories::all();
        
        return view('admin.categories.create', compact([
            'superCategories'
        ]));
    }
    
    public function store(Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'super_category_id' => 'required',
            'slug' => 'required',
        ]);

        $collection = Categories::create($validateDate);
            
        return redirect('categories');
    }

    public function index(){
        $categories =   Categories::with(['superCategory'])->get();

        return view('admin.categories.index',compact([
            'categories'
        ]));
    }

    public function edit($id){
        $category= Categories::findOrFail($id);
        $superCategories = SuperCategories::all();
        
        return view('admin.categories.edit',compact([
            'superCategories','category'
        ]));
    }
    
    public function update(Request $request, $id){
        $validateDate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'super_category_id' => 'required',
            'slug' => 'required',
        ]);

        $category = Categories::findOrFail($id);
        $category->update($validateDate);
        
        return redirect('categories');
    }

    public function destroy($id){
        $delete = Categories::findOrFail($id);
        $delete->delete();
        return redirect ("categories");
    }
}
