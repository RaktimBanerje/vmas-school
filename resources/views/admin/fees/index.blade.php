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
                                <h4 class="card-title">Fees Collection</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#home">Monthly Payment</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#menu1">Admission Payment</a>
                            </li>
                        </ul>
                        
                          <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container-fluid tab-pane active"><br>
                              <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Payment Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($months as $month)
                                            <tr>
                                                <td>{{ $month->student_name }}</td>
                                                <td>{{ $month->payment_amount }}</td>
                                                <td><span class="badge bg-primary">{{ $month->payment_mode }}</span></td>
                                                <td></td>
                                                <td>{{ $month->payment_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                            <div id="menu1" class="container-fluid tab-pane fade"><br>
                              <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Payment Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admissions as $admission)
                                            <tr>
                                                <td>{{ $admission->student_name }}</td>
                                                <td>{{ $admission->payment_amount }}</td>
                                                <td><span class="badge bg-primary">{{ $month->payment_mode }}</span></td>
                                                <td></td>
                                                <td>{{ $admission->payment_date }}</td>
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
    </div>
</div>
@stop