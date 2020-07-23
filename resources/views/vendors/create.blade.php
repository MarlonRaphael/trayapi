@extends('layout.app')

@section('title', 'Cadastrar vendedor')

@section('pageTitle', 'Cadastro de vendedor')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">Cadastrar vendedor</h4>
        <p class="card-category">Preencha os dados para adicionar um novo vendedor</p>
      </div>
      <div class="card-body">
        <form action="{{ route('vendors.store') }}" method="post" novalidate autocomplete="off">
          @csrf
          <div class="row">
            <div class="col-12 mt-5">
              <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                <label class="bmd-label-floating" for="name">Nome *</label>
                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror">
                <small id="nameHelp" class="form-text text-muted">Informe o nome do vendedor</small>
                @error('name')
                <label id="name-error" class="error" for="name">{{ $message }}</label>
                @enderror
              </div>
            </div>
            <div class="col-12 mt-3">
              <div class="form-group bmd-form-group @error('email') has-danger @enderror">
                <label class="bmd-label-floating" for="email">Endereço de E-mail *</label>
                <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
                <small id="emailHelp" class="form-text text-muted">Informe o e-mail do vendedor.</small>
                @error('email')
                <label id="name-error" class="error" for="name">{{ $message }}</label>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success pull-right mt-5">Cadastrar</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
@endsection