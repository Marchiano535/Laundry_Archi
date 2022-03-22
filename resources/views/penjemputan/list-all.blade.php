<table id="tbl-penjemputan" class="table table-bordered table-hover">
    <thead class="table-primary">
       <tr>
           <th>ID</th>
           <th>Nama Pelanggan</th>
           <th>Alamat Pelanggan</th>
           <th>No. Hp Pelanggan</th>
           <th>Petugas Penjemputan</th>
           <th>Status</th>
           <th>Aksi</th>
       </tr>
   </thead>

    <tbody>
       @foreach ($penjemputan as $pj)
       <tr>
           <td>{{ $pj->id_member}}</td>
           <td>{{ $pj->member->nama}}</td>
           <td>{{ $pj->member->alamat}}</td>
           <td>{{ $pj->member->tlp}}</td>
           <td>{{ $pj->petugas }}</td>
           <td>{{ $pj->status }}</td>
           <td>

            <button class="btn edit-produk" data-toggle="modal" data-target="#formInputModal"
            data-mode="edit"
            data-id="{{ $pj->id }}"
            data-id_member="{{ $pj->id_member }}"
            data-nama="{{ $pj->nama}}"
            data-alamat="{{ $pj->alamat }}"
            data-tlp="{{ $pj->tlp }}"
            data-petugas="{{ $pj->petugas }}"
            data-status="{{ $pj->status }}"
            >
            <i class="btn btn-primary font-weight-bold text-xs border-5">Edit</i>
            </button>


               <!--delete data-->
               <form method="POST" action="{{ route('penjemputan.destroy', $pj->id) }}" style="display:inline" class="d-inline">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                   <button type="submit" class="btn-danger font-weight-bold text-xs border-5 btn delete-penjemputan" onclick="return confirm('Yakin ingin dihapus?')">
                       Hapus
                   </button>

               </form>
           </td>
       </tr>


   </tbody>
   @endforeach
</table