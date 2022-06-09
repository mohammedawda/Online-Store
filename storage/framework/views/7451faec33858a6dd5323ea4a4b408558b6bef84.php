<?php if(count($errors->all()) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($error); ?> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>  
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <h4><?php echo e(session('success')); ?></h4>
    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-danger">
        <h4><?php echo e(session('error')); ?></h4>
    </div>
<?php endif; ?>