<?php $__env->startSection('content'); ?>
<!-- Services Section -->
<section id="services">
    <div class="container">
        <h1>Add Guild</h1>
        <hr>
        <div class="row">
        <div class="col-sm-6 col-md-offset-3">
        <?php echo Form::open(['url'=>'guilds']); ?>

       <div class="form-group">
         <?php echo Form::label('name','Name: '); ?>

         <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('realm','Realm: '); ?>

         <?php echo Form::text('realm', null, ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::label('area','Area: '); ?>

         <?php echo Form::select('area', array(
             'eu' => 'EU',
             'us' => 'US',
             'tw' => 'TW',
             'kr' => 'KR',
             'cn' => 'CN',
         ), ['class' => 'form-control']); ?>

       </div>
       <div class="form-group">
         <?php echo Form::submit('Add my guild', ['class' => 'btn btn-primary form-control']); ?>

       </div>


       <?php echo Form::close(); ?>

       </div></div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>