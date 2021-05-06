@extends('layouts.admin')

@section('title', $isEdit?'Update Setting' : 'Create Setting')


@section('mycontent')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                 Update
               @else
                 Create
               @endif
               Setting
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('setting.update', $setting->id)}}"
                @else
                    action="{{route('setting.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="name">Contact 1</label>
                    <input type="text" class="form-control @error('tel1') is-invalid @enderror"
                        value="{{ old('tel1', $setting->tel1) }}" id="tel1" placeholder="Contact 1" name="tel1"> 
                    @error('tel1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="tel2">Contact 2</label>
                    <input type="text" id="tel2" class="form-control @error('tel2') is-invalid @enderror" placeholder="contact 2" name="slug" value="{{ old('tel2',$setting->tel2) }}"> 
                    @error('contact2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>

                <div class="form-group">
                    <label for="info1">Website Name</label>
                    <input type="text" id="info1" class="form-control @error('info1') is-invalid @enderror" placeholder="Name Website" name="info1" value="{{ old('info1',$setting->info1) }}"> 
                    @error('info1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description" name="description">{{ old('description', $setting->description) }}</textarea>
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