@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url('penjualan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Penjualan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
              <div class="breadcrumb-item"><a href="#">Buat Penjualan</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Form Penjualan</h4>
                  </div>
                  
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
                                  <input type="text" id="tanggal_penjualan" name="tanggal_penjualan" class="form-control datepicker" placeholder="Search..." autocomplete="off" required="">
                                  <div class="valid-feedback">
                                    {{-- formvalidation --}}
                                    {{-- jika valid, tambahkan di input class is_valid --}}
                                    {{-- jika invalid, tambahkan di input class is_invalid --}}
                                  </div>
                                </div>
                          </div>
                      {{-- <div class="col-sm-10 col-md-7">
                        
                      </div> --}}
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control is_valid" placeholder="Masukkan Nomor Faktur" required="" name="nomor_faktur">
                        <div class="valid-feedback">
                          {{-- formvalidation --}}
                          {{-- jika valid, tambahkan di input class is_valid --}}
                          {{-- jika invalid, tambahkan di input class is_invalid --}}
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control select2" id="ref_akun" name="ref_akun" required>
                          <option>Publish</option>
                          <option>Draft</option>
                          <option>Pending</option>
                        </select>
                        <div class="valid-feedback">
                          {{-- formvalidation --}}
                          {{-- jika valid, tambahkan di input class is_valid --}}
                          {{-- jika invalid, tambahkan di input class is_invalid --}}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan">
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Penjualan</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status_penjualan">
                          <option>Lunas</option>
                          <option>Belum</option>
                          {{-- <option>Pending</option> --}}
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control currency" placeholder="Masukkan Total" name="total_penjualan">
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ url('penjualan') }} " class="btn btn-danger mx-2">Batal</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection