<table id="tbl-barang" class="table">
    <tr>
        <td>No</td>
        <td>nama_barang</td>
        <td>Merk_barang</td>
        <td>qty</td>
        <td>kondisi</td>
        <td>tanggal_pengadaan</td>
        <td>Action</td>
    </tr>
    <tbody>
        @foreach ($barang as $b)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->merk_barang }}</td>
                <td>{{ $b->qty }}</td>
                <td>{{ $b->kondisi }}</td>
                <td>{{ $b->tanggal_pengadaan }}</td>
                <td>
                    <button class="btn edit-produk" data-toggle="modal" data-target="#formInputModal"
                    data-mode="edit"
                    data-id="{{ $b->id }}"
                    data-nama_barang="{{ $b->nama_barang }}"
                    data-merk_barang="{{ $b->merk_barang }}"
                    data-qty="{{ $b->qty }}"
                    data-kondisi="{{ $b->kondisi }}"
                    data-tanggal_pengadaan="{{ $b->tanggal_pengadaan }}"

                    >
                    <i class="fa fa-edit"></i>
                    </button>
                    <form method="POST" action="{{  route('barang.destroy', $b->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-produk" class="fa fa-trash" style="color:red">Delete</button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>