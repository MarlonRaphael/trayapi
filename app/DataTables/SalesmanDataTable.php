<?php

namespace App\DataTables;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesmanDataTable extends DataTable
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
        ->addColumn('action', function ($model) {
          return view('vendors.actions', ['user' => $model]);
        });
  }

  /**
   * Get query source of dataTable.
   *
   * @param User $model
   * @return Builder
   */
  public function query(User $model)
  {
    return $model->newQuery();
  }

  /**
   * Optional method if you want to use html builder.
   *
   * @return \Yajra\DataTables\Html\Builder
   */
  public function html()
  {
    return $this->builder()
        ->setTableId('salesman-table')
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
        Column::make('id')->title('Cód'),
        Column::make('name')->title('Nome'),
        Column::make('email')->title('E-mail'),
        Column::make('created_at')->title('Criado em'),
        Column::make('updated_at')->title('Atualizado em'),
        Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('td-actions text-right')
            ->title('Ações'),
    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename()
  {
    return 'Salesman_' . date('YmdHis');
  }
}
