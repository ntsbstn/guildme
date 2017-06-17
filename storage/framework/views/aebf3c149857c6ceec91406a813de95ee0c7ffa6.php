<?php $__env->startSection('content'); ?>
<div class="login-wrapper ">
 
<div class="bg-pic">
 
<img src="/img/guild-mount.jpg" data-src="img/guild-mount.jpg" data-src-retina="img/guild-mount.jpg" alt="" class="lazy">
 
 
<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
<h1 class="semi-bold text-white">
<?php echo e($environment); ?>

Guild Finder make it easy to find a guild that matches your gameplay</h1>
<p class="small">
images Displayed are solely for representation purposes only, All work copyright of respective
owner, otherwise © 2013-2014 REVOX.
</p>
</div>
 
</div>
 
 
<div class="login-container bg-white">
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <img src="/img/logo.png" alt="logo" data-src="/img/logo.png" data-src-retina="/img/logo_2x.png" width="78" height="22">
        <h2 class="p-t-35 text-primary ">Login and register with your <span class="semi-bold">battle.net</span> account.</h2>
        <div class="text-center">
            <a class="btn btn-primary m-t-10" type="submit" href="login/battlenet">Login with battle.net</a>
        </div>
        <div class="text-center">
            <a href="#" class="text-info small" data-toggle="modal" data-target="#modalSlideRight">why battle.net?</a>
        </div>
 
<div class="pull-bottom sm-pull-bottom">
<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
<div class="col-sm-3 col-md-2 no-padding">
<img alt="" class="m-t-5" data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" height="60" src="assets/img/demo/pages_icon.png" width="60">
</div>
<div class="col-sm-9 no-padding m-t-10">
<p>
<small>
Create a pages account. If you have a facebook account, log into it for this
process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
</small>
</p>
</div>
</div>
</div>
</div>
</div>
 
</div>
 
<div class="modal fade slide-right" id="modalSlideRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content-wrapper">
        <div class="modal-content table-block">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
            <div class="modal-body v-align-middle ">
                <h3 class="text-primary ">Why login with <span class="semi-bold">Battle.net</span>, instead of a normal account</h3>
                <br>
                <p>
                We aim to provide you with the right guild, the one that fit your gameplay. We also want to provide the recuter with the most accurate data characters from the users. We've decided to allow only verified Battlenet account to register.</p>
                <p>Information that we're collecting from your account</p>
                <ul>
                    <li>Your account ID: <account-name>#1234</li>
                    <li>The list of your characters</li>
                </ul>
                <h3>That's pretty it, no confidential information are shared, not even your email address.</h3>
                <a type="button" class="btn btn-primary btn-block" href="login/battlenet">Login</a>
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>