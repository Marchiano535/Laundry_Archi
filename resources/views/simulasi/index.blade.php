@extends('template.header')
@section('content')
<div class="card-body">
    <div class="card-header">
        <h3 class="card-tittle">Simulasi</h3>
    </div>
    <div class="card card-success" name='form-card' >
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
        <table id="tblBuku" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID BUKU</th>
              <th>Judul Buku</th>
              <th>Pengarang</th>
              <th>Tanggal Terbit</th>
              <th>Harga Buku</th>
              <th>Quantity</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>
</div>
@push('script')
<script>
//method
    function insert(){
        console.log('insert')
        const form = $('#formBuku').serializeArray()
        console.log(form)
        const dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
        let newData = {}
        form.forEach(function(item, index) { 
            let name = item['name']
            let value = (name === 'id' || 
                         name === 'qty' ||
                         name === 'harga' 
                         ? Number(item ['value']):item['value']) //ini adalah ternary operator
            newData[name] = value
        })
        console.log(newData)
    localStorage.setItem('dataBuku', JSON.stringify([...dataBuku, newData]))
    return newData

    } 
//after load
$(function(){
    //initialize
        // let dataBuku = localStorage.getItem('dataBuku')) || []
        // console.log(dataBuku)
        $('#tblBuku tbody').html(showData)

    //Events itu adalah pemicu dari perintah yang akan di panggil
    //yang di panggil itu bukan tombol nya tapi yang di ambil adalah komponennya
    $('#formBuku').on('submit', function(e){
        e.preventDefault();
        insert()
        $('#tblBuku tbody').html(showData())
    }) 

})

function showData(){
    let row =''
    const arr = JSON.parse(localStorage.getItem('dataBuku')) || []
    if(arr.length==0){
        return row = `<tr><td colspan="6">Belum ada data</td></tr>`
    }
    arr.forEach(function(item,index){
        row += `<tr>`
        row += `<td>${item['id']}</td>`
        row += `<td>${item['jb']}</td>`
        row += `<td>${item['pengarang']}</td>`
        row += `<td>${item['tt']}</td>`
        row += `<td>${item['harga']}</td>`
        row += `<td>${item['qty']}</td>`
        row += `</tr>`
        })
    return row 
}
</script>
@endpush
@endsection