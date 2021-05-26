@extends('layouts.base')
@section('title') Changement du mot de passe @endsection



@section('body')
    <div class="container content">
        <div class="row">
            <div class="col">
    
                <!-- Breadcrumbs -->
    
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">@awt('Home')</a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile') }}">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                @awt('My Acount')
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                @awt('Change my Password')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                @include('user.side-bar')
            </div>
            
            <div class="col-md-8">
                <div class="box-shadow radius-lg">
                    <div class="border-bottom px-4 py-3">
                        <b>@awt('Change my password')</b>
                    </div>
                    
                    <div class="px-4 py-3">
                        <form action="{{ route('user-password.update') }}" method="POST">
                            @csrf
                            @method('PUT')        
                            <div class="form-group">
                                <label for="current_password">@awt('Old password')</label>
                                <input name="current_password" placeholder="@awt('Old password')" class="form-control @error('current_password') is-invalid @enderror" id="current_password" type="password" required>
                                @error ('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="password">@awt('New password')</label>
                                <input name="password" placeholder="@awt('New password')" class="form-control @error('password') is-invalid @enderror" id="password" type="password" required>
                                @error ('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label for="password_confirmation">@awt('Confirm new password')</label>
                                <input name="password_confirmation" placeholder="@awt('Confirm new password')" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" required>
                                @error ('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group text-right">
                                <a class="text-danger" href="{{ route('password.request') }}">
                                    @awt('Forgot your password ?')
                                </a>
                            </div>
                            <hr>
    
                            <div class="form-group">
                                <div class="text-right">
                                    <button class="btn btn-success" type="submit">@awt('Save')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection