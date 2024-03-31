@extends('layouts.app')

@section('content')

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">New Fees Collection</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Select Student</label>
                            <select class="form-control" name="student_id">
                                <option>Select</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student_id }} - {{ $student->student_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div id="student-details"></div>
                        <div id="no-student">
                            <div class="doc-placholder text-center" style="padding: 40px 24px; background-color: #f1f1f1; border-radius: 12px;">
                                <figure>
                                    <img src="/assets/images/searching.png" style="max-width: 72px;">
                                </figure>
                                <h4>There are no selected student</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Calculator</h4>
                    </div>
                    <div class="card-body">
                        <fieldset>
                            <form action="{{route('fees.store')}}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Monthly Fees</td>
                                                <td>
                                                    <input type="text" class="form-control" name="monthly_fees" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Number of Months</td>
                                                <td>
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
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>
                                                    <input type="text" class="form-control" name="total_fees" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Discount Amount</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="discount_amount" value="">
                                                        <span class="input-group-text" id="basic-addon2"></span>
                                                    </div>
                                                    <input type="text" class="form-control d-none" name="discount_type" value="">
                                                    <input type="text" class="form-control d-none" name="discount_applied" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payble Amount</td>
                                                <td>
                                                    <input type="text" class="form-control" name="payble_amount" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Amount</td>
                                                <td>
                                                    <input type="text" class="form-control" name="cash_amount" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Return Amount</td>
                                                <td>
                                                    <input type="text" class="form-control" name="return_amount" value="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <input type="text" class="d-none" name="student_id" value="" />
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector("select[name='student_id']");

        selectElement.addEventListener('change', async function() {
            const selectedStudentId = selectElement.value;

            try {
                const response = await fetch(`/students/${selectedStudentId}`); // Replace with your actual API endpoint
                if (!response.ok) {
                    throw new Error(`Error fetching student details: ${response.status}`);
                }

                const studentDetails = await response.json(); // Assuming the API response contains student details

                $("#no-student").hide()

                $("input[name='monthly_fees']").val(studentDetails.student.stopage_fare)

                $("input[name='student_id']").val(studentDetails.student.student_id)

                if(studentDetails.student.discount_is_active) {
                    $("input[name='discount_applied']").val(1)
                    $("input[name='discount_amount']").val(studentDetails.student.discount_amount)
                    $("input[name='discount_type']").val(studentDetails.student.discount_type)

                    if(studentDetails.student.discount_type == "percentage") {
                        $("#basic-addon2").text("%")
                    }
                    else {
                        $("#basic-addon2").text("INR")
                    }
                }
                else {
                    $("input[name='discount_applied']").val(0)
                }

                document.getElementById('student-details').innerHTML = `
                    <p>Student ID: ${studentDetails.student.student_id}</p>
                    <p>Student Name: ${studentDetails.student.student_name}</p>
                    <p>Payment Clear Till: ${studentDetails.last_payment != null ? studentDetails.last_payment.to_date : 'No Payment Found'}</p>
                `;
            } catch (error) {
                console.error('Error fetching student details:', error);
            }
        });
    });

    $(document).ready(function() {
    // Cache selectors for performance
    var monthlyFees = $("[name='monthly_fees']");
    var numberOfMonths = $("#month");
    var totalAmount = $("[name='total_fees']");
    var discountAmount = $("[name='discount_amount']");
    var discountType = $("[name='discount_type']");
    var payableAmount = $("[name='payble_amount']");
    var cashAmount = $("[name='cash_amount']");
    var returnAmount = $("[name='return_amount']");

    // Function to update total amount
    function updateTotalAmount() {
        var monthlyFees = parseFloat($("[name='monthly_fees']").val());
        var numberOfMonths = parseInt($("#month").val());
        if (!isNaN(monthlyFees) && !isNaN(numberOfMonths)) {
            var totalAmount = monthlyFees * numberOfMonths;
            $("[name='total_fees']").val(totalAmount);
            updatePayableAmount();
        } else {
            $("[name='total_fees']").val("");
            $("[name='payble_amount']").val("");
        }
    }

    function updatePayableAmount() {
        var totalAmount = parseFloat($("[name='total_fees']").val());
        var discount = $("[name='discount_amount']").val();
        var type = $("[name='discount_type']").val(); // Assumes discountType value is retrieved using a jQuery selector

        if (type == "percentage") {
            var discountPercent = parseFloat(discount); // Assuming discount is stored as a percentage value (e.g., "10" for 10%)
            var discountValue = totalAmount * (discountPercent / 100);
            var payableAmount = totalAmount - discountValue;
        } else if (type == "fixed") {
            // Assuming discount is already a fixed amount
            var payableAmount = totalAmount - parseFloat(discount);
        } else {
            console.error("Invalid discount type:", type);
            payableAmount = totalAmount; // Handle any unexpected type errors
        }

        $("[name='payble_amount']").val(payableAmount);
        updateReturnAmount();
    }

    // Function to update return amount based on cash amount
    function updateReturnAmount() {
        var payableAmount = parseFloat($("[name='payble_amount']").val());
        var cashAmount = parseFloat($("[name='cash_amount']").val());
        if (!isNaN(payableAmount) && !isNaN(cashAmount)) {
            var returnAmount = cashAmount - payableAmount;
            $("[name='return_amount']").val(returnAmount);
        } else {
            $("[name='return_amount']").val("");
        }
    }

    // Attach change event handlers
    numberOfMonths.change(updateTotalAmount);
    cashAmount.change(updateReturnAmount);

    // Call updateTotalAmount initially to handle pre-filled values
    updateTotalAmount();
    });
</script>

@stop