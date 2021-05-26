@extends('layouts.admin')
@section('title', 'Edit Slide')
@section('mycontent')
<div  class="card card-small mb-4 mt-4">
      <div class="row">
         <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
                Edit Slide
            </strong>
               
            <form method="POST" action="{{route('slide.update',$slide->id)}}">
               
               @csrf
               @method('PUT')
                     
               <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" id="image" class="form-control" name="image"  placeholder="Image">

                  <div class="mt-2 py-2">
                        <img src=" {{ asset('storage/'.$slide->image) }}"
                            id="preview-image" class="img" height="140px">
                    </div>
               </div>
                 <div class="form-group">
               <label for="slug">Description</label>
                  <input type="text" id="description" class="form-control " value="{{old('description',$slide->description)}}" placeholder="Description" name="description" >
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Edit</button>
                
               </div>
            </form>
         </div>
         </div>
      </div>
   </div>
@endsection

