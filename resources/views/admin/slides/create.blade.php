@extends('layouts.admin')
@section('title', 'Create Slide')
@section('mycontent')
<div  class="card card-small mb-4 mt-4">
      <div class="row">
         <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
                Create
                slide
            </strong>
               
            <form method="POST" action="{{route('slide.store')}}" enctype="multipart/form-data">
               
               @csrf  
                        
                     <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" id="image" accept="image/*" class="form-control" placeholder="Image" name="image" >   
                    </div>
                    

                    <div class="form-group">
                     <label for="description">Description</label>
                     <input type="text" id="Description" class="form-control" name="description" placeholder="Description">
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

