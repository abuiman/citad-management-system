@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h4>User</h4>
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            
                        </h3>
                    </div>
                    
                    <div class="card">
                    <div class="card-body">
                    
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">User Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                                <label class="badge badge-success"></label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    <x-adminlte-profile-widget name="{{ $user->name }}" desc="{{ $user->email }}" theme="primary"
    src="vendor/adminlte/dist/img/avt.jpg">
    <x-adminlte-profile-col-item class="text-primary border-right" icon="fas fa-lg fa-phone"
        title="Phone" text="080xxxxxxxxxx" size=6 badge="primary"/>
    <x-adminlte-profile-col-item class="text-danger" icon="fas fa-lg fa-users" title="Role"
        text="{{ $role }}" size=6 badge="danger"/>
    </x-adminlte-profile-widget>

            </div>

            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 
      <!-- /.modal -->
      <br/><br/>                   
                        
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop