<!-- Modal -->
<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Outlet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="paket">
        @csrf
        <div id="method"></div>
        <div class="form-group">
            <label for="id_outlet">ID OUTLET</label>
            <select class="form-control col-sm-5" id="id_outlet" name="id_outlet">
              @foreach ($outlet as $o)
              <option value="{{ $o->id }}">{{ $o->nama}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control col-sm-5" id="jenis" name="jenis">
                <option value="kiloan"> Kiloan</option>
                <option value="selimut"> Selimut</option>
                <option value="bed_cover"> Bed Cover</option>
                <option value="kaos"> Kaos</option>
                <option value="lain">Lainnya</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="nama_paket"> Nama Paket</label>
            <input type="text" class="form-control col-sm-10" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
        </div>


         <div class="form-group">
            <label for="harga"> Harga</label>
            <input type="number" class="form-control col-sm-10" id="harga" placeholder="Harga" name="harga">
        </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Input Data</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('import-paket') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="jenis">File Excel</label>
                <input type="file" name="import" id="import">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
          </div>
      </div>
    </div>
  </form>
</div>