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
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#FormInputModal">
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
