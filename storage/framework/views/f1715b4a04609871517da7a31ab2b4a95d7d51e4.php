<?php $__env->startSection('content'); ?>
<div class="container">

    <?php $__currentLoopData = $guilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-sm-3">
                <img src="http://placehold.it/200" alt="">
            </div>
            <div class="col-sm-9">
            </div>
                <h2><a href="<?php echo e(action('GuildsController@show', [$guild->id])); ?>"><?php echo e($guild->name); ?></a></h2>
                <p><?php echo e($guild->body); ?></p>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>