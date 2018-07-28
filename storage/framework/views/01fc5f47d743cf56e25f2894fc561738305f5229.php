<?php $__env->startSection('content'); ?>
<h3 class="well">Izmeni putovanje</h3>


  <form method="post" action="<?php echo e(action('PlaceController@update',$place->id)); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

  <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <label for="name" >Mesto</label>
    <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo e($place->name); ?>" />
   </div>
   <div class="form-group">
    <label for="name" >Opis</label>
    <textarea class="form-control" id="product-body" name="body" rows="8" cols="80"><?php echo e($place->body); ?></textarea>
   </div>

    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="cover" class="myfrm form-control" value="<?php echo e($place->cover_image); ?>"><br><br><br>


    </div>

    <button type="submit" class="btn btn-success" style="margin-top:10px">Unesi izmene</button>
    <br><br>


</form>



 <?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>