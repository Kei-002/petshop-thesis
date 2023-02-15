<?php

namespace App\DataTables;

use App\Models\Groomservices;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class GroomServicesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row) {
                return "<a href=". route('groomservices.edit', $row->id). " class=\"btn btn-warning\">Edit</a> 
                <hr>
                <form action=". route('groomservices.destroy', $row->id). " method= \"POST\" >". csrf_field() .
                '<input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>';
        })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GroomService $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Groomservices $model)
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
                    ->setTableId('pet-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('id'),
            Column::make('groom_name'),
            Column::make('price'),
            Column::make('description'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action')
            ->exportable(false)
            ->printable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'GroomServices_' . date('YmdHis');
    }
}
