@extends('layouts.app')

@section('content')
<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stopages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Stopage</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('stopages.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fare</label>
                                    <input type="text" name="fare" class="form-control" />
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="bootstrap-modal">
    <div class="modal fade" id="modal">
        <form action="" method="POST" id="update-form">
            @csrf
            @method("PUT")
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fare</label>
                            <input type="text" name="fare" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}


<script>
    $(document).ready(function() {
        $(document).on("click", ".edit-button", function(e) {
            e.preventDefault(); // Prevent default form submission

            // Get data attributes from the clicked button
            const name = $(this).data('name');
            const fare = $(this).data('fare');
            const id = $(this).data('id');

            // Update form field values
            $("#update-form").find('input[name="name"]').val(name);
            $("#update-form").find('input[name="fare"]').val(fare);

            // Update form action URL with the ID
            const form = $("#update-form");
            form.attr('action', '/stopages/' + id); // Assuming your update route is /stopages/{id}
        });
    })
</script>

@endsection
