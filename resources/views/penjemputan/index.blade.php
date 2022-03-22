@extends('template.header')
@section('content')
<div class="right_col" role="main">
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
    </div>
    </div>

<div class="card">
    <div class="card-header">
        <h3 class="card-tittle">Penjemputan laundry</h3>
    </div>
    <div class="card-body">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">Tambah data</button>

        <a href="{{ route('export-penjemputan') }}" class="btn btn-success">
        <i class="fa fa-file-excel"></i> Export
    </a>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
        <i class="fas fa-file-excel"></i> Import
    </button>
    <form>
        @csrf
        <div class="form-group row">
            <input type="search" class="form-control col-sm-2" name="search" id="search">
            <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
        </div>
    </form>
    </div>
    </div>
    <div style="margin-top:20px">
        <div style="margin-top:20px">
            @if (session('success'))
            <div class="alert alert-success" role="alert" id="success-alert">
                {{ session('success') }}
            <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>    
                    @endforeach
                </ul>
            </div>
                
            @endif    
        </div>
    </div>

    @include('penjemputan/list-all')
</div>
@include('penjemputan/form')
@endsection


@push('script')
<script>

$(function() {
    //data tabel
    $('#tbl-penjemputan').DataTable()

    //menghapus alert
    $("#succes-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#succes-alert").slideUp(500);
    });

    $("#error-alert").fadeTo(2000, 500).slideUp(500,function(){
        $("#succes-alert").slideUp(500);
    });
    
    //delete produk 
    $('.delete-Penjemputan').click(function(e){
        e.preventDefault()
        let data = $(this).closest('tr').find('td:eq(1)').text()
        let conf = confirm('Yakin gak sih produk ini akan di hapus?')
        if(conf)
        {
           $(e.target).closest('form').submit()
           
        }
    })
})

//edit
$('#formInputModal').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            console.log(button+"a")
            let id = button.data('id')
            let id_member = button.data('id_member')
            let nama = button.data('nama')
            let alamat = button.data('alamat')
            let tlp = button.data('tlp')
            let petugas = button.data('petugas')
            let status = button.data('status')
            let mode = button.data('mode')
            let modal = $(this)
            console.log(mode)
            if(mode == "edit"){
                modal.find('[name="_method"]').val('PUT');
                modal.find('.modal-title').text('Edit Data penjemputan')
                modal.find('.modal-body #id_member').val(id_member)
                modal.find('.modal-body #nama').val(nama)
                modal.find('.modal-body #alamat').val(alamat)
                modal.find('.modal-body #tlp').val(tlp)
                modal.find('.modal-body #petugas').val(petugas)
                modal.find('.modal-body #status').val(status)
                modal.find('.modal-footer #btn-submit').text('Update')
                modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                modal.find('.modal-body form').attr('action','penjemputan/'+id)
            }
            else{
                modal.find('[name="_method"]').val('POST');
                modal.find('.modal-title').text('Input Data Penjemputan')
                modal.find('.modal-body #id_member').val('')
                modal.find('.modal-body #nama').val('')
                modal.find('.modal-body #alamat').val('')
                modal.find('.modal-body #tlp').val('')
                modal.find('.modal-body #petugas').val('')
                modal.find('.modal-body #status').val('')
                modal.find('.modal-body #method').html('')
                modal.find('.modal-footer #btn-submit').text('Submit')
            }
        })

</script>
@endpush