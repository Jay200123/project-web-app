<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MemberDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        $members = Member::with(['student', 'stats']);
        return datatables()
        ->eloquent($members)

    // ->addColumn('action', function($row){   
    //     return "<a href=". route('members.edit', $row->info_id)." class=\"btn btn-warning\">Edit</a>".
    //     "<form action=". route('members.delete', $row->info_id) ." method=\"POST\" >". csrf_field().
    //     '<input name="_method" type="hidden" value="DELETE">
    //     <button class="btn btn-danger" type="submit">Delete</button>
    //     </form>';
    // })

    ->addColumn('fname', function(Member $members){
        return $members->student->fname;
    })

    ->addColumn('lname', function(Member $members){
        return $members->student->lname;
    })

    ->addColumn('section', function(Member $members){
        return $members->student->section;
    })

    ->addColumn('Amount', function(Member $members){
        return $members->stats->amount;
    })

    ->addColumn('datepaid', function(Member $members){
        return $members->stats->date_paid;
    })

    ->rawColumns([ 'fname', 'lname','section','email','amount','date_paid']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Member $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Member $model): QueryBuilder
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
                    ->setTableId('member-table')
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
            Column::make('info_id')->title('ID'),
            Column::make('fname')->name('student.fname')->title('Student Name'),
            Column::make('lname')->name('student.lname')->title('Last Name'),
            Column::make('section')->name('student.section')->title('Section'),
            Column::make('status')->title('Condition'),
            Column::make('Amount')->name('stats.amount')->title('Amount'),
            Column::make('date_placed')->title('Date Placed'),
            Column::make('datepaid')->name('stats.date_paid')->title('Date Paid'),
            // Column::computed('action')
                //   ->exportable(false)
                //   ->printable(false)
                //   ->width(60)
                //   ->addClass('text-center'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Member_' . date('YmdHis');
    }
}
