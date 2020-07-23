<?php

namespace App\Http\Controllers;

use App\DataTables\SalesBySalespersonDataTable;
use App\DataTables\SalesmanDataTable;
use App\Http\Requests\CreateSalesmanRequest;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SalesmanController extends Controller
{
  /**
   * SalesmanController constructor.
   */
  public function __construct()
  {
    //
  }

  /**
   * @param SalesmanDataTable $dataTable
   * @return mixed
   */
  public function index(SalesmanDataTable $dataTable)
  {
    return $dataTable->render('vendors.index');
  }

  /**
   * @return Application|Factory|View
   */
  public function create()
  {
    return view('vendors.create');
  }

  /**
   * @param CreateSalesmanRequest $request
   * @return Application|RedirectResponse|Redirector
   */
  public function store(CreateSalesmanRequest $request)
  {
    $validated = $request->validated();

    if ($validated) {

      if ($salesman = User::create($validated)) {
        return redirect(route('vendors.index'))
            ->with('success', "Vendedor {$salesman->name} cadastrado com sucesso");
      }

    }

    return redirect(route('vendors.index'))
        ->with('error', "Erro ao tentar cadastrar vendedor");

  }

  public function sales(User $user, SalesBySalespersonDataTable $dataTable)
  {
//    dd($user->sales()->get());

    return $dataTable
        ->with('user', $user)
        ->render('vendors.sales', ['user' => $user]);
  }
}
