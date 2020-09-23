@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Rencana Arus Kas</h1>
          </div>
          @if (session('status'))
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
          @endif

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi Form Rencana Arus Kas</h4>
                  </div>
                  
                  <form action="{{url('/rencanaaruskas')}}" method="post" class="wizard-content mt-2">
                    @csrf
                  <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-8 offset-lg-2">
                          <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active" id="penerimaan">
                              <div class="wizard-step-icon">
                                <i class="fas fa-vote-yea"></i>
                              </div>
                              <div class="wizard-step-label">
                                Penerimaan
                              </div>
                            </div>

                            <div class="wizard-step" id="pengeluaran">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="wizard-step-label">
                                  Pengeluaran
                                </div>
                              </div>

                            <div class="wizard-step" id="pengeluaran_lain">
                              <div class="wizard-step-icon">
                                <i class="fas fa-donate"></i>
                              </div>
                              <div class="wizard-step-label">
                                Pengeluaran Lainnya
                              </div>
                            </div>

                            <div class="wizard-step" id="total_keseluruhan">
                              <div class="wizard-step-icon">
                                <i class="fas fa-comment-dollar"></i>
                              </div>
                              <div class="wizard-step-label">
                                Total Keseluruhan
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
  
                        <div class="wizard-pane">
                            <div class="penerimaan">
                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Bulan Transaksi</label>
                            <div class="col-lg-4 col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="far far-fw fa-calendar-alt"></i>
                                      </div>
                                    </div>
                                    <input type="text" id="bulan_transaksi_aruskas" name="bulan_transaksi_aruskas" class="form-control datepicker @error('bulan_transaksi_aruskas') is-invalid @enderror" placeholder="Search..." autocomplete="off">
                                            @error('bulan_transaksi_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                            </div>
                          </div>

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Penerimaan Jasa Projek</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control @error('jasa_projek_aruskas') is-invalid @enderror" placeholder="Penerimaan Jasa Projek" name="jasa_projek_aruskas" id="jasa_projek_aruskas" autocomplete="off">
                                      @error('jasa_projek_aruskas')
                                      <div class="invalid-feedback"> {{$message}}
                                      </div>
                                      @enderror
                              </div>
                          </div>

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Total Penerimaan</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('total_penerimaan_aruskas') is-invalid @enderror" placeholder="Total Penerimaan" name="total_penerimaan_aruskas" id="total_penerimaan_aruskas" autocomplete="off">
                                @error('total_penerimaan_aruskas')
                                <div class="invalid-feedback"> {{$message}}
                                </div>
                                @enderror
                              </div>
                            </div>
                          </div>

                        {{-- tentang pengeluaran --}}
                        <div class="pengeluaran">
            
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Server</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_server_aruskas') is-invalid @enderror" placeholder="Server" name="biaya_server_aruskas" id="biaya_server_aruskas" autocomplete="off">
                                          @error('biaya_server_aruskas')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Transportasi</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_transportasi_aruskas') is-invalid @enderror" placeholder="Transportasi" name="biaya_transportasi_aruskas" id="biaya_transportasi_aruskas" autocomplete="off">
                                            @error('biaya_transportasi_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Laporan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_laporan_aruskas') is-invalid @enderror" placeholder="Laporan" name="biaya_laporan_aruskas" id="biaya_laporan_aruskas" autocomplete="off">
                                            @error('biaya_laporan_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Gaji Direktur</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('gaji_direktur_aruskas') is-invalid @enderror" placeholder="gaji_direktur" name="gaji_direktur_aruskas" id="gaji_direktur_aruskas" autocomplete="off">
                                            @error('gaji_direktur_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Gaji Staff</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('gaji_staf_aruskas') is-invalid @enderror" placeholder="Gaji Staff" name="gaji_staf_aruskas" id="gaji_staf_aruskas" autocomplete="off">
                                            @error('gaji_staf_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                        </div>

                        {{-- pengeluaran --}}
                        <div class="pengeluaran_lainnya">
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Penyusutan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_penyusutan_aruskas') is-invalid @enderror" placeholder="Biaya Penyusutan" name="biaya_penyusutan_aruskas" id="biaya_penyusutan_aruskas" autocomplete="off">
                                            @error('biaya_penyusutan_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Administrasi</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_adm_aruskas') is-invalid @enderror" placeholder="Biaya Administrasi" name="biaya_adm_aruskas" id="biaya_adm_aruskas" autocomplete="off">
                                            @error('biaya_adm_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Bunga Bank</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('bunga_bank_aruskas') is-invalid @enderror" placeholder="Bunga Bank" name="bunga_bank_aruskas" id="bunga_bank_aruskas" autocomplete="off">
                                            @error('bunga_bank_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Pajak</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_pajak_aruskas') is-invalid @enderror" placeholder="Biaya Pajak" name="biaya_pajak_aruskas" id="biaya_pajak_aruskas" autocomplete="off">
                                            @error('biaya_pajak_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                                </div>
                              </div>

                        {{-- Total --}}
                        <div class="total_keseluruhan">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Total Pengeluaran</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('total_pengeluaran_aruskas') is-invalid @enderror" placeholder="Total Pengeluaran" name="total_pengeluaran_aruskas" id="total_pengeluaran_aruskas" autocomplete="off">
                                            @error('total_pengeluaran_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Total Biaya</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('total_biaya_aruskas') is-invalid @enderror" placeholder="Total Biaya" name="total_biaya_aruskas" id="total_biaya_aruskas" autocomplete="off">
                                            @error('total_biaya_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Laba Sebelum Pajak</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('laba_sblm_pajak_aruskas') is-invalid @enderror" placeholder="" name="laba_sblm_pajak_aruskas" id="laba_sblm_pajak_aruskas" autocomplete="off">
                                            @error('laba_sblm_pajak_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Pajak</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('pajak_aruskas') is-invalid @enderror" placeholder="" name="pajak_aruskas" id="pajak_aruskas" autocomplete="off">
                                            @error('pajak_aruskas')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-lg-4 col-md-6 text-right">
                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-kas" id="back-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-kas" id="back-mid-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-kas" id="back-mid2-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-kas" id="next-button">Next <i class="fas fa-arrow-right"></i></a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-kas" id="next-mid-button">Next <i class="fas fa-arrow-right"></i></a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-kas" id="next-mid2-button">Next <i class="fas fa-arrow-right"></i></a>
                              
                              <button type="submit" class="btn btn-icon icon-right btn-primary btn-wizard-kas" id="save-button">Simpan <i class="fas fa-save"></i></but>
                              {{-- @if ($message = Session::get('berhasil'))
                                <div class="alert alert-success alert-block">
                                  <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                                </div>
                                @endif
                            </div> --}}
                          </div>
                        </div>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection