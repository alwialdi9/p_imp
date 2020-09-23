@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url('/penjualan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Penjualan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Keuangan</a></div>
              <div class="breadcrumb-item"><a href="{{url('/penjualan/buat_penjualan')}}">Buat Penjualan</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Form Penjualan</h4>
                  </div>
                  <form method="post" action="{{url ('/penjualan')}}">
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
                                <input type="text" id="tanggal" name="tanggal" class="form-control datepicker @error('tanggal') is-invalid @enderror" placeholder="Search..." autocomplete="off" required="" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                    <div class="invalid-feedback"> {{$message}}
                                    </div>
                                    @enderror
                                </div>
                          </div>
                      {{-- <div class="col-sm-10 col-md-7">
                        
                      </div> --}}
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control is_valid" placeholder="Masukkan Nomor Faktur" required="" name="nomor_faktur" value="F-{{$faktur}}">
                        <div class="has-feedback{{ $errors->has('nomor_faktur') ? 'has-error' : ''}}">
                          @if ($errors->has('nomor_faktur'))
                            <span class="help-block">
                              <p>{{ $errors->first('nomor_faktur') }} </p>
                            </span>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
                      <div class="col-sm-12 col-md-2">
                        <input type="text" class="form-control is_valid" id="kode_akun" required="" name="kode_akun" readonly value="1-10001">
                      </div>

                      <div class="col-sm-12 col-md-5">
                        <select class="form-control select2" id="referensi_akun" name="referensi_akun" required value="{{old('referensi_akun')}}" onchange="tampilkan_kode()">
                          @foreach ($ref_akun as $akun)
                          <option value="{{ $akun->nama_akun }} " id="{{ $akun->nama_akun }}">{{ $akun->nama_akun }} </option>
                          @endforeach
                        </select>
                        <div class="has-feedback{{ $errors->has('referensi_akun') ? 'has-error' : ''}}">
                          @if ($errors->has('referensi_akun'))
                            <span class="help-block">
                              <p>{{ $errors->first('referensi_akun') }} </p>
                            </span>
                            @endif
                          {{-- formvalidation --}}
                          {{-- jika valid, tambahkan di input class is_valid --}}
                          {{-- jika invalid, tambahkan di input class is_invalid --}}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control inputtags @error('nama_pelanggan') is-invalid @enderror" placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" autocomplete="off">
                          @error('nama_pelanggan')
                          <div class="invalid-feedback"> {{$message}}
                          </div>
                          @enderror
                       </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Penjualan</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric @error('status_penjualan') is-invalid @enderror" name="status_penjualan" id="status_penjualan" required value="{{old('status_penjualan')}}">
                          <option value="Lunas">Lunas</option>
                          <option value="Belum">Belum</option>
                          {{-- <option>Pending</option> --}}
                        </select>
                        @error('status_penjualan')
                        <div class="invalid-feedback"> {{$message}}
                        </div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="total" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                        <div class="col-sm-12 col-md-7">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                Rp
                              </div>
                            </div>     
                          <input type="text" class="form-control currency @error('total') is-invalid @enderror" placeholder="Masukkan Total" name="total" autocomplete="off" value="{{old('total')}}">
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
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ url('/penjualan') }} " class="btn btn-danger mx-2">Batal</a>
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