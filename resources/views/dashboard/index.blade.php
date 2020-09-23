@extends('templates.header')
@extends('templates.sidebar')

@section('content')
@if(Session::has('alert'))
                    <script>
                      swal('Attention!!', 'You Must be Login Admin to Continue!', 'warning');
                    </script>
                @endif
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
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
                        {{ $tampilmasuk }}
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
                        {{ $tampilkeluar }}
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
                        {{ $pattycash }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Invoice</h4>
                      </div>
                      <div class="card-body">
                        {{ $totalinvoice }}
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
                  <h4>Dashboard Table</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        {{-- <th>No</th> --}}
                        <th>Nama Customer</th>
                        <th>Mitra/Pesantren</th>
                        <th>Nominal Transaksi</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Transaksi</th>
                        <th>Aksi</th>
                      </tr>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div>
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
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                          </div>
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
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                            <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>Hisam Humaidi</td>
                        <td class="align-middle">
                          Departemen Agama
                        </td>
                        <td>
                          560.123
                        </td>
                        <td><div class="badge badge-warning">Menunggu Verifikasi</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        <td><a href="#" class="btn btn-primary">Verifikasi</a></td>
                      </tr>

                      <!-- <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                            <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>Value 11</td>
                        <td class="align-middle">
                          Value 12
                        </td>
                        <td>
                          788.908
                        </td>
                        <td><div class="badge badge-warning">Menunggu Verifikasi</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        <td><a href="#" class="btn btn-primary">Verifikasi</a></td>
                      </tr> -->

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>

@endsection