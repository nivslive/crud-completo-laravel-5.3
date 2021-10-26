<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Página de detalhe</h1>
			<h2><?php echo e($detailpage->nome); ?></h2>
			<p>
				<?php echo e($detailpage->descricao); ?>

			</p>
			<a href="/produtos">Voltar</a>
		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>