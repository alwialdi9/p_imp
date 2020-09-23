@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laba / Rugi</h1>
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
                    <h4>Isi Form Laba / Rugi</h4>
                  </div>
                  
                  <form action="{{url('/labarugi')}}" method="post" class="wizard-content mt-2">
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

                            <div class="wizard-step" id="biaya_projek">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="wizard-step-label">
                                  Biaya Project
                                </div>
                              </div>

                            <div class="wizard-step" id="biaya_tetap">
                              <div class="wizard-step-icon">
                                <i class="fas fa-donate"></i>
                              </div>
                              <div class="wizard-step-label">
                                Biaya Tetap
                              </div>
                            </div>

                            <div class="wizard-step" id="biaya_administrasi">
                              <div class="wizard-step-icon">
                                <i class="fas fa-comment-dollar"></i>
                              </div>
                              <div class="wizard-step-label">
                                Biaya Administrasi
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
                                    <input type="text" id="bulan_transaksi" name="bulan_transaksi" class="form-control datepicker @error('bulan_transaksi') is-invalid @enderror" placeholder="Search..." autocomplete="off">
                                        @error('bulan_transaksi')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                                  </div>
                            </div>
                          </div>

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Penerimaan Jasa Projek</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control @error('jasa_projek') is-invalid @enderror" placeholder="Penerimaan Jasa Projek" name="jasa_projek" id="jasa_projek" autocomplete="off">
                                    @error('jasa_projek')
                                    <div class="invalid-feedback"> {{$message}}
                                    </div>
                                    @enderror
                              </div>
                          </div>

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Total Penerimaan</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('total_penerimaan') is-invalid @enderror" placeholder="Total Penerimaan" name="total_penerimaan" id="total_penerimaan" autocomplete="off">
                                    @error('total_penerimaan')
                                    <div class="invalid-feedback"> {{$message}}
                                    </div>
                                    @enderror
                              </div>
                          </div>
                            </div>

                        {{-- tentang biaya projek --}}
                        <div class="biaya_projek">
            
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Server</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('svr') is-invalid @enderror" placeholder="Server" name="svr" id="svr" autocomplete="off">
                                        @error('svr')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror 
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Transportasi</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('transportasi') is-invalid @enderror" placeholder="Transportasi" name="transportasi" id="transportasi" autocomplete="off">
                                        @error('transportasi')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Laporan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('laporan') is-invalid @enderror" placeholder="Laporan" name="laporan" id="laporan" autocomplete="off">
                                        @error('laporan')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Lain-lain</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('lain_lain_biayaprojek') is-invalid @enderror" placeholder="Lainnya" name="lain_lain_biayaprojek" id="lain_lain_biayaprojek" autocomplete="off">
                                        @error('lain_lain_biayaprojek')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Total Biaya Projek</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('total_biaya_projek') is-invalid @enderror" placeholder="Total Biaya Projek" name="total_biaya_projek" id="total_biaya_projek" autocomplete="off">
                                          @error('total_biaya_projek')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                        </div>

                        {{-- biaya tetap --}}
                        <div class="biaya_tetap">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Gaji Direktur</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('gaji_direktur') is-invalid @enderror" placeholder="gaji_direktur" name="gaji_direktur" id="gaji_direktur" autocomplete="off">
                                          @error('gaji_direktur')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Gaji Staff</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('gaji_staf') is-invalid @enderror" placeholder="Gaji Staff" name="gaji_staf" id="gaji_staf" autocomplete="off">
                                          @error('gaji_staf')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Biaya Penyusutan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('biaya_penyusutan_labarugi') is-invalid @enderror" placeholder="Biaya Penyusutan" name="biaya_penyusutan_labarugi" id="biaya_penyusutan_labarugi" autocomplete="off">
                                          @error('biaya_penyusutan_labarugi')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Total Biaya Tetap</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('total_biaya_tetap') is-invalid @enderror" placeholder="Total Biaya Tetap" name="total_biaya_tetap" id="total_biaya_tetap" autocomplete="off">
                                        @error('total_biaya_tetap')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                                  </div>
                              </div>

                        </div>

                        {{-- biaya administrasi --}}
                        <div class="biaya_administrasi">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Alat Tulis Kantor</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('atk') is-invalid @enderror" placeholder="Alat Tulis Kantor" name="atk" id="atk" autocomplete="off">
                                          @error('atk')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Listrik, Air, Telepon</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('listrik_air_telepon') is-invalid @enderror" placeholder="Masukkan Biaya" name="listrik_air_telepon" id="listrik_air_telepon" autocomplete="off">
                                            @error('listrik_air_telepon')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Internet</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('internet') is-invalid @enderror" placeholder="Internet" name="internet" id="internet" autocomplete="off">
                                            @error('internet')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Lain-lain</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('lain_lain_administrasi') is-invalid @enderror" placeholder="Lain-lain" name="lain_lain_administrasi" id="lain_lain_administrasi" autocomplete="off">
                                          @error('lain_lain_administrasi')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Total Biaya</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('total_biaya_administrasi') is-invalid @enderror" placeholder="Total Biaya" name="total_biaya_administrasi" id="total_biaya_administrasi" autocomplete="off">
                                            @error('total_biaya_administrasi')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror 
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Laba Sebelum Pajak</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('laba_sb_pajak') is-invalid @enderror" placeholder="" name="laba_sb_pajak" id="laba_sb_pajak" autocomplete="off">
                                            @error('laba_sb_pajak')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror 
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Pajak</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('pajak_adm') is-invalid @enderror" placeholder="" name="pajak_adm" id="pajak_adm" autocomplete="off">
                                            @error('pajak_adm')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Laba Bersih</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('laba_bersih_adm') is-invalid @enderror" placeholder="" name="laba_bersih_adm" id="laba_bersih_adm" autocomplete="off">
                                          @error('laba_bersih_adm')
                                          <div class="invalid-feedback"> {{$message}}
                                          </div>
                                          @enderror
                                  </div>
                              </div>

                        </div>

                          <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-lg-4 col-md-6 text-right">
                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-laba" id="back-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-laba" id="back-mid-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-laba" id="back-mid2-button"><i class="fas fa-arrow-left"></i> Back</a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-laba" id="next-button">Next <i class="fas fa-arrow-right"></i></a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-laba" id="next-mid-button">Next <i class="fas fa-arrow-right"></i></a>

                              <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-laba" id="next-mid2-button">Next <i class="fas fa-arrow-right"></i></a>

                              <button type="submit" class="btn btn-icon icon-right btn-primary btn-wizard-laba" id="save-button">Simpan <i class="fas fa-save"></i></button>
                            </div>
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