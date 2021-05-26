@extends('layouts.admin')
@section('css')
@endsection 
@section('mycontent')
<div  class="card card-small mb-4 mt-4">
      <div class="row">
         <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
                Create
                users
            </strong>
               
            <form method="POST" action='{{route("user.update",$user->id)}}'>
               
            @csrf
               @method('PUT')
               <div class="row">   
                        
                     <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="{{$user->name}}" placeholder="Name" name="name" >   
                    </div>

                    <div class="form-group col-md-6">
                     <label for="description">Surname</label>
                     <input type="text" id="categorie" class="form-control" value="{{$user->surname}}" name="surname" placeholder="Surname">
                  </div>
               </div>
                 <div class="row">
                    <div class="form-group col-md-6">
                     
                        <label for="description">Civility</label>
                          <input type="text" id="price" class="form-control" value="{{$user->civility}}" name="civility" placeholder="Civility">

               </div>
               <div class="form-group col-md-6">
                            <label for="description">Phone</label>
                             <input type="text" id="quantity" class="form-control" value="{{$user->phone}}" name="phone" placeholder="Phone">
                          </div>
                      </div>
                      <div class="row">
                     <div class="form-group col-md-6">
                        <label for="description">Email</label>
                         <input type="email" id="price" class="form-control" value="{{$user->email}}" name="email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                            <label for="description">email verified</label>
                             <input type="email" id="quantity" class="form-control" value="{{$user->email_verified_at}}" name="email_verified_at" placeholder="email verified">
                          </div>
                      </div>

                      <div class="row">    
                        <div class="form-group col-md-6">
                  <label for="description">Fax</label>
                  <input type="file" id="price" class="form-control" value="{{$user->fax}}" name="fax" placeholder="Fax">
               </div>
               <div class="form-group col-md-6">
                  <label for="description">Birth_day</label>
                  <input type="file" id="price" class="form-control" value="{{$user->birth_day}}" name="birth_day" placeholder="birth_day"></textarea>
               </div>
                 </div>
                 <div class="row">    
                 <div class="form-group col-md-6">
                            
               <label for="slug">Nationality</label>
                  <input type="text" id="description" class="form-control " value="{{$user->nationality}}" placeholder="Nationality" name="nationality" >
               </div>
               <div class="form-group col-md-6">
                            
                <label for="slug">Pseudo</label>
               <input type="text" id="description" class="form-control " placeholder="Pseudo" value="{{$user->pseudo}}" name="pseudo" >
            </div>
            </div>
            <div class="row">    
                 <div class="form-group col-md-6">
                            
               <label for="slug">Avatar</label>
                  <input type="image" id="description" class="form-control" value="{{$user->avatar}}" placeholder="Avatar" name="avatar" >
               </div>
               <div class="form-group col-md-6">
                            
                <label for="slug">Password</label>
               <input type="password" id="description" class="form-control " value="{{$user->password}}" placeholder="Password" name="password" >
            </div>
            </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
               </div>
            </form>
         </div>
         </div>
      </div>
   </div>
@endsection

