<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use App\DataTables\SalesDataTable;
use App\Http\Requests\CreateSaleRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SaleController extends Controller
{
  /**
   * SaleController constructor.
   */
  public function __construct()
  {
    //
  }

  /**
   * @param SalesDataTable $dataTable
   * @return mixed
   */
  public function index(SalesDataTable $dataTable)
  {
    return $dataTable->render('sales.index');
  }

  /**
   * @return Application|Factory|View
   */
  public function create()
  {
    return view('sales.create', ['users' => User::all()->sortBy('name')]);
  }

  /**
   * @param CreateSaleRequest $request
   * @return Application|RedirectResponse|Redirector
   */
  public function store(CreateSaleRequest $request)
  {
    $validated = $request->validated();

    if ($validated) {

      if ($sale = Sale::create($validated)) {

        return redirect(route('sales.index'))
            ->with('success', 'Venda realizada com sucesso!');

      }

      return back()
          ->with('error', 'Erro ao tentar cadastrar a venda');

    }

    return back()
        ->with('error', 'Erro ao tentar cadastrar a venda');
  }
}
