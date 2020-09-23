@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Company Management Enterprise</h1>

            <div class="section-header-breadcrumb">
              <a href=" {{ url('/biaya/buat_biaya') }} " class="btn btn-primary"><i class="fas fa-plus"></i> Buat Biaya</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-upload"></i>
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
                    <div class="card-icon bg-warning">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengeluaran (Rp)</h4>
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
                        {{ $tampilsaldo }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        {{-- <div class="row">
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
                  <table class="table table-striped" id="table-1">
                    <tr>
                      
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Penerima</th>
                      <th scope="col">Status</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    <tbody>
                      @foreach ( $biaya as $b)
                      <tr>
                          <th class="border" scope="row"> {{ $loop->iteration }} </th>
                          <td class="border">{{$b->tanggal}}</td>
                          <td class="border">{{$b->keterangan}}</td>
                          <td class="border">{{$b->penerima}}</td>
                          <td class="border">{{$b->status}}</td>
                          <td class="border">Rp. {{$b->total}}</td>
                          <td class="border">@if($b->status == "Lunas")
                            <a class="text-black" href="#">[Verifikasi]</a>
                              @else
                                -
                              @endif
                            </td>
                      </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

    </section>
</div>

@endsection