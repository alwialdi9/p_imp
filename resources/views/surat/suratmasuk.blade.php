@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url('/surat') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Surat Masuk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/surat')}}">Surat</a></div>
              <div class="breadcrumb-item"><a href="{{url('/surat/suratmasuk')}}">Surat Masuk</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Buat Surat Masuk</h4>
                  </div>
                  
                  <form action="{{ url('/surat') }} " method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <input type="hidden" name="jenis" value="masuk">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Surat</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control select2" id="jenis_surat" name="jenis_surat" required>
                          @foreach ($kategori_surat as $k)
                          <option value="{{ $k->id }}" id="{{ $k->nama_kategori }}">{{ $k->nama_kategori }} </option>
                          @endforeach
                        </select>
                        <div class="valid-feedback">
                          {{-- formvalidation --}}
                          {{-- jika valid, tambahkan di input class is_valid --}}
                          {{-- jika invalid, tambahkan di input class is_invalid --}}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Surat</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" required="" name="nomor_surat" id="nomor_surat" value="{{ $nomornya }}/FK/">
                          <div class="has-feedback{{ $errors->has('nomor_surat') ? 'has-error' : ''}}">
                            @if ($errors->has('nomor_surat'))
                              <span class="help-block">
                                <p>{{ $errors->first('nomor_surat') }} </p>
                              </span>
                              @endif
                         </div>
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
                                  <input type="text" id="tanggal_surat" name="tanggal_surat" class="form-control daterange" placeholder="Search..." autocomplete="off" required>
                                  <div class="has-feedback{{ $errors->has('tanggal_surat') ? 'has-error' : ''}}">
                                    @if ($errors->has('tanggal_surat'))
                                      <span class="help-block">
                                        <p>{{ $errors->first('tanggal_surat') }} </p>
                                      </span>
                                      @endif
                                 </div>
                                </div>
                          </div>
                      {{-- <div class="col-sm-10 col-md-7">
                        
                      </div> --}}
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Surat</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" placeholder="Masukkan Asal Surat" required="" name="asal_surat">
                        <div class="has-feedback{{ $errors->has('asal_surat') ? 'has-error' : ''}}">
                          @if ($errors->has('asal_surat'))
                            <span class="help-block">
                              <p>{{ $errors->first('asal_surat') }} </p>
                            </span>
                            @endif
                       </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perihal</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" placeholder="Masukkan Perihal" name="perihal">
                          <div class="has-feedback{{ $errors->has('perihal') ? 'has-error' : ''}}">
                            @if ($errors->has('perihal'))
                              <span class="help-block">
                                <p>{{ $errors->first('perihal') }} </p>
                              </span>
                              @endif
                         </div>
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File Surat</label>
                        <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                          <input type="file" class="custom-file-input" id="customFile" name="filesurat">
                          <div class="has-feedback{{ $errors->has('filesurat') ? 'has-error' : ''}}">
                            @if ($errors->has('filesurat'))
                              <span class="help-block">
                                <p>{{ $errors->first('filesurat') }} </p>
                              </span>
                              @endif
                         </div>
                        </div>
                        </div>
                      </div>

                      <script>
                      $('#customFile').change(function() {
                        var i = $(this).prev('label').clone();
                        var file = $('#customFile')[0].files[0].name;
                        $(this).prev('label').text(file);
                      });

                      // document.getElementById("nomor_surat").disabled = true;
                      $("#jenis_surat").on("change", function(){
                        // ambil nilai
                        var kategori = $("#jenis_surat option:selected").attr("id");
                        document.getElementById("nomor_surat").disabled = false;
                        if (kategori == "Faktur") {
                          var jenis = "FK";
                        }
                        if (kategori == "Penawaran Harga") {
                          var jenis = "PH";
                        }
                        if (kategori == "Kwitansi") {
                          var jenis = "KW";
                        }
                        if (kategori == "Memorandum of Understanding") {
                          var jenis = "MOU";
                        }
                        if (kategori == "Permintaan") {
                          var jenis = "PER";
                        }
                        if (kategori == "Keterangan") {
                          var jenis = "KET";
                        }
                        if (kategori == "Penerimaan Magang") {
                          var jenis = "PM";
                        }
                        
                        var nosurat = '{{ $nomornya }}';
                        // if ({{ $id }} == null) {
                        //   nosurat = {{ $nomornya }};
                        // } else{
                        //   nosurat = {{ $nomornya }};
                        // }
                        // pindahkan nilai ke input
                        console.log(nosurat);
                        $("#nomor_surat").val( nosurat + '/' + jenis + '/');

                      });
                      </script>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ url('/surat') }} " class="btn btn-danger mx-2">Batal</a>
                        <button type="reset" class="btn btn-info">Reset</button>
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