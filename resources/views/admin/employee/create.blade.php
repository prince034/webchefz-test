@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Company
                        <a class="btn btn-secondary float-end" href="{{route('admin.employees.index')}}" role="button">Back</a>
                    </div>

                    <div class="card-body">

                        <form class="row g-3" action="{{route('admin.employees.store')}}" method="post">
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
                                <label for="exampleFormControlInput1" class="form-label">Select Company</label>

                                <select name="company" class="form-select @error('company') is-invalid @enderror" aria-label="select Company">
                                    <option disabled selected value>Open this select menu</option>
                                    @foreach($company_ids as $company_id)
                                    <option value="{{$company_id->id}}">{{$company_id->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error invalid-feedback">@error('company'){{$message}}@enderror</span>
                            </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="exampleFormControlInput1"
                                           placeholder="First Name"  >
                                    <span class="error invalid-feedback">@error('firstname'){{$message}}@enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="exampleFormControlInput1"
                                           placeholder="Last Name"  >
                                    <span class="error invalid-feedback">@error('lastname'){{$message}}@enderror</span>
                                </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput2"
                                       placeholder="name@example.com"  >
                                <span class="error invalid-feedback">@error('email'){{$message}}@enderror</span>
                            </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleFormControlInput2"
                                           placeholder="987654312"  >
                                    <span class="error invalid-feedback">@error('phone'){{$message}}@enderror</span>
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
