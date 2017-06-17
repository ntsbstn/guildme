<?php $__env->startSection('content'); ?>
<h1>Admin page</h1>
<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <a href="<?php echo e(route('update-servers')); ?>">Update servers</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>