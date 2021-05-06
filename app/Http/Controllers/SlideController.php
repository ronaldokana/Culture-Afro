<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
       
        return view ('admin.slides.create');
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'image'=>'required',
            'description'=>'required'
        ]);

        $devise = Slide::create($validateDate);
        
        return redirect('slides');
    }

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $slides = Slide::all();

        return view('admin.slides.index', compact('slides'));
    }

    public function edit($id){
        $slide =  Devise::findOrFail($id);
        
        return view('admin.devise.edit',compact([
            'slide'
        ]));
    }
    
    public function update(Request $request, $id){
   
        $validateDate=$request->validate([
            'image'=>'required',
            'description'=>'required'
        ]);
        $slide = Slide::findOrFail($id);
        $slide = Slide::where('id','=',$id)->update($validateDate);
            
        return redirect('slides');


    }

    public function destroy($id){

        $delete=Devise::findOrFail($id);
        $delete->delete();
        return redirect ("slides");
    }
}
