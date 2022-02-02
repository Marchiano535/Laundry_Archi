@extends('template.header')
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
           console.log(mode)
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
</script>

 @endpush