@extends('templates.header')
@extends('templates.sidebar')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ url('/penjualan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Penjualan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{url('/penjualan')}}">Penjualan</a></div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Isi Form Edit Penjualan</h4>
              </div>
              @foreach($penjualan as $p)
              <form method="post" action="{{url ('/penjualan/update')}}">
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
                        <input type="hidden" name="id" value="{{ $p->id }}">
                        <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Search..." autocomplete="off" required="" value="{{ $p->tanggal }}">
                </div>
               </div>
             </div>

             <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control is_valid" placeholder="Masukkan Nomor Faktur" required="" name="nomor_faktur" value="{{ $p->nomor_faktur }}">
              </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control inputtags" placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan" required value="{{ $p->nama_pelanggan }}" autocomplete="off">
              </div>
            </div>
                
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Penjualan</label>
                <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="status_penjualan" id="status_penjualan" required value="{{ $p->status_penjualan }}">
                    <option value="Lunas">Lunas</option>
                    <option value="Belum">Belum</option>
                    {{-- <option>Pending</option> --}}
                  </select>
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
                  <input type="text" class="form-control currency" placeholder="Masukkan Total" name="total" required value="{{ $p->total }}">
                </div>
              </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7"> 
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a href="{{ url('/penjualan') }} " class="btn btn-danger mx-2">kembali</a>
                </div>
              </div>
           </div>
          </form>
        @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection