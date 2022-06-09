<?php $__env->startComponent('mail::message'); ?>
# Password Reset
Welcome <?php echo e($data['data']->name); ?>

The body of your message.

<?php $__env->startComponent('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])]); ?>
Click Here to Reset Your Password
<?php echo $__env->renderComponent(); ?>
or<br/>
Copy This Link
<a href="<?php echo e(adminUrl('reset/password/'.$data['token'])); ?>"><?php echo e(adminUrl('reset/password/'.$data['token'])); ?></a>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
