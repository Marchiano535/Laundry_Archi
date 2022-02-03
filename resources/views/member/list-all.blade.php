<table  id="tbl-member" class="table">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>jenis_kelamin</td>
        <td>Telepon</td>
        <td>Action</td>
    </tr>
    <tbody>
        @foreach ($member as $m)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->tlp }}</td>
                <td>
                    <button class="btn edit-produk" data-toggle="modal" data-target="#formInputModal"
                    data-mode="edit"
                    data-id="{{ $m->id }}"
                    data-nama="{{ $m->nama }}"
                    data-alamat="{{ $m->alamat }}"
                    data-jenis_kelamin="{{ $m->jenis_kelamin }}"
                    data-tlp="{{ $m->tlp }}"
                    >
                    <i class="fa fa-edit"></i>
                    </button>
                    <form method="POST" action="{{  route('member.destroy', $m->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-produk" class="fa fa-trash" style="color:red">Delete</button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

