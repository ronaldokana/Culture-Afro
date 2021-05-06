@extends("layouts.admin")
@section('title', 'Create Collections')
@section("mycontent")
<div  class="card card-small mb-4 mt-4">
      <div class="row">
         <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
                Create
                Collections
            </strong>
               
            <form method="POST" action="{{route('collections.store')}}">
               
               @csrf
                        
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" > 
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror     
               </div>

               <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" > 
                  @error('slug')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror    
               </div>

               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"></textarea>
                  @error('description')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror   
               </div>

               

               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>


@endsection