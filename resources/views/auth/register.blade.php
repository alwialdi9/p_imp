@extends('templates.header')

@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('img/logo/imp-logo.png') }} " alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

              <div class="card-body">
                <form method="post" action="{{ url('/registerPost') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                  

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                  </div>

                  <div class="form-divider">
                    Data Lainnya
                  </div>
                  
                    <div class="form-group">
                      <label>Telepon</label>
                      <div class="input-group only-numbers">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="telepon" id="telepon" placeholder="Masukkan telepon">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="level" value="admin" class="selectgroup-input">
                          <span class="selectgroup-button">Admin</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="level" value="operator" class="selectgroup-input">
                          <span class="selectgroup-button">Operator</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="level" value="owner" class="selectgroup-input">
                          <span class="selectgroup-button">Owner</span>
                        </label>
                      </div>
                    </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                    <a href="{{ url('dashboard') }} " class="btn btn-success btn-lg btn-block">Back to Dashboard</a>
                  </div>
                </form>
              </div>
            </div>
            {{-- <div class="simple-footer">
              Copyright &copy; IMP Studio <?= date('Y') ?>
            </div> --}}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
