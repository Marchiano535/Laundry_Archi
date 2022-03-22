{{-- Form --}}
<div class="card">
    <div class="card-body">
        <form id="formGajiKaryawan">
            <div class="row" class="col-12">
                <div class="form-group row col-6">
                    <label for="staticEmail" class="col-sm-4 col-form-label">ID Karyawan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control col-3" name="id_karyawan" required>
                    </div>
                </div>
                <div class="form-group row col-6">
                    <label for="inputPassword" class="col-6 col-form-label">Nama Karyawan</label>
                    <div class="col-6">
                        <input type="text" class="form-control ml-auto" name="nama_karyawan" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group row col-sm-6">
                    <label for="" class="col-sm-4 col-form-label">
                        Jenis Kelamin
                    </label>
                    <div class="form-check row col-sm-6" id="nama-pelanggan" style="padding-top: 7px; margin-left:10px">
                        <div class="form-check col-sm-6">
                            <input type="radio" class="form-check-input" value="L" name="jk" id="jk" required>
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check col-sm-6">
                            <input type="radio" class="form-check-input" value="P" name="jk" id="jk" required>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row col-6">
                    <label for="" class="col-6 col-form-label" style="margin-right: 15px">Status Menikah</label>
                    <select class="col-5 custom-select form-control-border" id="status" name="status">
                        <option value="couple">Couple</option>
                        <option value="single">Single</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group row col-6">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Anak</label>
                    <div class="col-sm-6">
                        <input type="number" value="0" min="0" class="qty" name="qty" id="qty" size="2"
                            style="width:40px; margin-top: 5px">
                    </div>
                </div>
                <div class="form-group row col-6">
                    <label for="tgl" class="col-sm-6 col-form-label">Mulai Bekerja</label>
                    <div class="col-sm-6" style="padding-right: 10px">
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5px">
                <div class="form-group col-6">
                    <label for="nama" class="col-form-label col-4"></label>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Input</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Pemisah --}}
<br>
{{-- End Pemisah --}}

<div tabindex="-1">
    <div>
        <div class="modal-content">
            <div class="modal-body">
                {{-- tombol sorting --}}
                <form>
                    @csrf
                </form>
                <table id="tblGajiKaryawan" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Status</th>
                            <th>Jml Anak</th>
                            <th>Mulai Bekerja</th>
                            <th>Gaji Awal</th>
                            <th>Tunjangan</th>
                            <th>Total Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9" align="center">Belum Ada Data !</td>
                        </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
