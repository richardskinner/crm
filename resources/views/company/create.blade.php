@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Add Company')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Add Company</h1>
            <p class="text-muted">Create new company.</p>
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
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="companyName">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <br />
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageInput">Logo</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="imageInput" aria-describedby="companyLogoHelp" />
                    <small id="companyLogoHelp" class="form-text text-muted">* Optional</small>
                    @error('logo')
                        <br />
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="companyEmail">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="companyEmail" aria-describedby="companyEmailHelp" value="{{ old('email') }}">
                    <small id="companyEmailHelp" class="form-text text-muted">* Optional</small>
                    @error('email')
                        <br />
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="companyWebsite">Website</label>
                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="companyWebsite" aria-describedby="companyWebsiteHelp" value="{{ old('website') }}">
                    <small id="companyWebsiteHelp" class="form-text text-muted">* Optional</small>
                    @error('website')
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
