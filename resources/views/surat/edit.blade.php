@extends('templates.header')
@extends('templates.sidebar')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ url('/surat') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Surat</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{url('/surat')}}">Surat</a></div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Isi Form Edit Surat</h4>
              </div>
              @foreach($surat as $s)
              <form method="post" action="{{url ('/surat/update')}}">
                {{ csrf_field() }}
              <div class="card-body">
                <input type="hidden" name="jenis" value="masuk">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Surat</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control select2" id="jenis_surat" name="jenis_surat" required value="{{ $s->jenis }}">
                          {{-- @foreach ($surat as $k)
                          <option value="{{ $k->id }}" id="{{ $k->nama_kategori }}">{{ $k->nama_kategori }} </option>
                          @endforeach --}}
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4 floating-addon">
                        <div class="input-group mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Surat :</label>
                              <div class="input-group col-sm-12 col-md-7">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text ml-3">
                                     <i class="far far-fw fa-calendar-alt"></i>
                                   </div>
                                 </div>
                                  <input type="text" id="tanggal_surat" name="tanggal_surat" class="form-control daterange" placeholder="Search..." autocomplete="off" required value="{{ $s->tanggal_surat }}">
                              </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Surat</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" placeholder="Masukkan Asal Surat" required="" name="asal_surat" value="{{ $s->asal_surat }}">
                        </div>
                      </div>
                
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perihal</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" placeholder="Masukkan Perihal" name="perihal" value="{{ $s->perihal }}">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File Surat</label>
                        <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" class="custom-file-input" id="customFile" name="filesurat" value="{{ $s->surat_path }}">
                        </div>
                        </div>
                      </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7"> 
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a href="{{ url('/surat') }} " class="btn btn-danger mx-2">kembali</a>
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