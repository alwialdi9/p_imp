@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Preview Invoice</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Invoice</div>
        </div>
      </div>

      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print portrait" id="print_pdf">
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice-title">
                  <div class="row">
                    <div class="col-md-8" sty>
                    <h2 class="">CV. INFORMATIKA MEDIA PRATAMA</h2>
                  </div>
                  <div class="col-md-4">
                      <div class="float-left"><img src="{{ asset('img/logo/imp_invoice.png') }} " alt="" height="80"></div>
                    </div>
                  </div>
                  
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-8">
                    <address>
                      {{-- <strong>CV. INFORMATIKA MEDIA PRATAMA (IMP)</strong><br> --}}
                      Jalan Manunggal Pratama, Jl. Raya Kalimalang No.8, Cipinang Melayu,
                      Makasar,<br> Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13620<br> Telp: 021-87722941<br>
                      Email: admin@impstudio.id<br> 81.095.180.6-005.000
                      
                    </address>
                  </div>
                  <div class="col-md-4 text-md-left">
                    {{-- <address> --}}
                      <strong class="mr-3">Faktur# </strong>: {{ $faktur }}<br>
                      {{-- 1234 Main<br>
                      Apt. 4B<br>
                      Bogor Barat, Indonesia --}}
                      <strong class="mr-3">Tanggal </strong>:
                      {{ $tanggal }}<br>
                    {{-- </address> --}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-8" >
                    <address>
                      <strong>Pelanggan :</strong><br>
                      <div class="row">
                        <div class="col-md-2">
                          NAMA<br>
                          ALAMAT<br><br>
                          TELP<br>
                          FAX<br>
                        </div>
                        <div class="mx-1">
                          :<br>
                          :<br><br>
                          :<br>
                          :<br>
                        </div>
                        <div class="col-md-8">
                          {{ $nama }}<br>
                          {{ $alamat }}<br><br>
                          {{ $telp }}<br>
                          {{ $faks }}
                        </div>
                      </div>
                    </address>
                  </div>
                  <div class="col-md-4 text-md-left">
                    <address>
                      <strong>Jatuh Tempo:</strong><br>
                      {{ $tempo }}<br><br>
                    </address>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="section-title">Faktur</div>
                <p class="section-lead">All items here cannot be deleted.</p>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                      <th data-width="40">#</th>
                      <th>Keterangan</th>
                      <th class="text-center">QTY</th>
                      <th class="text-center">Harga Satuan (Rp)</th>
                      <th class="text-right">Pajak</th>
                      <th class="text-right">Jumlah</th>
                    </tr>
                    @foreach ($invoice as $ket)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $ket->keterangan }}</td>
                      <td class="text-center">{{ $ket->kuantitas }}</td>
                      <td class="text-center">{{ $hargasatuan }}</td>
                      <td class="text-right">X</td>
                      <td class="text-right">{{ $hargapenjualan }}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="section-title">Pesan</div>
                    <address class="section-lead">
                      Harap Melakukan Transfer Ke :<br>
                      Bank Mandiri<br>
                      No Rekening : 1290011074867<br>
                      Atas Nama : CV. Informatika Media Pratama
                    </address>
                    {{-- <div class="images">
                      <img src="{{ asset('img/logo/mandiri.jpg') }}" alt="mandiri" width="64" height="40">
                    </div> --}}
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name"><strong>Subtotal (Rp)</strong></div>
                      <div class="invoice-detail-value">{{ $hargapenjualan  }}</div>
                    </div>
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name"><strong>termasuk Pajak<br>(PPN+PPH) 12.0%</strong></div>
                      <div class="invoice-detail-value">{{ $info['pajak'] }}</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                    <div class="invoice-detail-value invoice-detail-value-lg">{{ $totaltagihan }}</div>
                    </div>
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Sisa Tagihan</div>
                      <div class="invoice-detail-value">{{ $sisa }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-8">
                <address>
                  <strong>Detail Pembayaran</strong><br>
                  <div class="row mb-3">
                    <div class="col-md-4">
                      NAMA BANK<br>
                      CABANG BANK<br>
                      NOMOR AKUN BANK<br>
                      ATAS NAMA<br>
                    </div>
                    <div class="mx-1">
                      :<br>
                      :<br>
                      :<br>
                      :<br>
                    </div>
                    <div class="col-md-7">
                      Bank Mandiri<br>
                      KCP. Jakarta Cijantung <br>
                      129-00-1107486-7<br>
                      CV. Informatika Media Pratama<br>
                    </div>
                  </div>
                  <strong class="mt-3">Terbilang :</strong><br>
                  Empat Juta Lima Ratus Tiga Puluh Ribu Rupiah
                </address>
              </div>
              <div class="col-md-4 text-md-left">
                <img src="{{ asset('img/logo/ttd-masagung2.png') }} " alt="">
              </div>
            </div>
          </div>
          <hr>
          <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
                {{-- mengirim datanya dengan id --}}
                <a href="{{ url('invoice/buatinvoice') }} " class="btn btn-icon icon-left btn-primary mr-3"><i class="far fa-edit"></i> Ubah Data</a>
            <a href="{{url('/invoice')}}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
            </div>
          <button onclick = "printContent('print_pdf')" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>Print</button>
          </div>
        </div>
      </div>
    </section>
  </div>
  
@endsection