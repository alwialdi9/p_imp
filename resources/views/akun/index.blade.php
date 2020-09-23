@extends('templates.header')
@extends('templates.sidebar')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Akun</h1>

            {{-- @if (session('status'))
              <script>
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
              });
              
              Toast.fire({
                type: 'success',
                title: "{{ session('status') }} "
              })
              </script>
          @endif --}}

            <div class="section-header-breadcrumb">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="modal-create"><i class="fas fa-user-plus"></i> Buat Akun</a>
            </div>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Akun Tersedia </h4>
                      </div>
                      <div class="card-body">
                        {{ $totalakun }}
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
                <h4>Data Akun</h4>

                <div class="card-header-action dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fas fa-filter"></i> Filter Akun</a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <li class="dropdown-title">Pilih Akun</li>
                    <li><a href="{{ url('akun') }} " class="dropdown-item">Semua</a></li>
                    <li><a href="{{ url('akun/1') }} " class="dropdown-item">Kas & Bank</a></li>
                    <li><a href="{{ url('akun/2') }} " class="dropdown-item">Akun Piutang</a></li>
                    <li><a href="{{ url('akun/3') }} " class="dropdown-item">Aktiva Tetap</a></li>
                    <li><a href="{{ url('akun/4') }} " class="dropdown-item">Aktiva Lancar</a></li>
                    <li><a href="{{ url('akun/5') }} " class="dropdown-item">Akun Hutang</a></li>
                    <li><a href="{{ url('akun/6') }} " class="dropdown-item">Kewajiban Jangka Panjang</a></li>
                    <li><a href="{{ url('akun/7') }} " class="dropdown-item">Ekuitas</a></li>
                    <li><a href="{{ url('akun/8') }} " class="dropdown-item">Pendapatan</a></li>
                    <li><a href="{{ url('akun/9') }} " class="dropdown-item">Beban Usaha</a></li>
                    <li><a href="{{ url('akun/10') }} " class="dropdown-item">Beban</a></li>
                  </ul>
            </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-1">
                    <thead class="text-center">                                 
                      <tr>
                          <th>
                            #
                          </th>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th>Kategori Akun</th>
                        </tr>
                      </thead>
                      <tbody class="text-center" >
                          @foreach ($akun as $akun)    
                          <tr>
                            <td class="text-center">
                              {{ $loop->iteration }}
                            </td>
                            <td>{{ $akun->kode_akun }} </td>
                            <td class="align-middle">
                              {{ $akun->nama_akun }}
                            </td>
                            <td>
                              {{ $akun->kategori_akun }} 
                              <div class="float-right">
                                <a href="javascript:void(0)" class="mx-3" id="deleteakun" data-id="{{ $akun->id }}" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                                <a href="javascript:void(0)" data-id="{{ $akun->id }}" data-toggle="tooltip" id="modal-edit"><i class="fas fa-edit"></i></a></div>
                            </td>
                            {{-- data-confirm="Realy?|Do you want to continue?" data-confirm-yes="" --}}
                            
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

    

      <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="akunform" name="akunForm" class="form-horizontal">
          {{ csrf_field() }}
            <div class="form-group">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="jenisform" id="jenisform" value="akun">
              <label>Kode Akun</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-fw fa-user-cog"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Kode Akun" name="kode_akun" id="kode_akun">
              </div>
            </div>
    
            <div class="form-group">
              <label>Nama Akun</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nama Akun" name="nama_akun" id="nama_akun">
              </div>
            </div>
    
            <div class="form-group">
              <label>Kategori Akun</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user-tag"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Kategori Akun" name="kategori_akun" id="kategori_akun">
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="saveBtn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>

@endsection