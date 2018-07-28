<?php $__env->startSection('content'); ?>
<a href="/places" class="btn btn-default">Nazad</a>
<h1><?php echo e($place->name); ?></h1>

  <div>
    <?php echo $place->body; ?>

</div>
<style type="text/css">
.gallery
{
    display: inline-block;
    margin-top: 20px;
}
.close-icon{
  border-radius: 50%;
    position: absolute;
    right: 5px;
    top: -10px;
    padding: 5px 8px;
}
.form-image-upload{
    background: #e8e8e8 none repeat scroll 0 0;
    padding: 15px;
}
</style>
<div class='list-group gallery'>

           <?php if($images->count()): ?>
               <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                   <a class="thumbnail fancybox" rel="ligthbox" href="/files/<?php echo e($image->image); ?>">
                       <img class="img-responsive" alt="" src="/files/<?php echo e($image->image); ?>" />
                       <div class='text-center'>
                           <small class='text-muted'><?php echo e($image->image); ?></small>
                       </div> <!-- text-center / end -->
                   </a>
                   <?php if(auth()->guard()->check()): ?>
                   <?php if(Auth::user()->id==$place->user_id): ?>
                   <form action="<?php echo e(action('PlaceController@destroy_image', $image->id)); ?>" method="POST">
                   <input type="hidden" name="_method" value="delete">
                   <?php echo csrf_field(); ?>

                   <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                 </form>
                 <?php endif; ?>
                 <?php endif; ?>
               </div> <!-- col-6 / end -->
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
           <?php if(auth()->guard()->check()): ?>
           <?php if(Auth::user()->id==$place->user_id): ?>
           <form method="post" action="<?php echo e(action('PlaceController@addimages',$place->id)); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">

               <input type="file" name="slike[]" class="myfrm form-control" multiple>

             </div>

             <button type="submit" class="btn btn-success" style="margin-top:10px">Dodaj slike</button>
         </form>


           <?php endif; ?>
           <?php endif; ?>


    </div> <!-- list-group / end -->
<hr>

  <small>Kreirano <?php echo e($place->created_at); ?></small>
  <hr>
  <?php if(auth()->guard()->check()): ?>
  <?php if(Auth::user()->id==$place->user_id): ?>
  <a href="/places/<?php echo e($place->id); ?>/edit" class="btn btn-default">Izmeni</a>
  <form method="post" class="pull-right" action="<?php echo e(action('PlaceController@destroy', $place->id)); ?>">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Obriši</button>
      <br><br><br>
     </form>

     <?php endif; ?>
     <?php endif; ?>
     <script type="text/javascript">
         $(document).ready(function(){
             $(".fancybox").fancybox({
                 openEffect: "none",
                 closeEffect: "none"
             });
         });
     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>