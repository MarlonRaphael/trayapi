@extends('layout.app')

@section('title', 'Vendededores')

@section('pageTitle', 'Listagem de vendedores')

@push('styles')
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title mt-0">Lista de vendedores</h4>
        <p class="card-category">Listagem de vendedores cadastrados</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          {!! $dataTable->table(['class' => 'table table-hover table-striped'], true) !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/export-tables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/page/datatables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
  {!! $dataTable->scripts() !!}
@endpush
