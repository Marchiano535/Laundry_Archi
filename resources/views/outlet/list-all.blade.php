<table  id="tbl-outlet" class="table">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Telepon</td>
        <td>Action</td>
    </tr>
    <tbody>
        @foreach ($outlet as $o)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $o->nama }}</td>
                <td>{{ $o->alamat }}</td>
                <td>{{ $o->tlp }}</td>
                <td>
                    <button class="btn edit-produk" data-toggle="modal" data-target="#formInputModal"
                    data-mode="edit"
                    data-id="{{ $o->id }}"
                    data-nama="{{ $o->nama }}"
                    data-alamat="{{ $o->alamat }}"
                    data-tlp="{{ $o->tlp }}"
                    >
                    <i class="fa fa-edit"></i>
                    </button>
                    <form method="POST" action="{{  route('outlet.destroy', $o->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-produk" class="fa fa-trash" style="color:red">Delete</button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>