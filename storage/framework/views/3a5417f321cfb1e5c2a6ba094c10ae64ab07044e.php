<?php $__env->startSection('content'); ?>

<div class="social-wrapper">
  <div class="social " data-pages="social">
    <div class="jumbotron" data-pages="parallax" data-social="cover">
    <div class="cover-photo">
      <img alt="Cover photo" src="<?php echo e(url('storage/images/characters')); ?>/<?php echo e($character->main); ?>"/>
    </div>
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
      <div class="inner">
      <div class="pull-bottom bottom-left m-b-40">
        <h1 class="text-white no-margin"><?php echo e($character->name); ?>,</h1>
        <h5 class="text-white no-margin">a <?php echo e($character->user->username); ?>'s character</h5>
      </div>
  </div>
</div>
</div>
<div id="charInfo">
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-3"><?php echo e($region->name); ?> <?php echo e($character->realm); ?></div>
      <div class="col-sm-3"><?php echo e($class->name); ?></div>
      <div class="col-sm-3"><?php echo e($race->name); ?></div>
      <div class="col-sm-3"><?php echo e($character->level); ?></div>
    </div>
  </div>
</div>
</div>
<div class="container">
<table class="table table-responsive">
   <thead>
        <tr>
            <th>Emerald Nightmare</th>
            <th>Trial of Valor</th>
            <th>The Nighthold</th>
            <th>The tomb of Sargeras</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        LFR <?php echo e($character->getKillStats('8026', 'lfrKills')); ?>

        NM <?php echo e($character->getKillStats('8026', 'normalKills')); ?>

        HM <?php echo e($character->getKillStats('8026', 'heroicKills')); ?>

        MM <?php echo e($character->getKillStats('8026', 'mythicKills')); ?>

        </td>
        <td>
        LFR <?php echo e($character->getKillStats('8440', 'lfrKills')); ?>

        NM <?php echo e($character->getKillStats('8440', 'normalKills')); ?>

        HM <?php echo e($character->getKillStats('8440', 'heroicKills')); ?>

        MM <?php echo e($character->getKillStats('8440', 'mythicKills')); ?>

        </td>

        <td>
        LFR <?php echo e($character->getKillStats('8025', 'lfrKills')); ?>

        NM <?php echo e($character->getKillStats('8025', 'normalKills')); ?>

        HM <?php echo e($character->getKillStats('8025', 'heroicKills')); ?>

        MM <?php echo e($character->getKillStats('8025', 'mythicKills')); ?>

        </td>
        <td>
        LFR <?php echo e($character->getKillStats('8026', 'lfrKills')); ?>

        NM <?php echo e($character->getKillStats('8026', 'normalKills')); ?>

        HM <?php echo e($character->getKillStats('8026', 'heroicKills')); ?>

        MM <?php echo e($character->getKillStats('8026', 'mythicKills')); ?>

        </td>
      </tr>
    </tbody>

</table>

<table class="table table-hover dataTable no-footer">
  <thead>
    <tr role="row">
      <td>Raid</td>
      <td>Boss</td>
      <td>LFR</td>
      <td>Normal</td>
      <td>Heroic</td>
      <td>Mythic</td>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $kills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr role="row">
      <td>Raid</td>
      <td><?php echo e($character->getBoss($kill->boss_id)->name); ?></td>
      <td><?php echo e($kill->lfrKills); ?></td>
      <td><?php echo e($kill->normalKills); ?></td>
      <td><?php echo e($kill->heroicKills); ?></td>
      <td><?php echo e($kill->mythicKills); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>