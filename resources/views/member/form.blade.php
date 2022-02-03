<!-- Modal -->
<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="member">
        @csrf
        <div id="method"></div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control col-sm-3" id="nama" placeholder="Nama" name="nama">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control col-sm-3" id="alamat" placeholder="alamat" name="alamat">
        </div>
        </div>
        <div class="card-body">    
            <div class="form-group">
                <label for="jenis_kelamin" class="row">Jenis Kelamin :</label>
                <input type="radio"  id="jenis_kelamin1" value="L" name="jenis_kelamin"> L
                <input type="radio" id="jenis_kelamin2" value="P" name="jenis_kelamin"> P
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="tlp">telepon</label>
                <input type="text" class="form-control col-sm-3" id="tlp" placeholder="tlp" name="tlp">
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