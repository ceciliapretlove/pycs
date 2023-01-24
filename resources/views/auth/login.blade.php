@extends('layouts.login')
@section('content')


<div class="container parent-box">
    <div class="row align-items-center box">
        <!-- For Demo Purpose -->
        <div class="col-md-7 mb-5">
            <img src="assets/images/6308.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-5">

           <img src="assets/images/21cargo_logo.jpg" alt="logo" width="150" class="mx-auto d-block mb-3">
  
 <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="row">
                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>


                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Submit</span>
                        </button>
                    </div>

                    <!-- Forgot Password? -->
                    <div class="text-center w-100 d-inline-flex col-lg-12 mt-3" style="justify-content: space-between;">
                        <div>
                            <p class="text-muted font-weight-bold">               
                             @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </p>
                        </div>
                        <div class="text-right">
                            <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection