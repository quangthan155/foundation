@extends('layouts.admin.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
      </h1>      
      <ol class="breadcrumb">
        {{-- <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li> --}}
        <li class="active">{{ isset($user) ? 'Update user' : 'Create user'}}</li>
      </ol>
    </section>
    <p class="btn btn-primary btn-flat pull-right"><a href="{{ url()->previous() }}" style="color: #fff">Back</a></p>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ isset($user) ? 'Update user' : 'Create user'}} form</h3>              
            </div>
            @include('admin.partials.errors-validate')
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}" method="POST" class="form-horizontal">
              @csrf
              <div class="box-body col-xs-6">
                <!-- Input-Email -->
                @include('admin.partials.input-text', [
                  'title' => 'Email',
                  'name' => 'email',
                  'value' => isset($user) ? old('email', $user->email) : old('email', ''),
                  'type' => 'email',
                  'isDisable' => isset($user) ? true : false
                ])

                <!-- Input-Name -->
                @include('admin.partials.input-text', [
                  'title' => 'Name',
                  'name' => 'name',
                  'value' => isset($user) ? old('name', $user->name) : old('name', '')
                ])

                <!-- Input-Password -->
                @include('admin.partials.input-text', [
                  'title' => 'Password',
                  'name' => 'password',
                  'value' => '',
                  'type' => 'password'
                ])

                <!-- Input-Password Confirmation -->
                @include('admin.partials.input-text', [
                  'title' => 'Password Confirmation',
                  'name' => 'password_confirmation',
                  'value' => '',
                  'type' => 'password'
                ])

                <!-- Input-Birthday -->
                @include('admin.partials.input-text', [
                  'title' => 'Birthday',
                  'name' => 'birthday',
                  'value' => isset($user) ? old('birthday', $user->birthday) : old('birthday', ''),
                ])

                <!-- Input-Select-Postion -->
                @include('admin.partials.input-select', [
                  'title' => 'Position',
                  'name' => 'position',
                  'value' => isset($user) ? old('position', $user->position) : old('position', ''),
                  'options' => $positions
                ])

                <!-- Input-Multi-Select-Roles -->
                @include('admin.partials.input-multi-select', [
                  'title' => 'Roles',
                  'name' => 'roles',
                  'value' => isset($userRoles) ? old('roles', $userRoles) : old('roles', []),
                  'options' => $roles
                ])

              </div>
              
              <!-- /.box-body -->
              @include('admin.partials.button-control', [
                'instance' => isset($user) ? $user : '',
                'deleteRoute' => isset($user) ? route('admin.user.destroy', $user->id) : ''
              ])
              <div class="box-footer"></div>
              <!-- /.box-footer -->
            
              </div>
            </div>
          </div>
</section>
@endsection

@push('scripts')
<script>
  $(function () {
    $('#inputBirthday').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    })

    $('.select2').select2();
  });
</script>
@endpush
