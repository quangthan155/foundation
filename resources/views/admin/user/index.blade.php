@extends('layouts.admin.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User list</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <p class="btn btn-primary btn-flat pull-right"><a href="{{ route('admin.user.create') }}" style="color: #fff">Create user</a></p>
      <div class="col-xs-12">        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">User list</h3>                
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>BirthDay</th>
                    </tr>
                    @foreach ($users as $key => $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td><a href="{{ route('admin.user.edit', $value->id) }}">{{ $value->email }}</a></td>
                        <td>{{ ucfirst($value->name) }}</td>

                        <td>{{ $value->birthday }}</td>
                        <td>
                            @include('admin.partials.control-buttons-list-page', [
                              'user_id'       => isset($value) ? $value->id : '',
                              'destroy_route' => isset($value) ? route('admin.user.destroy', $value->id) : '',
                              'update_route'  => isset($value) ? route('admin.user.update', $value->id) : '',
                            ])
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $users->links() }}
              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>
    </section>
@endsection
<div id="comfirm_modal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
</div>