@extends('layouts.index')

@section('content')
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="signup-form">
                        <h2 align="center">Register</h2>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <input name="username" placeholder="Username" type="text">
                            <input name="email" placeholder="Email Address" type="text">
                            <input name="password" placeholder="Password" type="password">
                            <input name="password_confirmation" placeholder="Confirm Password" type="password" id="password-confirm" required autocomplete="new-password">
                            <div align="center">
                            <button type="submit" class="btn btn-default">Signup</button>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section><!--/form-->
@endsection
