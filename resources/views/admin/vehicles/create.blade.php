@extends('layouts.app')


@section('content')

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Vehicle</h4>
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="{{ route('vehicles.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="registration_no" class="form-label">Registration No:</label>
                            <input type="text" class="form-control @error('registration_no') is-invalid @enderror" id="registration_no" name="registration_no" value="{{ old('registration_no') }}" required>
                            @error('registration_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('registration_no') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="identity_no" class="form-label">Identity No:</label>
                            <input type="text" class="form-control @error('identity_no') is-invalid @enderror" id="identity_no" name="identity_no" value="{{ old('identity_no') }}" required>
                            @error('identity_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identity_no') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="seats" class="form-label">Seats:</label>
                            <input type="text" class="form-control @error('seats') is-invalid @enderror" id="seats" name="seats" value="{{ old('seats') }}" required>
                            @error('seats')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seats') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="seats" class="form-label">Department:</label>
                            <select class="form-control" name="department">
                                <option value="primary">Primary Department</option>
                                <option value="high">High Department</option>
                            </select>
                            @error('seats')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seats') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="engine_no" class="form-label">Engine No:</label>
                            <input type="text" class="form-control @error('engine_no') is-invalid @enderror" id="engine_no" name="engine_no" value="{{ old('engine_no') }}" required>
                            @error('engine_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('engine_no') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="insurance_valid_upto" class="form-label">Insurance Valid Upto:</label>
                            <input type="date" class="form-control @error('insurance_valid_upto') is-invalid @enderror" id="insurance_valid_upto" name="insurance_valid_upto" value="{{ old('insurance_valid_upto') }}">
                            @error('insurance_valid_upto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('insurance_valid_upto') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tax_valid_upto" class="form-label">Tax Valid Upto:</label>
                            <input type="date" class="form-control @error('tax_valid_upto') is-invalid @enderror" id="tax_valid_upto" name="tax_valid_upto" value="{{ old('tax_valid_upto') }}">
                            @error('tax_valid_upto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tax_valid_upto') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fitness_valid_upto" class="form-label">Fitness Valid Upto:</label>
                            <input type="date" class="form-control @error('fitness_valid_upto') is-invalid @enderror" id="fitness_valid_upto" name="fitness_valid_upto" value="{{ old('fitness_valid_upto') }}">
                            @error('fitness_valid_upto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fitness_valid_upto') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pollution_valid_upto" class="form-label">Pollution Valid Upto:</label>
                            <input type="date" class="form-control @error('pollution_valid_upto') is-invalid @enderror" id="pollution_valid_upto" name="pollution_valid_upto" value="{{ old('pollution_valid_upto') }}">
                            @error('pollution_valid_upto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pollution_valid_upto') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="permit_valid_upto" class="form-label">Permit Valid Upto:</label>
                            <input type="date" class="form-control @error('permit_valid_upto') is-invalid @enderror" id="permit_valid_upto" name="permit_valid_upto" value="{{ old('permit_valid_upto') }}">
                            @error('permit_valid_upto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('permit_valid_upto') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="driver_name" class="form-label">Driver Name:</label>
                            <input type="text" class="form-control @error('driver_name') is-invalid @enderror" id="driver_name" name="driver_name" value="{{ old('driver_name') }}" required>
                            @error('driver_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('driver_name') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="driver_phone" class="form-label">Driver Phone:</label>
                            <input type="text" class="form-control @error('driver_phone') is-invalid @enderror" id="driver_phone" name="driver_phone" value="{{ old('driver_phone') }}" required>
                            @error('driver_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('driver_phone') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="helper_name" class="form-label">Helper Name:</label>
                            <input type="text" class="form-control @error('helper_name') is-invalid @enderror" id="helper_name" name="helper_name" value="{{ old('helper_name') }}">
                            @error('helper_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('helper_name') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="helper_phone" class="form-label">Helper Phone:</label>
                            <input type="text" class="form-control @error('helper_phone') is-invalid @enderror" id="helper_phone" name="helper_phone" value="{{ old('helper_phone') }}">
                            @error('helper_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('helper_phone') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop