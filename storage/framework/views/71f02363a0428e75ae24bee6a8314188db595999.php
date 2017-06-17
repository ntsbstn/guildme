<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>Add an achievement</h1>
        <hr>

        <p>TODO:</p>
        <ul>
        <li>Add select box for level of Raid and Raid level</li>
        <li>Create the store in controller by checking the API</li>
        <li>Render the list below the form</li>
        </ul>
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
         <?php echo Form::label('api_id','Blizzard Achivement id: '); ?>

         <?php echo Form::text('api_id', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('raid_id','Realm: '); ?>

         <?php echo Form::select('raid_id',  $raids, array('class' => 'form-control')); ?>

       </div>
       <div class="form-group">
         <?php echo Form::submit('fetch info', ['class' => 'btn btn-primary form-control']); ?>

       </div>


       <?php echo Form::close(); ?>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>