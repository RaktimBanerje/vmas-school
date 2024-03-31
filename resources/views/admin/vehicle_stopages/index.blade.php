@extends('layouts.app')

@section('content')
<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header d-block">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Vehicle Stopages</h4>
                        </div>

                        <div class="col-6 text-end">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Update Vehicle Stopage</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th class="table-primary" style="color: black;">Stopage</th>

                                    @foreach($vehicles as $vehicle)
                                        <th>{{ $vehicle->registration_no }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stopages as $stopage)
                                    <tr>
                                        <td class="table-primary" style="color: black;">{{  $stopage->name }}</td>
                                        
                                        @foreach($vehicles as $vehicle)
                                            @if(in_array($stopage->id, $vehicle->stopages))
                                            <td class="table-success text-center">
                                                <i class="fas fa-check-circle text-success" style="font-size: 20px;"></i>
                                            </td>
                                            @else
                                            <td class="table-danger text-center">
                                                <i class="fas fa-times-circle text-danger" style="font-size: 20px;"></i>
                                            </td>
                                            @endif
                                        @endforeach
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

<!-- Modal -->
<div class="bootstrap-modal">
    <div class="modal fade" id="modal">
        <form action="{{ route('vehicle-stopages.store') }}" method="POST" id="update-form">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <select class="form-control" name="vehicle_id" id="vehicle_id" required>
                                        <option value="">Select</option>
                                        @foreach($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->registration_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @foreach($stopages as $stopage)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="stopages[]" value="{{ $stopage->id }}">
                                    <label class="form-check-label">{{ $stopage->name }}</label>
                                </div>
                            </div>   
                            @endforeach
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
    <script>
        $("#vehicle_id").on("change", function() {
            let val = $("#vehicle_id").val()
            fetch(`{{ url('vehicle-stopages/get-vehicle-stopages/') }}/${val}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    // Add any other headers if required
                },
            })
            .then(response => response.json())
            .then(data => {
                // Iterate through each checkbox with name="stopages[]"
                $('input[name="stopages[]"]').each(function() {
                    const checkboxValue = parseInt($(this).val()); // Convert value to integer

                    // Check the checkbox if its value is present in the 'data' array
                    if (data.includes(checkboxValue)) {
                        $(this).prop('checked', true);
                    }
                    else {
                        $(this).prop('checked', false);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        })
    </script>
@endsection