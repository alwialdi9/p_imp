<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Faktur</label>
    <div class="col-sm-12 col-md-7">
      <input type="text" class="form-control" placeholder="Masukkan Nomor Faktur" name="nomor_faktur" id="nomor_faktur" required="">
      <div class="valid-feedback">
          {{-- formvalidation --}}
          {{-- jika valid, tambahkan di input class is_valid --}}
          {{-- jika invalid, tambahkan di input class is_invalid --}}
        </div>
    </div>
  </div>

<div class="form-group row mb-4 floating-addon">
    <div class="input-group mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Invoice</label>
            <div class="input-group col-sm-12 col-md-7">
              <div class="input-group-prepend">
                <div class="input-group-text ml-3">
                  <i class="far far-fw fa-calendar-alt"></i>
                </div>
              </div>
              <input type="text" id="tanggal_invoice" name="tanggal_invoice" class="form-control datepicker" placeholder="Search..." autocomplete="off">
            </div>
      </div>
  {{-- <div class="col-sm-10 col-md-7">
    
  </div> --}}
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pelanggan</label>
    <div class="col-sm-12 col-md-7">
      <select class="form-control select2" id="pelanggan" name="pelanggan">
        <option value="masuk">Kementrian Agama RI</option>
        <option value="keluar">Direktorat Jenderal Pendidikan Islam</option>
      </select>
    </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
    <div class="col-sm-12 col-md-7">
      <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" id="alamat" required="">
      <div class="valid-feedback">
          {{-- formvalidation --}}
          {{-- jika valid, tambahkan di input class is_valid --}}
          {{-- jika invalid, tambahkan di input class is_invalid --}}
        </div>
    </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telepon</label>
    <div class="col-sm-12 col-md-7">
        <div class="input-group only-numbers">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <input type="text" class="form-control phone-number" name="telepon" id="telepon" placeholder="Masukkan telepon">
          </div>
    </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Faximile</label>
    <div class="col-sm-12 col-md-7">
        <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <input type="text" class="form-control" name="faximile" id="faximile" placeholder="Masukkan faximile">
          </div>
    </div>
  </div>

  <div class="form-group row mb-4 floating-addon">
    <div class="input-group mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Jatuh Tempo</label>
            <div class="input-group col-sm-12 col-md-7">
              <div class="input-group-prepend">
                <div class="input-group-text ml-3">
                  <i class="far far-fw fa-calendar-alt"></i>
                </div>
              </div>
              <input type="text" id="jatuh_tempo" name="jatuh_tempo" class="form-control datepicker" placeholder="Search..." autocomplete="off">
            </div>
      </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cara Pembayaran</label>
    <div class="col-sm-12 col-md-7">
      <input type="text" class="form-control" placeholder="Masukkan Metode Pembayaran" name="metode_pembayaran" id="keterangan" required="">
      <div class="valid-feedback">
          {{-- formvalidation --}}
          {{-- jika valid, tambahkan di input class is_valid --}}
          {{-- jika invalid, tambahkan di input class is_invalid --}}
        </div>
    </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referensi Akun</label>
    <div class="col-sm-12 col-md-7">
      <select class="form-control select2" id="ref_akun" name="ref_akun" required>
        <option value="pembelian">5-50001 Pembelian</option>
        <option>Draft</option>
        <option>Pending</option>
      </select>
      <div class="valid-feedback">
        {{-- formvalidation --}}
        {{-- jika valid, tambahkan di input class is_valid --}}
        {{-- jika invalid, tambahkan di input class is_invalid --}}
      </div>
    </div>
  </div>

<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
  <div class="col-sm-12 col-md-7">
    <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan" required="">
    <div class="valid-feedback">
        {{-- formvalidation --}}
        {{-- jika valid, tambahkan di input class is_valid --}}
        {{-- jika invalid, tambahkan di input class is_invalid --}}
      </div>
  </div>
</div>


<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penerima</label>
    <div class="col-sm-12 col-md-7">
      <input type="text" class="form-control inputtags" placeholder="Masukkan Penerima" name="penerima">
    </div>
  </div>

  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Transaksi</label>
    <div class="col-sm-12 col-md-7">
        <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                Rp
              </div>
            </div>
      <input type="text" class="form-control currency" placeholder="Masukkan Total" name="nilai_transaksi">
    </div>
    </div>
  </div>

<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
  <div class="col-sm-12 col-md-7">
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ url('pattycash') }}" class="btn btn-danger mx-2">Batal</a>
  </div>
</div>
</div>