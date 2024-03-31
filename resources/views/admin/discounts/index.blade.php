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
                                <h4 class="card-title">Discount Management</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('discounts.store')}}" method="POST">
                        @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Vehicle</th>
                                            <th>Stopage</th>
                                            <th>Discount Amount</th>
                                            <th>Discount Type</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->student_name }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td>{{ $student->vehicle_registration_no }} ({{ $student->identity_no }})</td>
                                            <td>{{ $student->stopage_name }} - {{ $student->stopage_fare }} INR</td>
                                            <td>
                                                <input type="text" class="form-control form-sm" name="amount[]" value="{{$student->discount_amount}}" />
                                            </td>
                                            <td>
                                                <select class="form-control" name="type[]">
                                                    <option value="percentage" selected <?php if($student->discount_type == "percentage") {echo "selected";} ?>>Percentage</option>
                                                    <option value="fixed" <?php if($student->discount_type == "fixed") {echo "selected";} ?>>Fixed amount</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="is_active[]" <?php if($student->discount_is_active) {echo "checked";} ?>>
                                                    <input type="text" class="d-none" name="student_id[]" value="{{$student->id}}" />  
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection