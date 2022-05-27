@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Company
                        <a class="btn btn-secondary float-end" href="{{route('admin.companies.index')}}" role="button">Back</a>
                    </div>

                    <div class="card-body">

                        <form class="row g-3" action="{{route('admin.companies.store')}}" method="post" enctype="multipart/form-data">
                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1"
                                       placeholder="Company Name" required>
                                <span class="error invalid-feedback">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput2"
                                       placeholder="name@example.com" required>
                                <span class="error invalid-feedback">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Select Logo</label>
                                <input name="logo" class="form-control @error('logo') is-invalid @enderror" type="file" id="formFile" required>
                                <span class="error invalid-feedback">@error('logo'){{$message}}@enderror</span>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
