@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Edit Employee')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Edit Employee</h1>
            <p class="text-muted">Edit existing employee.</p>
        </div>
    </div>
@stop

@section('content')
    @if($errors->has('error'))
        @foreach($errors->all() as $error)
            <div class="row">
                <div class="col-12">
                    <x-alert type="danger" :message="$error"></x-alert>
                </div>
            </div>
        @endforeach
    @endif
    @if(session()->has('success'))
        <div class="row">
            <div class="col-12">
                <x-alert type="success" :message="session()->get('success')"></x-alert>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="firstName">Company</label>
                    <select name="company_id" class="form-control">
                        <option></option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id === $employee->company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                    <br />
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="firstName" value="{{ old('first_name') ?? $employee->first_name }}">
                    @error('first_name')
                    <br />
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="firstName">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="lastName" value="{{ old('last_name') ?? $employee->last_name }}">
                    @error('last_name')
                    <br />
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="companyEmail">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="companyEmail" aria-describedby="companyEmailHelp" value="{{ old('email') ?? $employee->email }}">
                    <small id="companyEmailHelp" class="form-text text-muted">* Optional</small>
                    @error('email')
                    <br />
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="employeePhone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="employeePhone" aria-describedby="employeePhoneHelp" value="{{ old('phone') ?? $employee->phone }}">
                    <small id="employeePhoneHelp" class="form-text text-muted">* Optional</small>
                    @error('phone')
                    <br />
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
