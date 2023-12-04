@extends('layouts.layoutMasterAuth')

@section('title')
    Login
@endsection

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-4 col-xxl-3">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('login') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <h1 class="fw-bold">Flood Prediction</h1>
                    </a>
                    <p class="text-center fw-bold">Group 5 Data Science</p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                            In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
