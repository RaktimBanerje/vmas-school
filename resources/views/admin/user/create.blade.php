@extends('layouts.app')

@section('content')

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-1">
            <div class="col">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                    <h5 class="mb-0 text-primary">New User</h5>
                                </div>      
                            </div>
                        </div>
    
                        <hr>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                           
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <input type="file" class="form-control" name="photo" />
                            </div>
                           
                            <div class="form-group mb-3">
                                <button class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
