<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin<?php echo e($id); ?>"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_admin<?php echo e($id); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
      </div>
      <?php echo Form::open(['route'=>['admin.destroy',$id],'method'=>'delete']); ?>

      <div class="modal-body">
        <h4><?php echo e(trans('admin.deleteThis',['name'=>$name])); ?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
        <?php echo Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']); ?>

      </div>
      <?php echo Form::close(); ?>

    </div>

  </div>
</div>
