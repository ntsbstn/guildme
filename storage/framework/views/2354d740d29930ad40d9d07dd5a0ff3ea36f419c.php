<h1>Hello</h1>
<p>Click click on the foloowing link to activate your account</p>
<p><a href="<?php echo e(env('APP_URL' )); ?>/activate/<?php echo e($user->id); ?>/<?php echo e($code); ?>"/><?php echo e(env('APP_URL' )); ?>/activate/<?php echo e($user->id); ?>/<?php echo e($code); ?></a></p>