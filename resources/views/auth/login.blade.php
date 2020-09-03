@extends('layouts.guest')

@section('content')

<div class="row min-vh-100 justify-content-center">
        <div class="col-md-10 d-flex align-items-center">
            <div class="card w-100 border-0 shadow-sm">
                <div class="row">
                    <div class="col-md-7 text-center">
                        <img src="assets/images/background/login-bg.png" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-md-5 py-5">
                        <div class="p-5">
                            <h1 class="text-accent"  style="font-weight:bold">TIKETKU CMS</h1>
                            <br/>
                            <h3 class="mb-4 text-dark font-weight-bold">SIGN IN</h3>
                            <form class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="feather-user"></i></span>
                                        </div>
                                        <input type="text"  class="form-control border-left-0 {{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder=" Email" required>
                                        
                                        
                                    </div>
                                    <!-- @if ($errors->has('email'))
                                            
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif -->

                                        @foreach($errors->all() as $error)
                                            
                                            <p class="text-danger">{{$error}}</p>
                                        @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="feather-lock"></i></span>
                                        </div>
                                        <input type="password"  class="form-control border-left-0 {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password" required >
                                        
                                    </div>
                                    @if ($errors->has('password'))

                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                </div>
                                <div class="form-group mt-4">
                                    <button class="btn bg-accent text-white px-5 py-2" type="submit">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- <div class="container"> -->

    <!-- <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder=" Email" required/>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password" required/>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <label class="checkbox">
                <input type="checkbox" name="remember" value="remember-me" {{ old('remember') ? 'checked' : '' }}> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href=""> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>
    </form> -->
<!--             <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div> -->

        

        <!-- Modal -->
        <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- modal -->

    

<!-- </div> -->






@endsection
