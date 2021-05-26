<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('admin.users.create') ; //
    }


    public function store(Request $request)
    {
        $validate_data=new User();
        $pass=$request->input('password');
        $pass=Hash::make($pass);
        $validate_data->name=$request->input('name');
        $validate_data->surname=$request->input('surname');
        $validate_data->civility=$request->input('civility');
        $validate_data->email=$request->input('email');
        $validate_data->phone=$request->input('phone');
        $validate_data->nationality=$request->input('nationality');
        $validate_data->password=$pass;
        $validate_data->save();
       return redirect('user');

    }

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $users=User::all();
        return view ('admin.users.index',compact('users'));
    }

    public function edit($id){
        $user=user::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, $id){
   
        
           
            $pass=$request->input('password');
            $pass=Hash::make($pass);
            
            $validate_data->email=$request->input('email');$validate_data->name=$request->input('name');
            $validate_data->surname=$request->input('surname');
            $validate_data->civility=$request->input('civility');
            $validate_data->phone=$request->input('phone');
            $validate_data->nationality=$request->input('nationality');
            $validate_data->password=$pass;
            
            $sur=User::findOrFail($id);
            $sur->update($validate_data);
        return redirect('user');

    }

    public function destroy($id)
    {
        $var=User::findOrFail($id); 
        $var->delete();
        return redirect('user');
    }
}
