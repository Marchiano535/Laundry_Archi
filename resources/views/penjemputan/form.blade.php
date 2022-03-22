<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penjemputan</h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="clpse">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url(request()->segment(1)) }}/penjemputan">  
                 
                 @csrf
                 <input type="hidden" name="_method" value="POST">
                <div id="method"></div>
                <div class="card-body">
                        <div class="form-group">
                          <label for="id_member">Nama Pelanggan</label>
                          <select class="form-control col-sm-5" id="id_member" name="id_member">
                            @foreach ($member as $m)
                            <option value="{{ $m->id}}">{{ $m->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="petugas"> Petugas penjemput</label>
                            <input type="text" class="form-control col-sm-5" id="petugas" placeholder="Masukkan data" name="petugas">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control col-sm-5" id="status" name="status">
                                <option value="tercatat"> Tercatat</option>
                                <option value="penjemputan"> Penjemputan</option>
                                <option value="selesai"> Selesai</option>
                            </select>
                        </div>
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
              </div>
</form>
</div>
    </div>
</div>
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Penjemputan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('import-penjemputan') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="jenis">File Excel</label>
                <input type="file" name="file2" id="import">
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