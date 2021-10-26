<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Itens</h1>
            <p><?php echo e(Session::get('message')); ?></p>

            
            <form class="" action="" method="POST">

				<div class="form-group">
					
					<div class="col-md-12">
						<label for="nome">Digite a URL do Site</label>
						<input id="textinput" name="nome" type="text" placeholder="" class="form-control input-md">
						<span class="help-block"><?php echo e(($errors->has('nome')) ? $errors->first('nome') : ''); ?></span>  

                          <input type="checkbox" id="hifen" name="hifen" value="hifen">
                             <label for="hifen">Exceto Hifens</label>
                            <input type="checkbox" id="number" name="number" value="number">
                           <label for="number">Exceto Numeros</label><br>
					</div>



                    <span>Quantidade de Caracteres</span><br>
                    <label for="quantidade">Minimo</label>
						<input style="display:flex" id="filtro_minimo" name="filtro_minimo" type="text" placeholder="" class="form-control input-md">

                    <label for="quantidade"> Máximo </label>

                    <input id="textinput" name="filtro_maximo" type="text" placeholder="" class="form-control input-md">
               
</select>
				</div>
			
				<p><br>
					<br>
				</p>
				
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="submit" name="name" value="Buscar">
                <a href="/produtos">Voltar. </a>
			</form>

            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            URL Site
                        </th>
                        <th>
                            Descrição
                        </th>
                        
                        <th>
                        Editar
                        </th>
                        <th>
                            Ver
                        </th>
                        <th>
                        Deletar
                        </th>
                    </tr>
                </thead>
                <tbody>

                    


            <?php if(!empty($todosprodutos)): ?>
                <?php $__currentLoopData = $todosprodutos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($produto -> id); ?>

                        </td>
                        <td>
                            <?php echo e($produto -> nome); ?>

                        </td>
                        <td>
                            <?php echo e($produto -> descricao); ?>

                        </td>
                        
                        <td>
                            <a href="/produtos/<?php echo e($produto->id); ?>/edit">Editar</a>
                        </td>
                        <td>
                            <a href="/produtos/<?php echo e($produto->id); ?>"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                        <td>
                            <form action="/produtos/<?php echo e($produto->id); ?>" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="submit" name="name" value="Apagar">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>




                </tbody>
            </table>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>