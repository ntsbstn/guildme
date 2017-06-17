<?php if(count($characters) > 0): ?>
    <h2>My 80+ characters</h2>
    <hr>
    <p>You can add those character on Guild Finder</p>
    <ul class="row" id="character-list">
    <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $char): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($char['level'] > '80'): ?>
        <li class="col-xs-6 col-sm-4 col-md-2"><img src="https://render-eu.worldofwarcraft.com/character/<?php echo e($char['thumbnail']); ?>"><br><?php echo e($char['name']); ?></li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>