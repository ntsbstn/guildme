<?php $__env->startSection('content'); ?>
<div class="container">
        <h1><?php echo e($guild->name); ?></h1>
        <p><?php echo e($guild->body); ?></p>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>