<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forgot Password</div>

                <div class="panel-body">
                    <?php echo Form::open(['url'=>'forgot-password']); ?>

                        <div class="form-group">
                            <?php echo Form::label('email','Email: '); ?>

                            <?php echo Form::email('email', null, ['class' => 'form-control', 'required' =>'required']); ?>

                        </div>
                        
                        
                        <div class="form-group">
                            <?php echo Form::submit('Send code', ['class' => 'btn btn-primary pull-right']); ?>

                        </div>


                        <?php echo Form::close(); ?>

                </div>
            </div>
               
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>