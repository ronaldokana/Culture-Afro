@extends('layouts.admin')

@section('title', $isEdit?'Update Provider' : 'Create Provider')


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
               Provider
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('fournisseur.update', $fournisseur->id)}}"
                @else
                    action="{{route('fournisseur.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="name">Last Name and First Name</label>
                    <input type="text" class="form-control @error('tel1') is-invalid @enderror"
                        value="{{ old('name', $fournisseur->name) }}" id="name" placeholder="Last name and First name" name="name"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email',$fournisseur->email) }}"> 
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror    
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="info1">Phone</label>
                            <input type="tel" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone',$fournisseur->phone) }}"> 
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror    
                        </div>

                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="info1">Address</label>
                        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" value="{{ old('address',$fournisseur->address) }}"> 
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror    
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="info1">City</label>
                        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city',$fournisseur->city) }}"> 
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror    
                    </div>

                </div>


                <div class="form-group">
                    <label for="info1">Country</label>
                    <input type="text" id="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" name="country" value="{{ old('country',$fournisseur->country) }}"> 
                    @error('country')
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