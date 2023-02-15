<?php

namespace App\DataTables;

use App\Models\Employee;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // return datatables()
        //     ->eloquent($query)
        //     ->addColumn('action', 'employee.action');

        return datatables()
            ->eloquent($query)
        //     ->addColumn('action', function($row){
        //     $btn = '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#artistModal"  data-id="'.$row->id.'"  > Edit</button>';
        //         return $btn;
        // });
            ->addColumn('action', function($row) {
                return "<a href=". route('employee.edit', $row->id). " class=\"btn btn-warning\">Edit</a> 
                <hr>
                <form action=". route('employee.destroy', $row->id). " method= \"POST\" >". csrf_field() .
                '<input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>';
        })
        ->addColumn('role', function (Employee $employee) {
            return $employee->user->role;
        })

        ->addColumn('image', function ($row) { $url=asset($row->img_path); 
            return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />'; })

        ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
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
                    ->setTableId('employee-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
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
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::make('id'),
            Column::make('employee_name'),
            Column::make('addressline'),
            Column::make('phone'),
            Column::make('role')->name('users.role'),
            Column::make('image'),
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
        return 'Employee_' . date('YmdHis');
    }
}
