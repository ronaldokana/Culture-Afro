@extends("layouts.base")
@section('body')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title text-center mb-4">
                                <h1>{{ __('Login') }}</h1>
                            </div>

                            <form method="POST" action="{{ route('login') }}" >
                                @csrf
                                <div class="row">
        
                                    <div class="col-12 mb-4">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"  required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
 
                                    

                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="custom-control custom-checkbox d-block mb-2" style="margin-top:100px;">
                                            <button type="submit" class="btn amado-btn mb-15">{{ __('Login') }}</button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
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