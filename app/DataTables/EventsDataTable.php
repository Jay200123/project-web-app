<?php

namespace App\DataTables;

use App\Models\Events;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)

        ->addColumn('action', function($row){
            return "<form action=". route('events.destroy', $row->event_id) ." method=\"POST\" >". csrf_field().
            '<input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>';
    
           })
           
        ->addColumn('Photo', function($events){
            $url = asset("$events->event_image");
            return '<img src="'.$url.'" alt="product.jpeg" height="80" width="80">';
        })

        ->rawColumns(['action', 'Photo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Events $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Events $model): QueryBuilder
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
                    ->setTableId('events-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('export'),
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
                  
            Column::make('event_id')->title('Event ID'),
            Column::make('title'),
            Column::make('date_placed'),
            Column::make('date_occured'),
            Column::make('Photo')->title('Event Image'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Events_' . date('YmdHis');
    }
}
