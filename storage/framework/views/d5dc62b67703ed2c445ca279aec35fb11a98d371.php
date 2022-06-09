<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo Form::open(['route' => ['admin.update', $adminData->id], 'method' => 'put']); ?>

            
            <div class="form-group">
                <?php echo Form::label('name', trans('admin.name')); ?>

                <?php echo Form::text('name', $adminData->name, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('email', trans('admin.email')); ?>

                <?php echo Form::email('email', $adminData->email, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('password', trans('admin.password')); ?>

                <?php echo Form::password('password', ['class' => 'form-control']); ?>

            </div>
            <?php echo Form::submit(trans('admin.save'), ['class' => 'btn btn-primary']); ?>

          <?php echo Form::close(); ?>

        </div>
        <!-- /.box-body -->
    </div>            
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.indexadminData', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>