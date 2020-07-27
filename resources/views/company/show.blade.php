@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', $company->name)

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>{{ $company->name }}</h1>
            <p class="text-muted">Company details.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <img alt="Company Logo" src="{{ @asset($company->logo) }}" />
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            <h2>{{ $company->name }}</h2>
                            <ul class="list-unstyled">
                                <li>{{ $company->email }}</li>
                                <li>{{ $company->website }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('companies.edit', ['company' => $company->id]) }}">Edit</a>
                    <form method="POST", action="{{ route('companies.destroy', ['company' => $company->id]) }}">
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
