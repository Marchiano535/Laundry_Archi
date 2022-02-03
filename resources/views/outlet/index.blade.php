{{-- @extends('template.header')
<!-- Main content -->
@section('content')
    
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Outlet</h3>
    </div>
    <div class="card-body">
        <section class="content">
            <div class="right_col" role="main">

                <div class="card-body">
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">
                    Tambah Outlet
                  </button>
                  <div>
                    @include('outlet/list-all')
                  </div>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@include('outlet/form')
 @push('script')
 <script>
  $(function(){
    console.log('xxxxxxx')
  $('#formInputModal').on('show.bs.modal', function(event){
           let button = $(event.relatedTarget)
           console.log(button+"a")
           let id = button.data('id')
           let nama = button.data('nama')
           let alamat = button.data('alamat')
           let tlp = button.data('tlp')
           let mode = button.data('mode')
           console.log(nama)
           let modal = $(this)
           console.log(mode)()
           if(mode == "edit"){
               modal.find('.modal-title').text('Edit Data outlet')
               modal.find('.modal-body #nama').val(nama)
               modal.find('.modal-body #alamat').val(alamat)
               modal.find('.modal-body #tlp').val(tlp)
               modal.find('.modal-footer #submit').text('Update')
               modal.find('.modal-body #method').html('{{ method_field('patch') }}')
               modal.find('.modal-body form').attr('action','outlet/'+id)
           }
           else{
               modal.find('.modal-title').text('Input Data outlet')
               modal.find('.modal-body #nama').val('')
               modal.find('.modal-body #alamat').val('')
               modal.find('.modal-body #tlp').val('')
               modal.find('.modal-body #method').html('')
               modal.find('.modal-footer #btn-submit').text('Submit')
           }
       })
     })

     $(function(){
       //data table
       $('#tbl-outlet').DataTable()

       //menghapus alert
       $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#sucess-alert").slideUp(500);
       });
       $('.delete-outlet').click(function(e){
         e.preventDefault()
         let data = $(this).closest('tr').find('rd:eq(1)').text()
         swal({
              tittle: "Apakah Kamu Yakin?",
              text: "Data "+data+" akan di hapus?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
         })
         .then((req)=> {
          if(req) $(e.target).closest('form').submit()
          else swal.close()
         })
       })
     })
</script>

 @endpush
  --}}
  @extends('template/header')
@section('content')
<div class="right_col" role="main">
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
    </div>
    </div>

<div class="card">
    <div class="card-header">
        <h3 class="card-tittle">Data Cabang</h3>
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
    @include('outlet/list-all')
</div>
<!--/card-->
@include('outlet/form')

@endsection

@push('script')
<script>

$(function() {
    //data tabel
    $('#tbl-outlet').DataTable()

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
            let nama = button.data('nama')
            let alamat = button.data('alamat')
            let tlp = button.data('tlp')
            let mode = button.data('mode')
            console.log(nama)
            let modal = $(this)
            if(mode == "edit"){
                modal.find('.modal-title').text('Edit Data outlet')
                modal.find('.modal-body #nama').val(nama)
                modal.find('.modal-body #alamat').val(alamat)
                modal.find('.modal-body #tlp').val(tlp)
                modal.find('.modal-footer #submit').text('Update')
                modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                modal.find('.modal-body form').attr('action','outlet/'+id)
            }
            else{
                modal.find('.modal-title').text('Input Data outlet')
                modal.find('.modal-body #nama').val('')
                modal.find('.modal-body #alamat').val('')
                modal.find('.modal-body #tlp').val('')
                modal.find('.modal-body #method').html('')
                modal.find('.modal-footer #btn-submit').text('Submit')
            }
        })

</script>
@endpush