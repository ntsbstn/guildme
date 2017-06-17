<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset password</div>

                <div class="panel-body">
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
                            <?php echo Form::label('password','Password: '); ?>

                            <?php echo Form::password('password', ['class' => 'form-control','required' =>'required']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password_confirmation','Password Confirmation: '); ?>

                            <?php echo Form::password('password_confirmation', ['class' => 'form-control','required' =>'required']); ?>

                        </div>
                        
                        <div class="form-group">
                            <?php echo Form::submit('Update password', ['class' => 'btn btn-primary pull-right']); ?>

                        </div>


                        <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>