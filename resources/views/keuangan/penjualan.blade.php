@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Company Management Enterprise</h1>

            <div class="section-header-breadcrumb">
              <a href="{{ url('buatpenjualan') }} " class="btn btn-primary"><i class="fas fa-plus"></i> Buat Penjualan</a>
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
                        20.000.000.000
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
                        140.000.000
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
                        459.000
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
                <h4>Penjualan Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-1">
                    <thead>                                 
                      <tr class="text-center">
                        <th class="text-center">
                          #
                        </th>
                        <th>Nama Customer</th>
                        <th>Mitra/Pesantren</th>
                        <th>Nominal Transaksi</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Transaksi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                      <tbody>
                      <tr>
                        <td class="p-0 text-center">
                          1
                        </td>
                        <td>Ahmad Najibullah</td>
                        <td class="align-middle">
                          Pesantren Al ishlah
                        </td>
                        <td>
                          120.123
                        </td>
                        <td><div class="badge badge-warning">Menunggu Pembayaran</div></td>
                        <td>-</td>
                        <td>-</td>
                      </tr>

                      <tr>
                        <td class="p-0 text-center">
                          2
                        </td>
                        <td>Ahmad Najibullah</td>
                        <td class="align-middle">
                          Pesantren Uswatun Hasanah
                        </td>
                        <td>
                          123.012
                        </td>
                        <td><div class="badge badge-info">Menunggu Konfirmasi</div></td>
                        <td> </td>
                        <td> </td>
                      </tr>

                      <tr>
                        <td class="p-0 text-center">
                          3
                        </td>
                        <td>Value 8</td>
                        <td class="align-middle">
                          Value 9
                        </td>
                        <td>
                          560.123
                        </td>
                        <td><div class="badge badge-warning">Menunggu Verifikasi</div></td>
                        <td><a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a></td>
                        <td><a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Verifikasi</a></td>
                      </tr>

                      <tr>
                        <td class="p-0 text-center">
                          4
                        </td>
                        <td>Value 11</td>
                        <td class="align-middle">
                          Value 12
                        </td>
                        <td>
                          788.908
                        </td>
                        <td><div class="badge badge-warning">Menunggu Verifikasi</div></td>
                        <td><a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Detail</a></td>
                        <td><a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Verifikasi</a></td>
                      </tr>

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