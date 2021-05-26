<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs=Shop::all();
        return view ("admin.fournisseur.index",compact("fournisseurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseur=new Shop();
        $isEdit=false;
        return view ("admin.fournisseur.create-edit",compact('fournisseur','isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'country'=>'required'
        ]);

        Shop::create($validateDate);

        return redirect('fournisseur');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur=Shop::findOrFail($id);
        $isEdit=true;

        return view("admin.fournisseur.create-edit",compact('fournisseur','isEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'country'=>'required'
        ]);

        $shop=Shop::findOrFail($id);
        $shop->update($validateDate);

       return redirect("fournisseur");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop=Shop::findOrFail($id);
        $shop->delete();

        return redirect("fournisseur");
    }
}
