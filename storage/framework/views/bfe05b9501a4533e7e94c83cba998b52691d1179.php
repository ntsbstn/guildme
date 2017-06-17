<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>Add a guild to your profile</h1>
        <hr>
       <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li> <?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
       <?php echo Form::open(); ?>

       <div class="form-group">
         <?php echo Form::label('name','Name: '); ?>

         <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

       </div>
      <div class="form-group">
         <?php echo Form::label('realm','Realm: '); ?>

         <?php echo Form::select('realm',  $realms, array('class' => 'form-control')); ?>

       </div>
       <div class="form-group">
         <?php echo Form::submit('Add a guild', ['class' => 'btn btn-primary form-control']); ?>

       </div>


       <?php echo Form::close(); ?>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>