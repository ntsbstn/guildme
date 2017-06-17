<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>Add a character to your profile</h1>
        <hr>
        <button class="refresh">refresh</button>
       <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li> <?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        
       <h2>My active characters</h2>
       <hr>
        <?php if(count($myCharacters) > 0): ?>
          <ul class="row" id="my-character-list">
          <?php $__currentLoopData = $myCharacters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myChar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
              <li class="col-xs-6 col-sm-4 col-md-2"><img src="https://render-eu.worldofwarcraft.com/character/<?php echo e($myChar['thumbnail']); ?>"><br><?php echo e($myChar['name']); ?></li>
              
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      <?php else: ?>
      <p>no character added yet</p>
      <?php endif; ?>

      <div id="character-list"></div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
$("button.refresh").click(function(e) {
  e.preventDefault();
  var idajax = 4;
  $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      url: '/my/characters/refresh', // This is the url we gave in the route
      data: {name:'name', value: 'value'}, // a JSON object to send back
       headers: {'X-CSRF-Token':'<?php echo e(csrf_token()); ?>'},
      success: function(characters){ // What to do if we succeed
          $("#character-list").html(characters);
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
         // console.log(JSON.stringify(jqXHR));
          console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>