@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice </h1>
            <div class="card-header-action mx-3">
              <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
            </div>
            <div class="collapse" id="mycard-collapse">
              <div class="card-body">
                <form action="{{ url('/searchinvoice') }} " method="post">
                  @csrf
                <div class="form-group">
                  <label>Transaksi :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control daterange" name="search">
                  </div>
                </div>
                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-search-plus"></i> Search</button>
              </form>
              </div>
              
            </div>

            <div class="section-header-breadcrumb">
              <a href="{{ url('/invoice/buatinvoice') }} " class="btn btn-primary"><i class="fas fa-plus"></i> Buat Invoice</a>
            </div>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-donate"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Transaksi </h4>
                      </div>
                      <div class="card-body">
                        {{ $transaksi ?? '' }}
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Transaksi (Rp) </h4>
                      </div>
                      <div class="card-body">
                        {{ $total ?? '' }}
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        </div>

        {{-- table --}}
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Invoice Table</h4>
                </div>
                <div class="card-body">
                  <a class="table-responsive">
                    <table class="table table-striped table-hover text-center" id="table-1">
                      <thead>                                 
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Nomor Faktur</th>
                          <th>Pelanggan</th>
                          <th>Keterangan</th>
                          <th>Keterangan</th>
                          <th>Nilai Transaksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($invoice as $voice)
                      <tr>
                      <td class="" scope="row">{{ $loop->iteration}}</td>
                      <td class="">{{ $voice->tanggal_invoice }}</td>
                      <td class="">{{ $voice->nomor_faktur }}
                      <div class="table-links">
                        <!-- <a href="/invoice/edit/{{ $voice->id }}"><i class="fas fa-edit"></i> Ubah</a>
                          <div class="bullet"></div>
                          <a href="#"><i class="far fa-eye"></i> Lihat</a>
                          <div class="bullet"></div> -->
                          <a href="/invoice/hapus/{{ $voice->id }}" class="text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                        </div>
                      </td>
                      <td class="">{{ $voice->pelanggan }}</td>
                      <td class="">{{ $voice->status_invoice }}</td>
                      <td class="">{{ $voice->keterangan }}
                        <div class="table-links">
                            <a href="/invoice/lihat/{{ $voice->id }}"><i class="far fa-eye"></i> Lihat</a>
                            
                          </div>
                      </td>
                      <td class=" currency">{{ $voice->total_tagihan }}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </section>
</div>

@endsection