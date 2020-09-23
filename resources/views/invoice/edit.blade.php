@extends('templates.header')
@extends('templates.sidebar')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ url('/invoice') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Invoice</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{url('/invoice')}}">Invoice</a></div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Isi Form Edit Invoice</h4>
              </div>
              @foreach($invoice as $voice)
              <form method="post" action="{{url ('/invoice/update')}}">
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
                        <input type="hidden" name="id" value="{{ $voice->id }}">
                        <input type="text" id="tanggal_invoice" name="tanggal_invoice" class="form-control datepicker" placeholder="Search..." autocomplete="off" required="" value="{{ $voice->tanggal_invoice }}">
                </div>
               </div>
             </div>

             <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control is_valid" placeholder="Masukkan Nomor Faktur" required="" name="nomor_faktur" value="{{ $voice->nomor_faktur }}">
              </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control inputtags" placeholder="Masukkan Nama Pelanggan" name="pelanggan" required value="{{ $voice->pelanggan }}" autocomplete="off">
              </div>
            </div>
                
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Invoice (Keterangan)</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status_invoice" id="status_invoice" value="{{ $voice->status_invoice }}" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Termin I">Belum</option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan" value="{{ $voice->keterangan }}" required="">
                  </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Tagihan</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control currency mata-uang" placeholder="Masukkan Total Tagihan" name="total_tagihan" id="total_tagihan" value="{{ $voice->total_tagihan }}" required="">
                  </div>
              </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7"> 
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a href="{{ url('/invoice') }} " class="btn btn-danger mx-2">kembali</a>
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