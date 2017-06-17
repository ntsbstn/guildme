<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>Create a new recruitment</h1>
        <p>In order to facilitate the search results, we ask you to enter one recruitment per class</p>
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

        <?php $__currentLoopData = $user->guilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h2> <?php echo e($guild->name); ?></h2>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php echo Form::open(); ?>



       <div class="form-group">
         <?php echo Form::label('title','Title: '); ?>

         <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('body','Description: '); ?>

         <?php echo Form::textarea('body', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('guild_id','Guild: '); ?>

          <?php echo Form::select('guild_id', $guilds, array('class' => 'form-control')); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('number','How many to recuit: '); ?>

         <?php echo Form::text('number', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('realm','Realm: '); ?>

         <?php echo Form::select('realm',  $realms, array('class' => 'form-control')); ?>

       </div>
        <div class="form-group">
         <?php echo Form::label('class_id','Class: '); ?>

         <?php echo Form::text('class_id', null, ['class' => 'form-control']); ?>

       </div>
        <div class="form-group">
         <?php echo Form::label('classrole_id','Role: '); ?>

         <?php echo Form::text('classrole_id', null, ['class' => 'form-control']); ?>

       </div>
      
       <div class="form-group">
         <?php echo Form::submit('Add my character', ['class' => 'btn btn-primary form-control']); ?>

       </div>


       <?php echo Form::close(); ?>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>