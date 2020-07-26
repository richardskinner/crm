@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Companies')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Companies</h1>
            <p class="text-muted">Welcome to the companies admin panel.</p>
        </div>
        <div class="col-6">
            <a class="float-right btn btn-success" href="{{ route('companies.create') }}">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('companies.edit', ['company' => $company->id]) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section id="pagination" class="pagination">
                {{ $companies->links() }}
            </section>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
