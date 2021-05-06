@extends("layouts.base")
@section('body')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h1>{{ __('Create Account') }}</h1>
                            </div>

                            <form method="POST" action="{{('register')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="first_name"  placeholder="First Name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="password-confirm" placeholder="Password Confirm" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <button type="submit" class="btn amado-btn mb-15">{{ __('Create Account') }}</button>
                                        </div>
                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>

@endsection