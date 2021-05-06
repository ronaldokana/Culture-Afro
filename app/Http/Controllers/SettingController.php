<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=Setting::all();

        return view ('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isEdit=false;
        $setting= new  Setting();
        return view('admin.settings.create-edit',compact('isEdit','setting'));
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
            'info1'=>'required',
            'description'=>'required',
            'tel1'=>'required',
            'tel2'=>'required',
        ]);

        Setting::create($validateDate);
        
        return redirect('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting=Setting::findOrFail($id);
        $isEdit=true;

        return view("admin.settings.create-edit",compact('setting','isEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validateDate=$request->validate([
            'info1'=>'required',
            'description'=>'required',
            'tel1'=>'required',
            'tel2'=>'required',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update($validateDate);
            
        return redirect('setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $delete=Setting::findOrFail($id);
        $delete->delete();
        return redirect ("setting");
    }
}
