<?php $__env->startSection('content'); ?>
<div class="container">
<ul>
    <?php $__currentLoopData = $guilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($guild->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php echo e(dump($guilds)); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>