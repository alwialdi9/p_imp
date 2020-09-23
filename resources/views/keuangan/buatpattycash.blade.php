@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url('/petty') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Patty Cash</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/petty/buat_petty')}}">Patty Cash</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Form Patty Cash</h4>
                  </div>
                  <form method="post" action="{{url ('/petty')}}">
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
                                  <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Search..." autocomplete="off">
                                </div>
                          </div>
                      {{-- <div class="col-sm-10 col-md-7">
                        
                      </div> --}}
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Transaksi</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control" id="jenis_transaksi" name="jenis_transaksi">
                            <option label="Pilih Jenis Transaksi"></option>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select2" id="ref_akun" name="ref_akun" required>
                            <option value="pembelian">7-50001 PattyCash</option>
                            <option>7-50002</option>
                            <option>7-50003</option>
                            <option>7-50004</option>
                            <option>7-50005</option>
                          </select>
                          <div class="valid-feedback">
                            {{-- formvalidation --}}
                            {{-- jika valid, tambahkan di input class is_valid --}}
                            {{-- jika invalid, tambahkan di input class is_invalid --}}
                          </div>
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan" required="">
                        <div class="valid-feedback">
                            {{-- formvalidation --}}
                            {{-- jika valid, tambahkan di input class is_valid --}}
                            {{-- jika invalid, tambahkan di input class is_invalid --}}
                          </div>
                      </div>
                    </div>
                    

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penerima</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control inputtags" placeholder="Masukkan Penerima" name="penerima">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Transaksi</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    Rp
                                  </div>
                                </div>
                          <input type="text" class="form-control currency" placeholder="Masukkan Total" name="nilai_transaksi">
                        </div>
                        </div>
                      </div>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ url('/petty') }}" class="btn btn-danger mx-2">Batal</a>
                     </div>
                    </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection