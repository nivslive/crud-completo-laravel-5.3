<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Itens</h1>
            <p><?php echo e(Session::get('message')); ?></p>

            
            
            <a href="/search"> <span>Procurar</span> <span class="glyphicon 
glyphicon glyphicon-search"></span></a> <span>   <a href="/produtos/create"> <span>Criar</span> <span class="glyphicon 
glyphicon glyphicon-plus"></span></a> 

<form action="<?php echo e(route('produtos.delete')); ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="submit" name="name" value="Apagar tudo">
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
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>