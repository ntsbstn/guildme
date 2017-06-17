<?php $__env->startSection('content'); ?>
<div class="container">


        <h1><?php echo e($guild->name); ?></h1>

</div>
<?php echo e(dump($guild)); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>