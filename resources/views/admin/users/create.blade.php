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
               
            <form method="POST" action='{{route("user.store")}}'>
               
               @csrf
               <div class="row">   
                        
                     <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" >   
                    </div>

                    <div class="form-group col-md-6">
                     <label for="description">Surname</label>
                     <input type="text" id="categorie" class="form-control" name="surname" placeholder="Surname">
                  </div>
               </div>
                 <div class="row">
                    <div class="form-group col-md-6">
                     
                        <label for="description">Civility</label>
                          <input type="text" id="price" class="form-control" name="civility" placeholder="Civility">

                     </div>
                     <div class="form-group col-md-6">
                            <label for="description">Phone</label>
                             <input type="text" id="quantity" class="form-control" name="phone" placeholder="Phone">
                     </div>
                  </div>
                  <div class="row">
                           <div class="form-group col-md-6">
                              <label for="description">Email</label>
                              <input type="email" id="price" class="form-control" name="email" placeholder="Email">
                           </div>

                           <div class="form-group col-md-6">
                                 
                              <label for="slug">Nationality</label>
                              <input type="text" id="description" class="form-control " placeholder="Nationality" name="nationality" >
                           </div>
                      
                  </div>

               <div class="form-group">             
                  <label for="slug">Password</label>
                  <input type="password" id="description" class="form-control " placeholder="Password" name="password" >
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

