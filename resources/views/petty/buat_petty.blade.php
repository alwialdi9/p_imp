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
                                  <input type="text" id="tanggal" name="tanggal" class="form-control datepicker @error('tanggal') is-invalid @enderror" placeholder="Search..." autocomplete="off">
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
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Transaksi</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control @error('jenis_transaksi') is-invalid @enderror" id="jenis_transaksi" name="jenis_transaksi">
                            <option label="Pilih Jenis Transaksi"></option>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                          </select>
                                @error('jenis_transaksi')
                                <div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select2 @error('referensi_akun') is-invalid @enderror" id="referensi_akun" name="referensi_akun">
                            @foreach ($ref_akun as $akun)
                          <option value="{{ $akun->nama_akun }} ">{{ $akun->nama_akun }} </option>
                          @endforeach
                          </select>
                                @error('referensi_akun')
                                <div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan" autocomplete="off">
                                @error('keterangan')
                                <div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                      </div>
                    </div>
                    

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penerima</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control inputtags @error('penerima') is-invalid @enderror" placeholder="Masukkan Penerima" name="penerima" autocomplete="off">
                                @error('penerima')
                                <div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
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
                          <input type="text" class="form-control currency @error('nilai_transaksi') is-invalid @enderror" placeholder="Masukkan Total" name="nilai_transaksi" autocomplete="off">
                                @error('nilai_transaksi')
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
                        <a href="{{ url('/petty') }}" class="btn btn-danger mx-2">Batal</a>
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