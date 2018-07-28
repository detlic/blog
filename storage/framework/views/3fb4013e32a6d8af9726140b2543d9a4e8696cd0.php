<html lang="en">

<head>

  <title>Laravel 5.6 Multiple File Upload Example</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- References: https://github.com/fancyapps/fancyBox -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


</head>

<body>
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


<div class="container lst">



<?php if(count($errors) > 0): ?>

<div class="alert alert-danger">

    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>

    <ul>

      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <li><?php echo e($error); ?></li>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>

</div>

<?php endif; ?>



<?php if(session('success')): ?>

<div class="alert alert-success">

  <?php echo e(session('success')); ?>


</div>

<?php endif; ?>



<h3 class="well">Laravel 5.6 Multiple File Upload</h3>

<form method="post" action="<?php echo e(url('image_upload')); ?>" enctype="multipart/form-data">

  <?php echo e(csrf_field()); ?>




    <div class="input-group hdtuto control-group lst increment" >

      <input type="file" name="filenames[]" class="myfrm form-control" multiple>

    </div>

    <div class="clone hide">

      <div class="hdtuto control-group lst input-group" style="margin-top:10px">

        <input type="file" name="filenames[]" class="myfrm form-control">

        <div class="input-group-btn">

          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

        </div>

      </div>

    </div>



    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>



</form>

</div>
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
                   <form action="<?php echo e(url('file',$image->id)); ?>" method="POST">
                   <input type="hidden" name="_method" value="delete">
                   <?php echo csrf_field(); ?>

                   <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                 </form>
               </div> <!-- col-6 / end -->
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>


    </div> <!-- list-group / end -->
   </div> <!-- row / end -->

</body>

<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>
