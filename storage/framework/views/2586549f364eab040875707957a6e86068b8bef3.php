<h1>Hello</h1>
<p>Click on the following link to reset your password</p>
<p><a href="<?php echo e(env('APP_URL' )); ?>/reset/<?php echo e($user->id); ?>/<?php echo e($code); ?>"/><?php echo e(env('APP_URL' )); ?>/activate/<?php echo e($user->id); ?>/<?php echo e($code); ?></a></p>