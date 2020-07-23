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
        <form action="{{ route('sales.store') }}" method="post" novalidate autocomplete="off">
          @csrf
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5">
              <div class="form-group bmd-form-group @error('price') has-danger @enderror">
                <label class="bmd-label-floating" for="price">Valor da venda *</label>
                <input name="price" id="price" type="text" class="form-control currency @error('price') is-invalid @enderror">
                <small id="priceHelp" class="form-text text-muted">Informe o valor da venda</small>
                @error('price')
                <label id="price-error" class="error" for="price">{{ $message }}</label>
                @enderror
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
              <div class="form-group bmd-form-group @error('user_id') has-danger @enderror">
                <label for="salesman">Selecione o vendedor</label>
                <select name="user_id" class="form-control selectpicker @error('user_id') is-invalid @enderror"
                        data-style="btn btn-link" id="salesman">
                  <option disabled selected>Selecione um vendedor...</option>
                  @forelse($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @empty
                    <option disabled>Nenhum vendedor cadastrado</option>
                  @endforelse
                </select>
                <small id="salesanHelp" class="form-text text-muted">Selecione o vendedor.</small>
                @error('user_id')
                <label id="salesman-error" class="error" for="salesman">{{ $message }}</label>
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