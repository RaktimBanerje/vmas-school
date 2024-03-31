@extends('layouts.app')

@section('content')

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4 shadow mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Personal Details</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Student Image</label>
                                            <input type="file" class="form-control" name="student_image" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Student Name</label>
                                            <input type="text" name="student_name" required="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" name="father_name" required="" class="form-control">
                                        </div>
                                    </div>
                
                
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Mother Name</label>
                                            <input type="text" name="mother_name" required="" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3"></div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">DOB</label>
                                            <input type="date" name="dob" required="" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="">-Select-</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card p-4 shadow mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Academic Details</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Class</label>
                                            <select class="form-control" name="class_id" required="">
                                                <option value="">Select</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Roll</label>
                                            <input type="text" name="roll" required="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card p-4 shadow mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" required="" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Phone No</label>
                                            <input type="text" name="phone1" required="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Additional Phone No</label>
                                            <input type="text" name="phone2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card p-4 shadow mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Transport</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="row justify-content-between align-items-end">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Pickup Point</label>
                                            <select class="form-control" name="pickup_point" required="">
                                                <option value="">-Select-</option>
                                                @foreach($stopages as $stopage)
                                                    <option value="{{$stopage->id}}">{{$stopage->name}} - {{$stopage->fare}} INR</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <label class="form-label">Reserve From</label>
                                            <input type="month" class="form-control" name="reserve_from" required="">
                                        </div>
    
                                        <div class="form-check mb-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="collect_monthly_fees" name="collect_monthly_fees"> Collect Monthly Fees
                                            </label>
                                        </div>
    
                                        <div class="form-group mb-3" id="month_selector" style="display: none;">
                                            <label class="form-label">Month</label>
                                            <select class="form-control" id="month" name="number_of_months">
                                                <option value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card p-4 border border-2 border-dark mb-4" id="car_details" style="display: none;">
                                            <div class="card-body">
                                                <h6 class="text-start">Reg No: <span id="reg_no" style="font-weight: bold; text-align: right;"></span></h6>
                                                <h6 class="text-start">Driver Name: <span id="driver_name" style="font-weight: bold; text-align: right;"></span></h6>
                                                <h6 class="text-start">Driver Phone: <span id="driver_phone" style="font-weight: bold; text-align: right;"></span></h6>
                                                <h6 class="text-start">Helper Name: <span id="helper_name" style="font-weight: bold; text-align: right;"></span></h6>
                                                <h6 class="text-start">Helper Phone: <span id="helper_phone" style="font-weight: bold; text-align: right;"></span></h6>
                                                <h6 class="text-success" style="font-weight: bold;">Seat are available</h6>
                                            </div>
                                        </div>
                                        
                                        <div class="card p-4 shadow mb-4" id="seat_unavailable" style="display: none;">
                                            <div class="card-body">
                                                <h6 class="text-danger" style="font-weight: bold;">No seat are available</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-none">
                    <div class="card p-4 shadow mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Calculetor</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Admission Fees</td>
                                                <td>
                                                    <input type="text" class="form-control my-3" name="total_fees" value="50" readonly="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Monthly Fees</td>
                                                <td>
                                                    <input type="text" class="form-control my-3" name="total_fees" value="0" readonly="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payble Amount</td>
                                                <td>
                                                    <input type="text" class="form-control my-3" name="total_fees" value="50" readonly="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Amount</td>
                                                <td>
                                                    <input type="text" class="form-control my-3" name="cash_amount" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Return Amount</td>
                                                <td>
                                                    <h6 id="return_amount" class="my-3" style="font-weight: bold; text-align: right;">00 INR</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
             $("#collect_monthly_fees").on("click", function() {
                if ($('#collect_monthly_fees').is(':checked')) 
                {
                    $("#month_selector").show();
                } else 
                {
                    $("#month_selector").hide();
                }
            });
        })

        $("select[name='pickup_point']").on("change", function() {
            $("#car_details").hide()
            $("#seat_unavailable").hide()

            const formdata = new FormData();
            formdata.append('class_id', $("select[name='class_id']").val())
            formdata.append('stopage_id', $("select[name='pickup_point']").val())
            
            fetch("{{ route('check_seat') }}", {
                method: "POST",
                body: formdata
            })
            .then(response => response.json())
            .then(data => {
                if(data.remaining_seats == 0)
                {
                    $("#car_details").hide()
                    $("#seat_unavailable").show()
                    $("#payment_next").prop('disabled', true);
                    
                    $("#available_seat").text("There are no seats available. Please contact to XXXXXXXXXX")
                }
                else
                {
                    $("#car_details").show()
                    $("#seat_unavailable").hide()
                    $("#payment_next").prop('disabled', false);
                    
                    $("#reg_no").text(data.registration_no)
                    $("#driver_name").text(data.driver_name)
                    $("#driver_phone").text(data.driver_phone)
                    $("#helper_name").text(data.helper_name)
                    $("#helper_phone").text(data.helper_phone)
                    
                    $("#available_seat").text(`Available Seats are ${data.seats}`)
                }
            })
        })
    </script>

@stop