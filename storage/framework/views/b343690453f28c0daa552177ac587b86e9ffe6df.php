<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo Form::open(['id' => 'form_data', 'url' => adminUrl('users/destroy/all'), 'method' => 'delete']); ?>

                <?php echo $dataTable->table(['class' => 'dataTable table table-striped table-hover table-bordered'], true); ?>

            <?php echo Form::close(); ?>

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
                    <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h4><?php echo e(trans('admin.pleaseCheckSomeRecords')); ?></h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4><?php echo e(trans('admin.askDeleteItme')); ?> <span class="record_count"></span> من السجلات ؟</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                        <input type="submit"  class="btn btn-danger delAll" value="<?php echo e(trans('admin.yes')); ?>" onsubmit="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- run js during loading the page(before run actual design) -->
    <?php $__env->startPush('js'); ?>
    <?php echo $dataTable->scripts(); ?>

    <script>deleteAll();</script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.indexadminData', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>