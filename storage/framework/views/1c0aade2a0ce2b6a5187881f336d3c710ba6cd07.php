<?php $__env->startSection('content'); ?>

<h1>Putovanja</h1>
<?php if(count($places)>0): ?>
<?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
              <a class="thumbnail fancybox" rel="ligthbox" href="/files/<?php echo e($place->cover_image); ?>">
                  <img class="img-responsive" alt="" src="/files/<?php echo e($place->cover_image); ?>" />
                </a>
            </div>
            <div class="col-md-8 col-sm-8">
                <h3><a href="/places/<?php echo e($place->id); ?>"><?php echo e($place->name); ?></a></h3>
                <small>Written on <?php echo e($place->created_at); ?> by <?php echo e($place->user->name); ?></small>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($places->links()); ?>

<?php else: ?>
<p>No place found</p>
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