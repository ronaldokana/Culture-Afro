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
        $slide = new Slide();
        $slide->fill($request->only([
            'description'
        ]));
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products/'.date('F').date('Y'), 'public');
            $slide->image = $image;
        }
        $slide->save();
        
        return redirect('slide');
    }

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $slides = Slide::all();

        return view('admin.slides.index', compact('slides'));
    }

    public function edit($id){
        $slide =  Slide::findOrFail($id);
        
        return view('admin.slides.edit',compact([
            'slide'
        ]));
    }
    
    public function update(Request $request, $id){
   
        $slide = Slide::findOrFail($id);
        $slide->fill($request->only([
            'description'
        ]));
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products/'.date('F').date('Y'), 'public');
            $slide->image = $image;
        }
        $slide->save();
            
        return redirect('slide');


    }

    public function destroy($id){

        $delete=Slide::findOrFail($id);
        $delete->delete();
        return redirect ("slide");
    }
}
