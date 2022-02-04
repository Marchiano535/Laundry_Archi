@extends('template/header')
@section('content')
<div class="right_col" role="main">
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
    </div>
    </div>

<div class="card">
    <div class="card-header">
        <h3 class="card-tittle">Data paket</h3>
    </div>
    <div class="card-body">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">Tambah data</button>
    </div>
    </div>
    <div style="margin-top:20px">
        @if (session('succes'))
        <div class="alert alert-succes" role="alert" id="succes-alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    @include('paket/list-all')
</div>
<!--/card-->
@include('paket/form')

@endsection


@push('script')
<script>

$(function() {
    //data tabel
    $('#tbl-paket').DataTable()

    //menghapus alert
    $("#succes-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#succes-alert").slideUp(500);
    });

    $("#error-alert").fadeTo(2000, 500).slideUp(500,function(){
        $("#succes-alert").slideUp(500);
    });
    
    //delete produk 
    $('.delete-Produk').click(function(e){
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
            let id_outlet = button.data('id_outlet')
            let jenis = button.data('jenis')
            let nama_paket = button.data('nama_paket')
            let harga = button.data('harga')
            let mode = button.data('mode')
            let modal = $(this)
            if(mode == "edit"){
                modal.find('.modal-title').text('Edit Data paket')
                modal.find('.modal-body #id_outlet').val(id_outlet)
                modal.find('.modal-body #jenis').val(jenis)
                modal.find('.modal-body #nama_paket').val(nama_paket)
                modal.find('.modal-body #harga').val(harga)
                modal.find('.modal-footer #submit').text('Update')
                modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                modal.find('.modal-body form').attr('action','paket/'+id)
            }
            else{
                modal.find('.modal-title').text('Input Data paket')
                modal.find('.modal-body #id_outlet').val('')    
                modal.find('.modal-body #jenis').val('')
                modal.find('.modal-body #nama_paket').val('')
                modal.find('.modal-body #harga').val('')
                modal.find('.modal-body #method').html('')
                modal.find('.modal-footer #btn-submit').text('Submit')
            }
        })

</script>
@endpush