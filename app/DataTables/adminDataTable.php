<?php

namespace App\DataTables;

use App\Admin;
use Yajra\DataTables\Services\DataTable;

class adminDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.adminData.btn.checkbox')
            ->addColumn('edit', 'admin.adminData.btn.edit')
            ->addColumn('delete', 'admin.adminData.btn.delete')
            ->rawColumns([
                'checkbox', 'edit' ,'delete'
            ]);
    }
    
    /**
     * Build DataTable language.
     *
    */
    public static function lang(){
        $langJson = [
            'sProcessing'     => trans('admin.sProcessing'),
            'sZeroRecords'    => trans('admin.sZeroRecords'),
            'sEmptyTable'     => trans('admin.sEmptyTable'),
            'sLengthMenu'     => trans('admin.sLengthMenu'),
            'sInfo'           => trans('admin.sInfo'),
            'sInfoEmpty'      => trans('admin.sInfoEmpty'),
            'sInfoFiltered'   => trans('admin.sInfoFiltered'),
            'sInfoPostFix'    => trans('admin.sInfoPostFix'),
            'sSearch'         => trans('admin.sSearch'),
            'sUrl'            => trans('admin.sUrl'),
            'sInfoThousands'  => trans('admin.sInfoThousands'),
            'sLoadingRecords' => trans('admin.sProcessing'),

            'oPaginate'       => [
                                    'sFirst'    => trans('admin.sFirst'),
                                    'sLast'     => trans('admin.sLast'),
                                    'sNext'     => trans('admin.sNext'),
                                    'sPrevious' => trans('admin.sPrevious'),
                                ],

            'oAria'           => [
                                    'sSortAscending'    => trans('admin.sSortAscending'),
                                    'sSortDescending'   => trans('admin.sSortDescending'),
                                ],
        ];

        return $langJson;
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->addAction(['width' => '80px'])
                    //->parameters($this->getBuilderParameters());
                    //passing any html tags as parameters to appear in our UI 
                    ->parameters([
                        'dom'        => 'Blfrtip',
                        
                        'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, trans('admin.allRecord')]],
                        
                        'buttons'    =>[
                            ['className' => 'btn btn-info', 'text' => '<i class="fa fa-plus"> ' . trans('admin.createAdmin') . '</i>',
                             'action' => 'function(){window.location.href = "'.\URL::current().'/create" ;}'],
                            ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"> ' . trans('admin.exCSV') . '</i>'],
                            ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"> ' . trans('admin.exExcel') . '</i>'],
                            ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                            ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                            ['className' => 'btn btn-danger delBtn', 'text' => '<i class="fa fa-trash"> ' . trans('admin.deleteAll') . '</i>'],
                        ],
                        
                        //add a search input field at the end of columns we select it by passing it's index
                        'initComplete' => "function(){
                            this.api().columns([1, 2, 3, 4, 5]).every(function(){
                                var column = this;
                                var input  = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty()).on('keyup', function(){
                                    column.search($(this).val(), false, false, true).draw();
                                }); 
                            });
                        }",
                        
                        'language' => self::lang()
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => 'checkbox', 'data' => 'checkbox', 'title' => '<input type="checkbox" class="checkall" onclick="checkAll()"/>',
             'exportable' => false,
             'orderable'  => false,
             'searchable' => false,
             'printable'  => false],
            ['name' => 'id', 'data' => 'id', 'title' => trans('admin.adminId')],
            ['name' => 'name', 'data' => 'name', 'title' => trans('admin.adminName')],
            ['name' => 'email', 'data' => 'email', 'title' => trans('admin.adminEmail')],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('admin.createdAt')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('admin.updatedAt')],
            ['name' => 'edit', 'data' => 'edit', 'title' => trans('admin.edit'),
             'exportable' => false,
             'orderable'  => false,
             'searchable' => false,
             'printable'  => false],
            ['name' => 'delete', 'data' => 'delete', 'title' => trans('admin.delete'),
             'exportable' => false,
             'orderable'  => false,
             'searchable' => false,
             'printable'  => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin_' . date('YmdHis');
    }
}
