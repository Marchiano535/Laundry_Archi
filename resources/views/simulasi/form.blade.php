<div class="card card-primary" name='form-card' >
    <div class="card-header">
        <h3 class="card-title">Form Data Buku</h3>
    </div>
    <form id="formBuku" >

    <div class="card-body col-sm-6">
              <div class="form-group">
                <label for="id">ID BUKU</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="ID BUKU">
              </div>

              <div class="form-group">
                <label for="jb">JUDUL BUKU</label>
                <input type="text" class="form-control" id="jb" name="jb" placeholder="JUDUL BUKU">
              </div>

              <div class="form-group">
                <label for="pengarang">PENGARANG</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="PENGARANG">
              </div>

              <div class="form-group">
                <label for="tahun_terbit">TANGGAL TERBIT</label>
                <select class="custom-select form-control-border" id="tahun_terbit" name="tahun_terbit">
                    @for ($i=date('Y'); $i>1900; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
              </div>

              <div class="form-group">
                <label for="hargabuku">HARGA BUKU</label>
                <input type="text" class="form-control" id="hargabuku" name="hargabuku" placeholder="HARGA BUKU">
              </div>

              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" min="1" value="1" class="form-control" id="qty" name='qty' placeholder="Quantity">
              </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="submit" class="btn btn-primary">Reset</button>

            </div>
          </form>
    </div>
</div>
<div class="card" name='data-card'>
    <div class="card-header">
        Data
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Rendering engine</th>
              <th>XTC</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>
</div>