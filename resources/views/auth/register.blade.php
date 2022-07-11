@extends('layouts.auth')

@section ('title','Register')



@section ('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <form action= "/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" >
                              </div>
                              <div class="mb-3">
                                <label  class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" >
                              </div>
                              <button type="submit" class="btn btn-primary">register</button>
                        </div>
                        </form>

              Register Form  </div>
            </div>
        </div>
    </div>
</div>



@stop
