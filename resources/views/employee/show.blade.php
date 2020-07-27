@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', $employee->name)

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>{{  $employee->name }}</h1>
            <p class="text-muted">Employee details.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    <ul class="list-unstyled">
                        <li>{{ $employee->company->name }}</li>
                        <li>{{ $employee->email }}</li>
                        <li>{{ $employee->phone }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>
                    <form method="POST", action="{{ route('employees.destroy', ['employee' => $employee->id]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Deleted</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
