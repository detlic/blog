<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="panel-body">
                  <a href="/places/create" class="btn btn-primary">Kreiraj</a>
                  <h3>Tvoja putovanja</h3>
                  <?php if(count($places)>0): ?>
                  <table class="table table-striped">

                    <table class="table table-striped">
                      <tr>
                          <th>Naziv mesta</th>
                          <th></th>
                          <th></th>
                      </tr>
                      <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><a href="/places/<?php echo e($place->id); ?>"><?php echo e($place->name); ?></a></td>
                              <td><a href="/places/<?php echo e($place->id); ?>/edit" class="btn btn-default">Izmeni</a></td>
                              <td>
                                <form method="post" class="pull-right" action="<?php echo e(action('PlaceController@destroy', $place->id)); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE" />
    <button type="submit" class="btn btn-danger">Obriši</button>
   </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        <?php else: ?>
                                        <p>You have no posts</p>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>