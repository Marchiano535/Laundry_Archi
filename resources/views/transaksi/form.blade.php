<div class="collapse" id="formLandry">
    <div class="card-body">
        <div class="card">
            <div class="card-body">...
            </div>
        </div>

        <div class="card">...
        </div>

        <div class="card">...
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body"> 
        <div class="row" class="col-12">
            <div class="form-group row col-6">
                <label for="staticEmail"  class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputPassowrd" class="col-4 col-form-label">Estimasi selesai</label>
                <div class="col-6 ml-auto">
                   <input type="date" class="form-control ml-auto" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" name="batas_waktu">
                </div>
            </div>
        </div>

        <div class="row" class="col-12">
            <div class="form-group row col-6">
                <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"> <i class="fas fa-plus"></i></button> Nama Pelanggan/JK</label>
                <label class="col-sm-6 col-form-label" id="nama-pelanggan" style="font-weight:normal">
                -
                </label>
            </div>
            <div class="form-group row col-6">
                <label for="" class="col-2 col-form-label">Biodata</label>
                <label class="col-8 ml-auto col-form-label" id="biodata-pelanggan" style="font-weight:normal">
                -
                </label>
            </div>
        </div>
    </div>
</div>

{{-- modal member --}}
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-tittle" id="myModalLabel">Pilih Pelanggan</h4>
            </div>
            <div class="modal-body">
                <table id='tblMember' class="table table-stripped table-compact">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $b)
                        <tr>
                            <td>{{ $i = (!isset($i)?1:++$i) }}
                                <input type="hidden" class="idMember" name="idMember" value="{{ $b->id }}"></td>
                            <td>{{ $b->nama }}</td>
                            <td>{{ $b->jenis_kelamin }}</td>
                            <td>{{ $b->tlp }}</td>
                            <td>{{ $b->alamat }}</td>
                            <td> <button class="pilihMemberBtn" type="button">Pilih</button></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn0default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>