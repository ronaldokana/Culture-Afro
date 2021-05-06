<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use Illuminate\Http\Request;

class DeviseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $isEdit = false;
        $devise = new Devise();
       
        return view ('admin.devise.create', compact([
            'isEdit',
            'devise',
        ]));
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'display_name'=>'required',
            'symbol'=>'required',
            'factor'=>'required',
            'precision'=>'required',
        ]);

        $devise = Devise::create($validateDate);
        
        return redirect('devise');
    }

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $devises = Devise::all();

        return view('admin.devise.index', compact('devises'));
    }

    public function edit($id){
        $devise =  Devise::findOrFail($id);
        $isEdit = true;
        
        return view('admin.devise.create',compact([
            'devise',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id){
   
        $validateDate=$request->validate([
            'name'=>'required',
            'display_name'=>'required',
            'symbol'=>'required',
            'factor'=>'required',
            'precision'=>'required',
        ]);
        $devise = Devise::findOrFail($id);
        $devise = Devise::where('id','=',$id)->update($validateDate);
            
        return redirect('devise');


    }

    public function destroy($id){

        $delete=Devise::findOrFail($id);
        $delete->delete();
        return redirect ("devise");
    }

}
