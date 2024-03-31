<?php

namespace App\DataTables;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VehiclesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'vehicles.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Vehicle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vehicles-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel', 'print', 'reset', 'reload'],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('identity_no')->title('ID'),
            Column::make('registration_no')->title('REG'),
            Column::make('engine_no')->title('Engine'),
            Column::make('insurance_valid_upto')->title('Insurance'),
            Column::make('tax_valid_upto')->title('Tax'),
            Column::make('fitness_valid_upto')->title('Fitness'),
            Column::make('pollution_valid_upto')->title('Polution'),
            Column::make('permit_valid_upto')->title('Permit'),
            Column::make('driver_name')->title('DRIVER Name'),
            Column::make('driver_phone')->title('Driver Ph.'),
            Column::make('helper_name')->title('Helper Name'),
            Column::make('helper_phone')->title('Helper Ph.'),
            Column::make('action')->title('Action')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Vehicles_' . date('YmdHis');
    }
}
