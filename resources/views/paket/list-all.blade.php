<table  id="tbl-paket" class="table">
    <tr>
        <td>No</td>
        <td>id_outlet</td>
        <td>jenis</td>
        <td>nama_paket</td>
        <td>Harga</td>
        <td>Action</td>
    </tr>
    <tbody>
        @foreach ($paket as $p)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $p->id_outlet }}</td>
                <td>{{ $p->jenis }}</td>
                <td>{{ $p->nama_paket }}</td>
                <td>{{ $p->harga }}</td>
                <td>
                    <button class="btn edit-produk" data-toggle="modal" data-target="#formInputModal"
                    data-mode="edit"
                    data-id="{{ $p->id }}"
                    data-id_outlet="{{ $p->id_outlet }}"
                    data-jenis="{{ $p->jenis }}"
                    data-nama_paket="{{ $p->nama_paket }}"
                    data-harga="{{ $p->harga }}"
                    >
                    <i class="fa fa-edit"></i>
                    </button>
                    <form method="POST" action="{{  route('paket.destroy', $p->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-produk" class="fa fa-trash" style="color:red">Delete</button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

