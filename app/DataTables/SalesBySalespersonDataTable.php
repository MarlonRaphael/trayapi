<?php

namespace App\DataTables;

use App\Sale;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SalesBySalespersonDataTable extends DataTable
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
        })->editColumn('commission', function ($model) {
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
    return $model
        ->newQuery()
        ->select('sales.*')
        ->where('user_id', $this->user->id)
        ->with('user:id,name,email');
  }

  /**
   * Optional method if you want to use html builder.
   *
   * @return \Yajra\DataTables\Html\Builder
   */
  public function html()
  {
    return $this->builder()
        ->setTableId('salesbysalesperson-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(1)
        ->parameters([
            'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json'],
        ])
        ->buttons(
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
        Column::make('id', 'sales.id')->title('Cód. venda'),
        Column::make('user.name', 'user.name')->title('Vendedor'),
        Column::make('user.email', 'user.email')->title('E-mail'),
        Column::make('price', 'sales.price')->title('Valor da venda'),
        Column::make('commission', 'sales.commission')->title('Comissão'),
        Column::make('created_at', 'sale.created_at')->title('Data venda'),
    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename()
  {
    return 'SalesBySalesperson_' . date('YmdHis');
  }
}
