<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <?php if(Auth::guest()): ?>
            <div class="panel-heading">Bem vindo</div>

                <div class="panel-body">
                 Faça o login
             </div>
             <?php else: ?>
             <div class="panel-heading">Bem vindo, <?php echo e(Auth::user()->name); ?></div>

             <div class="panel-body">
                 Você está logado!
             </div>
         </div>
         <?php endif; ?>
     </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>