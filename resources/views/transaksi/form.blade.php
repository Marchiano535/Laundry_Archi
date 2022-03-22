<div class="collapse" id="formLandry">

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


{{-- data paket --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" id="tambahPaketBtn" data-toggle="modal" data-target="#modalPaket">tambah Cucian
                    </button>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
                <table id="tblTransaksi" class="table table-strippted table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" style="text-align:center;font-style:italic">Belum ada data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end data paket --}}
    {{-- modal paket --}}
    <div class="modal fade" id="modalPaket2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-document">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Paket</h5>
                    <button type="button" class="close" id="tambahPaketBtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Cucian
                    </button>
                </div>
            </div>
            <div class="modal-body">
                {{-- <table id="tblPaket" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama paket</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $b)
                        <tr>
                         <td>{{ $j = (!isset($j)?1: ++$j) }}
                        <input type="hidden" class="idPaket" name="idPaket" value="{{ $b->id }}"></td>  
                        <td>{{  $b ->nama_paket }}</td>
                        <td>{{  $b->harga }}</td>
                        <td> <button class="pilihPaketBtn" type="button">Pilih</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    {{-- end modal paket --}}
  
  <!-- Modal -->
  <div class="modal fade" id="modalPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                          <table id="tblPaket" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama paket</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $b)
                        <tr>
                         <td>{{ $j = (!isset($j)?1: ++$j) }}
                        <input type="hidden" class="idPaket" name="idPaket" value="{{ $b->id }}"></td>  
                        <td>{{  $b ->nama_paket }}</td>
                        <td>{{  $b->harga }}</td>
                        <td> <button class="pilihPaketBtn" type="button">Pilih</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    {{-- modal member --}}
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
                <button type="button" class="btn btn-sdefault" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>
{{-- @push('script')
<script>
    $(function(){
        function pilihMember(x){
            const tr = $(x).closest('tr')
            const namaJK = tr.find('td:eq(1)').text()+"/"+tr.find('td:eq(2)').text()
            const biodata = tr.find('td:eq(4)').text()+"/"+tr.find('td:eq(3)').text()
            const idMember = tr.find('.idMember').val()
            $('#nama-pelanggan').text(namaJK)
            console.log(namaJK)
            $('#biodata-pelanggan').text(biodata)
            console.log(biodata)
            $('#id_member').val(idMember)
                
        }
            
        

        
        //Function pilih paket
    function pilihPaket(x){
        console.log('namaPaket')
        const tr = $(x).closest('tr')
        const namaPaket = tr.find('td:eq(1)').text()
        const harga = tr.find('td:eq(2)').text()
        const idPaket = tr.find('.idPaket').val()


        let data = ''
        let tbody = $('#tblTransaksi tbody tr td').text()
            data += '<tr>'
            data += `<td> ${namaPaket}</td>`
            data += `<td> ${harga}</td>`;
            data += `<input type ="hidden" name="id_paket[]" value="${idPaket}">`
            data += `<td> <input type="number" value="1" min="1" class ="qty[]" size="2" style="width:40px"></td>`
            data += `<td> <label name="sub_total[]" class="subTotal">${harga}</label></td>`;
            data += `<td> <button type="button" class="btnRemovePaket"><span class="fas fa-times-circle"></span></buttton></td>`;
            data += '</tr>';

            if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

            $('#tblTransaksi tbody').append(data);

            subtotal += Number(harga)
            total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        

    }

        // pemilihan member
        $('#tblMember').on('click','.pilihMemberBtn', function(){
        pilihMember(this)
        $('#modalMember').modal('hide')
         })
//pilih paket
            $('#tblPaket').on('click','.pilihPaketBtn', function(){
                console.log('mmmn')
                pilihPaket(this)
                $('#modalPaket').modal('hide')
            })

    //
    })

</script>
  
@endpush --}}
