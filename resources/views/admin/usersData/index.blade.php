@extends('admin.indexadminData')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['id' => 'form_data', 'url' => adminUrl('users/destroy/all'), 'method' => 'delete']) !!}
                {!! $dataTable->table(['class' => 'dataTable table table-striped table-hover table-bordered'], true) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    
    <!-- Trigger the modal with a button -->
                
    <!-- Modal -->
    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h4>{{ trans('admin.pleaseCheckSomeRecords') }}</h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4>{{ trans('admin.askDeleteItme') }} <span class="record_count"></span> من السجلات ؟</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <input type="submit"  class="btn btn-danger delAll" value="{{ trans('admin.yes') }}" onsubmit="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- run js during loading the page(before run actual design) -->
    @push('js')
    {!! $dataTable->scripts() !!}
    <script>deleteAll();</script>
    @endpush
@endsection