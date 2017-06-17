<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>List of all characters</h1>
        <hr>

        <table class="table table-responsive table-hover">
           <thead>
              <tr>
                <th>Picture</th>
                <th>Character name</th>
                <th>Realm</th>
                <th>Level</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
                <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><img class="card-img-top" src="<?php echo e(url('storage/images/characters')); ?>/<?php echo e($character->thumbnail); ?>" alt="Card image cap"></td>
                  <td><a href="<?php echo route('show-character', array($character->id)); ?>" class="btn btn-primary"><?php echo e($character->name); ?></a></td>
                  <td></td>
                  <td><?php echo e($character->level); ?></td>
                  <td><?php echo e($character->user->username); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
       <div class="card-deck">
       </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>