

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Users</div>
            </div>        
               
            
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-1">
                <div class="col">
                    <div class="card border-top border-0 border-4 border-primary">
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
                            <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                </div>
                               
                                <div class="form-group mb-3">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" name="photo" />
                                </div>
                               
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control d-none" name="id" value="{{ $user->id }}" />
                                    <button class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
