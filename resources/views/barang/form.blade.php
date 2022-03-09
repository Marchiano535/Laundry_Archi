<!-- Modal -->
<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="barang">
        @csrf
        <div id="method"></div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_barang">nama_barang</label>
                <input type="text" class="form-control col-sm-3" id="nama_barang" placeholder="nama_barang" name="nama_barang">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="merk_barang">merk_barang</label>
                <input type="text" class="form-control col-sm-3" id="merk_barang" placeholder="merk_barang" name="merk_barang">
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="qty">qty</label>
                <input type="number" class="form-control col-sm-3" id="qty" placeholder="qty" name="qty">
        </div>
        <div class="card-body">    
            <div class="form-group">
                <label for="kondisi" class="row">kondisi:</label>
                <input type="radio"  id="kondisi1" value="layak_pakai" name="kondisi"> layak_pakai
                <input type="radio" id="kondisi2" value="rusak_ringan" name="kondisi"> rusak ringan
                <input type="radio" id="kondisi3" value="rusak_berat" name="kondisi">rusak berat
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="tanggal_pengadaan">tanggal_pengadaan</label>
                <input type="date" class="form-control col-sm-6" id="tanggal_pengadaan" placeholder="tanggal" name="tanggal_pengadaan">
            </div>
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