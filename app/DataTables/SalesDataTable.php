<?php

namespace App\DataTables;

use App\Sale;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesDataTable extends DataTable
{
  /**
   * Build DataTable class.
   *
   * @param mixed $query Results from query() method.
   * @return DataTableAbstract
   */
  public function dataTable($query)
  {
    return datatables()
        ->eloquent($query)
        ->editColumn('price', function ($model) {
          return Money::BRL($model->price);
        })
        ->editColumn('commission', function ($model) {
          return Money::BRL($model->commission);
        });
  }

  /**
   * Get query source of dataTable.
   *
   * @param Sale $model
   * @return Builder
   */
  public function query(Sale $model)
  {
    return $model->newQuery()
        ->select('sales.*')
        ->with('user:id,name,email')
        ->latest();
  }

  /**
   * Optional method if you want to use html builder.
   *
   * @return \Yajra\DataTables\Html\Builder
   */
  public function html()
  {
    return $this->builder()
        ->setTableId('sales-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(1)
        ->parameters([
            'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json'],
        ])
        ->buttons(
            Button::make('create')->text('<i class="fa fa-plus mr-2"></i> Adicionar'),
            Button::make('print')->text('<i class="fa fa-print mr-2"></i> Imprimir'),
            Button::make('reset')->text('<i class="fa fa-undo mr-2"></i> Redefinir'),
            Button::make('reload')->text('<i class="fa fa-refresh mr-2"></i> Recarregar')
        );
  }

  /**
   * Get columns.
   *
   * @return array
   */
  protected function getColumns()
  {
    return [
        Column::make('id', 'id')->title('Cód'),
        Column::make('user.name', 'user.name')->title('Vendedor'),
        Column::make('user.email', 'user.email')->title('E-mail'),
        Column::make('commission', 'commission')->title('Comissão'),
        Column::make('price', 'price')->title('Valor'),
        Column::make('created_at')->title('Criado em'),
    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename()
  {
    return 'Sales_' . date('YmdHis');
  }
}
