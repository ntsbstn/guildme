<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Set your credentials</h1>
        <p>Since Blizzard keep your email secret when you're using the battle net button to register or login, we have to ask you additional details to make sure we are able to send you relevant information about your activity on Guild Finder.</p>
            <div class="panel panel-default">
                <div class="panel-heading">Set your credentials</div>

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
                    <?php echo Form::open(['url'=>'my/credentials']); ?>

                        <div class="form-group">
                            <?php echo Form::label('username','Username: '); ?>

                            <?php echo Form::text('username', $user->username, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('email','Email: '); ?>

                            <?php echo Form::email('email', $user->email, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password','Password: '); ?>

                            <?php echo Form::password('password', ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('password_confirmation','Password Confirmation: '); ?>

                            <?php echo Form::password('password_confirmation', ['class' => 'form-control','required' =>'required']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Update my account', ['class' => 'btn btn-primary pull-right']); ?>

                        </div>


                        <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>