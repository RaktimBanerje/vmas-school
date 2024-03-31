<?php

namespace App\DataTables;

use App\Models\Stopage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StopagesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query)
    {
        $datatable = (new EloquentDataTable($query))
                ->addIndexColumn()
                ->setRowClass('text-dark');
                
        return $datatable;
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Stopage $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('stopages-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel', 'print', 'reset', 'reload'],
                    ]);
    }
    

    public function getActions($id)
    {
        $editUrl = route('stopages.edit', $id);
        $deleteUrl = route('stopages.destroy', $id);

        return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="' . $deleteUrl . '" style="display: inline-block;">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>';
    }


    /**
     * Get the dataTable columns definition.
     */
    public function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('fare'),
            Column::make('action')
                ->title('Action')
                ->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false)
                ->format(function ($value, $row) {
                    return $this->getActions($row->id);
                }),
        ];
    }
    

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Stopages_' . date('YmdHis');
    }
}
