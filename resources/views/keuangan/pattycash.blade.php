@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Patty Cash </h1>
            <div class="card-header-action mx-3">
              <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
            </div>
            <div class="collapse" id="mycard-collapse">
              <div class="card-body">
                <div class="form-group">
                  <label>Transaksi :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control daterange">
                  </div>
                </div>
                <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fas fa-search-plus"></i> Search</a>
              </div>
              
            </div>

            <div class="section-header-breadcrumb">
              <a href="{{ url('/petty/buat_petty') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Patty Cash</a>
            </div>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-donate"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pemasukan (Rp) </h4>
                      </div>
                      <div class="card-body">
                        500.000
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-upload"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengeluaran (Rp) </h4>
                      </div>
                      <div class="card-body">
                        190.000
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Saldo (Rp)</h4>
                      </div>
                      <div class="card-body">
                        310.000
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Transaksi </h4>
                      </div>
                      <div class="card-body">
                        4
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
                  <h4>Patty Cash Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-1">
                      <thead>                                 
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Referensi Akun</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col" >Keterangan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($petty as $p)
                        <tr>
                            <th class="border border-success" scope="row"> {{ $loop->iteration }} </th>
                            <td class="border border-success">{{$p->tanggal}}</td>
                            <td class="border border-success">{{$p->referensi_akun}}</td>
                            <td class="border border-success">{{$p->jenis_transaksi}}</td>
                            <td class="border border-success ">{{$p->keterangan}}</td>
                            <td class="border border-success">Rp. {{($p->nominal)}}</td>
                            <td class="border border-success">@if ($p->jenis_transaksi == "Keluar")
                              <a href="#" class="text-black">[Verifikasi]</a>
                              @else
                                -
                              @endif</td>
                        </tr>
                        @endforeach
                     </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>

@endsection