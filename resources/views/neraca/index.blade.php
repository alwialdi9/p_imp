@extends('templates.header')
@extends('templates.sidebar')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Neraca</h1>
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
                    <h4>Isi Form Neraca</h4>
                  </div>
                  
                  <form action="{{url('/neraca')}}" method="post" class="wizard-content mt-2">
                    @csrf
                  <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-8 offset-lg-2">
                          <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active" id="aktivalancar">
                              <div class="wizard-step-icon">
                                <i class="fas fa-vote-yea"></i>
                              </div>
                              <div class="wizard-step-label">
                                Aktiva Lancar
                              </div>
                            </div>

                            <div class="wizard-step" id="aktivatetap">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="wizard-step-label">
                                  Aktiva Tetap
                                </div>
                              </div>

                            <div class="wizard-step" id="kewajibanlancar">
                              <div class="wizard-step-icon">
                                <i class="fas fa-donate"></i>
                              </div>
                              <div class="wizard-step-label">
                                Kewajiban Lancar
                              </div>
                            </div>

                            <div class="wizard-step" id="kewajiban_jangkapanjang">
                              <div class="wizard-step-icon">
                                <i class="fas fa-comment-dollar"></i>
                              </div>
                              <div class="wizard-step-label">
                                Kewajiban Jangka Panjang & Modal
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                        <div class="wizard-pane">
                            <div class="aktivalancar">
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
                            <label class="col-md-4 text-md-right text-left">Kas</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('kas') is-invalid @enderror" placeholder="Kas" name="kas" id="kas" autocomplete="off">
                                      @error('kas')
                                      <div class="invalid-feedback"> {{$message}}
                                      </div>
                                      @enderror
                              </div>
                          </div>

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Piutang</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('piutang') is-invalid @enderror" placeholder="Piutang" name="piutang" id="piutang" autocomplete="off">
                                        @error('piutang')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                              </div>
                          </div>
                          
                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Persediaan</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('persediaan') is-invalid @enderror" placeholder="Persediaan" name="persediaan" id="persediaan" autocomplete="off">
                                        @error('persediaan')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror 
                              </div>
                          </div>
                          
                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Jumlah Aktiva Lancar</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control currency @error('jumlah_aktiva_lancar') is-invalid @enderror" placeholder="Jumlah Aktiva Lancar" name="jumlah_aktiva_lancar" id="jumlah_aktiva_lancar" autocomplete="off">
                                        @error('jumlah_aktiva_lancar')
                                        <div class="invalid-feedback"> {{$message}}
                                        </div>
                                        @enderror
                              </div>
                          </div>
                            </div>

                        {{-- Aktiva Tetap --}}
                        <div class="aktivatetap">
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Tanah</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('tanah') is-invalid @enderror" placeholder="Tanah" name="tanah" id="tanah" autocomplete="off">
                                            @error('tanah')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Bangunan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('bangunan') is-invalid @enderror" placeholder="Bangunan" name="bangunan" id="bangunan" autocomplete="off">
                                            @error('bangunan')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Peralatan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('peralatan') is-invalid @enderror" placeholder="Peralatan" name="peralatan" id="peralatan" autocomplete="off">
                                            @error('peralatan')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror 
                                 </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Kendaraan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('kendaraan') is-invalid @enderror" placeholder="Kendaraan" name="kendaraan" id="kendaraan" autocomplete="off">
                                            @error('kendaraan')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Aktiva Tetap</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_aktiva_tetap') is-invalid @enderror" placeholder="Jumlah Aktiva Tetap" name="jumlah_aktiva_tetap" id="jumlah_aktiva_tetap" autocomplete="off">
                                            @error('jumlah_aktiva_tetap')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>
                             
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Aktiva</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_aktiva') is-invalid @enderror" placeholder="Jumlah Aktiva" name="jumlah_aktiva" id="jumlah_aktiva" autocomplete="off">
                                            @error('jumlah_aktiva')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>
                        </div>

                        {{-- Kewajiban lancar --}}
                        <div class="kewajibanlancar">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Hutang Usaha</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('hutang_usaha') is-invalid @enderror" placeholder="Hutang Usaha" name="hutang_usaha" id="hutang_usaha" autocomplete="off">
                                            @error('hutang_usaha')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Hutang Jatuh Tempo</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('hutang_jatuhtempo') is-invalid @enderror" placeholder="Hutang Jatuh Tempo" name="hutang_jatuhtempo" id="hutang_jatuhtempo" autocomplete="off">
                                            @error('hutang_jatuhtempo')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Uang Muka Proyek</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('uang_muka_proyek') is-invalid @enderror" placeholder="Uang Muka Proyek" name="uang_muka_proyek" id="uang_muka_proyek" autocomplete="off">
                                            @error('uang_muka_proyek')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Kewajiban Lancar</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_kewajiban_lancar') is-invalid @enderror" placeholder="Jumlah Kewajiban Lancar" name="jumlah_kewajiban_lancar" id="jumlah_kewajiban_lancar" autocomplete="off">
                                            @error('jumlah_kewajiban_lancar')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                        </div>

                        {{-- Kewajiban Jangka Panjang & Modal--}}
                        <div class="kewajiban_jangkapanjang">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Hutang Bank</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('hutang_bank') is-invalid @enderror" placeholder="Hutang Bank" name="hutang_bank" id="hutang_bank" autocomplete="off">
                                            @error('hutang_bank')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Hutang Lainnya</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('hutang_lainnya') is-invalid @enderror" placeholder="Hutang Lainnya" name="hutang_lainnya" id="hutang_lainnya" autocomplete="off">
                                            @error('hutang_lainnya')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Kewajiban Jangka Panjang</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_kewajiban_jangkapanjang') is-invalid @enderror" placeholder="Jumlah Kewajiban Jangka Panjang" name="jumlah_kewajiban_jangkapanjang" id="jumlah_kewajiban_jangkapanjang" autocomplete="off">
                                            @error('jumlah_kewajiban_jangkapanjang')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Modal Disetor</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('modal_disetor') is-invalid @enderror" placeholder="Modal Disetor" name="modal_disetor" id="modal_disetor" autocomplete="off">
                                            @error('modal_disetor')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Laba Ditahan</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('laba_ditahan') is-invalid @enderror" placeholder="Laba Ditahan" name="laba_ditahan" id="laba_ditahan" autocomplete="off">
                                            @error('laba_ditahan')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>

                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Modal</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_modal') is-invalid @enderror" placeholder="Jumlah Modal" name="jumlah_modal" id="jumlah_modal" autocomplete="off">
                                            @error('jumlah_modal')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>
                              
                              <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Jumlah Passiva</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control currency @error('jumlah_passiva') is-invalid @enderror" placeholder="Jumlah Passiva" name="jumlah_passiva" id="jumlah_passiva" autocomplete="off">
                                            @error('jumlah_passiva')
                                            <div class="invalid-feedback"> {{$message}}
                                            </div>
                                            @enderror
                                  </div>
                              </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-neraca" id="back-button"><i class="fas fa-arrow-left"></i> Back</a>

                            <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-neraca" id="back-mid-button"><i class="fas fa-arrow-left"></i> Back</a>

                            <a href="#" class="btn btn-icon icon-left mx-3 btn-info btn-wizard-neraca" id="back-mid2-button"><i class="fas fa-arrow-left"></i> Back</a>

                            <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-neraca" id="next-button">Next <i class="fas fa-arrow-right"></i></a>

                            <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-neraca" id="next-mid-button">Next <i class="fas fa-arrow-right"></i></a>

                            <a href="#" class="btn btn-icon icon-right btn-primary btn-wizard-neraca" id="next-mid2-button">Next <i class="fas fa-arrow-right"></i></a>

                            <button type="submit" class="btn btn-icon icon-right btn-primary btn-wizard-neraca" id="save-button">Simpan <i class="fas fa-save"></i></button>
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