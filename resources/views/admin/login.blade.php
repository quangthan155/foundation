@extends('layouts.admin.login')
@section('content')
<body>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <div id="login-page">
        
      <div class="container">
        
        <form method="POST" action="{{route('admin_login')}}">          
          <div class="login-wrap" style="width: 400px; margin: 0 auto;">
            @csrf
            <h2 class="form-login-heading" style="text-align: center"> GTM - Admin login </h2>            
            </br>
            @if($errors)
                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif 
            <div class="form-group">
            {{ Form::text('email', 'Email', array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
            {{ Form::password('password' , array('class' => 'form-control')) }}
            </div>
            <label class="checkbox">
              <input type="checkbox" value="remember-me"> Remember me
              <span class="pull-right">
              <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
              </span>
              </label>
            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            <hr>
            </form>
          </div>
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
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
                  <button class="btn btn-theme" type="button">Submit</button>
                </div>
              </div>
            </div>
          </div>
          <!-- modal -->
        </form>
      </div>
    </div>
</body>