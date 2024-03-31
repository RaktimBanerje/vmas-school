@extends('layouts.app')

@section('content')
<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title">Users</h4>
                            </div>

                            <div class="col-6 text-end">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Since</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <img src="{{Storage::url($user->photo)}}" style="height: 50px; width: 50px;" />
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                                <td>
                                                    @if($user->is_active == 1)
                                                    <span class="badge bg-success">Active</span>
                                                    @endif
                                                    
                                                    @if($user->is_active == 0)
                                                    <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('users.get_permission_manager', $user->id) }}" class="btn btn-sm btn-primary mx-1">Manage Permission</a>
                                                        
                                                        @if($user->is_active == 1)
                                                        <a href="{{ route('users.deactive', $user->id) }}" class="btn btn-sm btn-danger mx-1">Deactivate</a>
                                                        @endif
                                                        
                                                        @if($user->is_active == 0)
                                                        <a href="{{ route('users.active', $user->id) }}" class="btn btn-sm btn-success mx-1">Activate</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection