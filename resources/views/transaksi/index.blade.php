
{{-- 
<div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> --}}
@extends('template.header')
@section('content')
{{-- Content header --}}
<section class="content-header">
    <div class="container-fluid"></div>
</section>
{{-- Main content --}}
<section  class="content">
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="nac-data" data-toggle="collapse" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="nav-form" data-toggle="collapse" href="#formLaundry" role="button" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus nav-icon"></i>&nbsp;&nbsp;Cucian Baruc</a>
    </li>
  </ul>
  <div class="card" style="border-top:0px">
    @include('transaksi.form')
    @include('transaksi.data')
  </div>
</section>
@endsection
@push('scripts')
    <script>
        //script untuk #data dan form transaksi
        $('#dataLaundry').collapse('show')
        
        $('#dataLaundry').on('show.bs.collapse', function(){
            $('#formLaundry').collapse('hide');
            $('nav-form').removeClass('acive');
            $('#nac-data').addClass('active');
        })

        $('#formLaundry').on('show.bs.collapse', function(){
            $('#dataLaundry').collapse('hide');
            $('nav-data').removeClass('acive');
            $('#nac-form').addClass('active');
        })

        //initialize
        $(function(){
          $('#tblMember').DataTable();
        })
        //end of initialize
    </script>
@endpush