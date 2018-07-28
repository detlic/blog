<?php $__env->startSection('content'); ?>

    <div class="jumbotron text-center">
        <h1>Dobrodošli na travel blog!</h1>

        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Uloguj se</a> <a class="btn btn-success btn-lg" href="/register" role="button">Registruj se</a></p>
    </div>
  </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>