<?php

namespace App\DataTables;

use App\Models\LogBook;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $logs = LogBook::with(['student']);
        return datatables()
        ->eloquent($logs)

        ->addColumn('action', function($row){
            return "<form action=". route('log.delete', $row->log_id) ." method=\"POST\" >". csrf_field().
            '<input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>';
    
           })

           ->addColumn('fname', function(LogBook $logs){
            return $logs->student->fname;
           })

           ->addColumn('lname', function(LogBook $logs){
            return $logs->student->lname;
           })

           ->rawColumns(['fname','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LogBook $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LogBook $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('log-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        Button::make('export'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('log_id')->title('Log ID'),
            Column::make('fname')->name('student.fname')->title('Officer Name'),
            Column::make('lname')->name('student.lname')->title('Last Name'),
            Column::make('position')->title('Position'),
            Column::make('log_date')->title('Log Date'),
            Column::make('timeIn')->title('Time IN'),
            Column::make('timeOut')->title('Time Out'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Log_' . date('YmdHis');
    }
}
