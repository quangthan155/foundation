@extends('layouts.admin.dashboard')
@section('content')
<body class="login">
    <div>
        <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if($errors)
                    @foreach ($errors->all() as $error)
                       <div>{{ $error }}</div>
                   @endforeach
                @endif                
                <form method="POST" action="{{route('admin_login')}}">
                    <h1>Login Form</h1>
                    @csrf
                    </br>
                    <div class="form-group">
                    {{ Form::text('email', 'Email', array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                    {{ Form::password('password' , array('class' => 'form-control')) }}
                    </div>
                    <div>
                    <button class="btn btn-default submit" type="submit">Log in</button>
                    <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                    </div>
                </form>            
            </section>
        </div>
        </div>
    </div>
</body>