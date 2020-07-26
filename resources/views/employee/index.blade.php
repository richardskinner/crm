@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Employee')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Employees</h1>
            <p class="text-muted">Welcome to the employees admin panel.</p>
        </div>
        <div class="col-6">
            <a class="float-right btn btn-success" href="{{ route('employees.create') }}">
                Add <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <section>
                <table id="table_id" class="table table-striped table-hover display">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($employees)
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No employees. <a class="btn btn-success btn-sm" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Add Employee</a></td>
                        </tr>
                    @endisset
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @isset($employees)
    <div class="row">
        <div class="col-lg-12">
            <section id="pagination" class="pagination">
                {{ $employees->links() }}
            </section>
        </div>
    </div>
    @endisset
@stop

@section('css')

@stop

@section('js')

@stop
