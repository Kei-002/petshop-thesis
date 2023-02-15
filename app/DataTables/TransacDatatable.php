<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use App\Models\Customer;
use App\Models\Groomservices;
use App\Models\Orderline;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;

class TransacDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $orders =  Order::with(['orderlines']);
        return datatables()
        ->eloquent($orders)
        ->addColumn('action', function($row) {
            return "<form action=". route('editpaid', $row->id). " method= \"POST\" >". csrf_field() .
            '<input name="_method" type="hidden" value="PUT">
            <button class="btn btn-warning" type="submit">Update</button>
            </form>';

        })
            ->addColumn('customer', function (Order $customer) {
                return $customer->customer->customer_name;
            })
            ->addColumn('services', function (Order $orders) {
                return $orders->orderlines->map(function($orderline) {
                    
                    // return str_limit($listener->listener_name, 30, '...');
                    foreach($orderline->groomservices as $groom) {
                        return "<li>". $groom->groom_name. "</li>";
                    }
                    
                })->implode('<br>');
            })

            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
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
                    ->setTableId('transactioninfo-table')
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
            Column::make('id'),
            Column::make('customer'),
            Column::make('services')->name('groomservices.groom_name')->title('services'),
            Column::make('status'),     
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
        return 'Transac_' . date('YmdHis');
    }
}
