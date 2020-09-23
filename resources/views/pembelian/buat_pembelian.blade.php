@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url('/pembelian') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Pembelian</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Keuangan</a></div>
              <div class="breadcrumb-item"><a href="{{ url('/pembelian/buat_pembelian') }}">Buat Pembelian</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Form Pembelian</h4>
                  </div>
                  
                  <form method="post" action="{{url ('/pembelian')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4 floating-addon">
                        <div class="input-group mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                <div class="input-group col-sm-12 col-md-7">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text ml-3">
                                      <i class="far far-fw fa-calendar-alt"></i>
                                    </div>
                                  </div>
                                <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Search..." autocomplete="off" value="{{old('tanggal')}}" required="">
                                  <div class="has-feedback{{ $errors->has('tanggal') ? 'has-error' : ''}}">
                                    @if ($errors->has('tanggal'))
                                      <span class="help-block">
                                        <p>{{ $errors->first('tanggal') }} </p>
                                      </span>
                                      @endif
                                  </div>
                                </div>
                          </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control inputtags" id="nomor_faktur" placeholder="Masukkan Nomor Faktur" name="nomor_faktur" value="F-{{$faktur}}" required="">
                        <div class="has-feedback{{ $errors->has('nomor_faktur') ? 'has-error' : ''}}">
                          @if ($errors->has('nomor_faktur'))
                            <span class="help-block">
                              <p>{{ $errors->first('nomor_faktur') }} </p>
                            </span>
                            @endif
                          {{-- formvalidation --}}
                          {{-- jika valid, tambahkan di input class is_valid --}}
                          {{-- jika invalid, tambahkan di input class is_invalid --}}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control select2 inputtags" id="referensi_akun" name="referensi_akun" required>
                          @foreach ($ref_akun as $akun)
                          <option value="{{ $akun->nama_akun }} ">{{ $akun->nama_akun }} </option>
                          @endforeach
                        </select>
                        <div class="has-feedback{{ $errors->has('referensi_akun') ? 'has-error' : ''}}">
                          @if ($errors->has('referensi_akun'))
                            <span class="help-block">
                              <p>{{ $errors->first('referensi_akun') }} </p>
                            </span>
                            @endif
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Supplier</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control inputtags @error('supplier') is-invalid @enderror" placeholder="Masukkan Supplier" name="supplier" value="{{old('supplier')}}" autocomplete="off">
                          @error('supplier')
                          <div class="invalid-feedback"> {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Pembelian</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric @error('status_pembelian') is-invalid @enderror" name="status_pembelian" id="status_pembelian" value="{{old('status_pembelian')}}">
                          <option value="Lunas">Lunas</option>
                          <option value="Belum">Belum</option>
                          {{-- <option>Pending</option> --}}
                        </select>
                        @error('status_pembelian')
                          <div class="invalid-feedback"> {{$message}}
                          </div>
                          @enderror
                     </div>
                    </div>
                  

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                        <div class="col-sm-12 col-md-7">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                Rp
                              </div>
                            </div>                
                          <input type="text" class="form-control currency @error('total') is-invalid @enderror" placeholder="Masukkan Total" name="total" value="{{old('total')}}" autocomplete="off">
                          @error('total')
                          <div class="invalid-feedback"> {{$message}}
                          </div>
                          @enderror
                       </div>
                      </div>
                     </div> 

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ url('/pembelian') }} " class="btn btn-danger mx-2">Batal</a>
                      </div>
                     </div>
                    </div> 
                   </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
@endsection