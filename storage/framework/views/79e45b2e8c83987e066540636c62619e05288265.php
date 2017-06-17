<?php $__env->startSection('content'); ?>
<div class="col-lg-12 text-center m-b-20">
    <h1 class="section-heading">Hey <?php echo e($user->username); ?>!</h1>
    <h2 class="section-subheading text-muted">Give a refresh to your account below</h2>
</div>

<!-- Account Section -->
<section id="account-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your account
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
           
            <?php echo Form::model($user, ['route' => ['store-account', $user->id]]); ?>

            <div class="form-group form-group-default">
                <?php echo Form::label('username','User name: '); ?>

                <?php echo Form::text('username', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group form-group-default">
                    <?php echo Form::label('password','Current Password: '); ?>

                    <?php echo Form::password('password', ['class' => 'form-control','required' =>'required']); ?>

                </div>
            <div class="form-group form-group-default">
                    <?php echo Form::label('newPassword','New Password: '); ?>

                    <?php echo Form::password('newPassword', ['class' => 'form-control','required' =>'required']); ?>

                </div>
                <div class="form-group form-group-default">
                    <?php echo Form::label('newPassword_confirmation','New password Confirmation: '); ?>

                    <?php echo Form::password('newPassword_confirmation', ['class' => 'form-control','required' =>'required']); ?>

                </div>
            <div class="form-group">
                <?php echo Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']); ?>

            </div>

            <?php echo Form::close(); ?>

            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

<!-- Playstyle Section -->
<section id="activity-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your activities on Guild Finder
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">
            <?php echo Form::model($user, ['route' => ['store-preferences', $user->id]]); ?>


            <div class="form-group form-group-default">
                    <?php echo Form::label('status','Looking for a guild: '); ?>                    
                    <?php echo Form::hidden('status', '0'); ?>                
                    <?php echo Form::checkbox('status', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]); ?> 
            </div>
            
            <div class="form-group">
                <?php echo Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']); ?>

            </div>

            <?php echo Form::close(); ?>

            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

<!-- Playstyle Section -->
<section id="playstyle-form">
    <div class="row">
        <div class="col-sm-3 text-center">
            <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-mouse-pointer fa-stack-1x fa-inverse"></i>
            </span>
        </div><!-- /col-sm-3-->
        <div class="panel panel-default col-sm-6 ">
            <div class="panel-heading separator">
                <div class="panel-title">Your play style
                </div>
            </div>
            <div class="panel-body p-t-20 p-b-20">

             <?php echo Form::model($user, ['route' => ['store-gameplay', $user->id]]); ?>

            <div class="form-group form-group-default">
                    <?php echo Form::label('daysPerWeek','Days per week available: '); ?>

                    <div id="noUiSlider" class="bg-master m-b-50"></div>
                    <div id="pips-positions"></div>
                    <?php echo Form::hidden('daysPerWeek', null, ['class' => 'form-control']); ?>                
            </div>
            <div class="row">
            <div class="col-sm-3">
                <div class="form-group form-group-default  text-center">
                    <?php echo Form::label('interest_fun','Fun: '); ?>

                     <?php echo Form::hidden('interest_fun', '0'); ?>                
                    <?php echo Form::checkbox('interest_fun', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]); ?> 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    <?php echo Form::label('interest_rp','RP: '); ?>

                   <?php echo Form::hidden('interest_rp', '0'); ?>                
                    <?php echo Form::checkbox('interest_rp', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]); ?> 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    <?php echo Form::label('interest_pvp','PVP: '); ?>

                    <?php echo Form::hidden('interest_pvp', '0'); ?> 
                    <?php echo Form::checkbox('interest_pvp', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]); ?> 
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group form-group-default text-center">
                    <?php echo Form::label('interest_pve','PVE High level: '); ?>

                    <?php echo Form::hidden('interest_pve', '0'); ?> 
                    <?php echo Form::checkbox('interest_pve', '1', null ,['class' => 'switchery', 'data-init-plugin' => "switchery"]); ?> 
                </div>
            </div>
            </div>
            <div class="form-group form-group-default">
                <?php echo Form::label('about','Describe the type of player you are: '); ?>

                <?php echo Form::textarea('about', null, ['class' => 'form-control', 'size' => '30x5']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::submit('Update my user account', ['class' => 'btn btn-primary pull-right']); ?>

            </div>

            <?php echo Form::close(); ?>

            </div>
        </div><!-- /col-sm-6 -->
    </div><!-- /row -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>