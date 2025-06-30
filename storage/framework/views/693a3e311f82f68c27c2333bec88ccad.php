<?php $__env->startSection('title', 'Início'); ?>

<?php $__env->startSection('content'); ?>

<div class="py-6 mb-2">

<h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
     <?php if(auth()->guard()->check()): ?>
        Bem-vindo, <?php echo e(Auth::user()->name); ?>!
    <?php endif; ?>
</h1>


<div class="py-4">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <p class="text-gray-600 dark:text-gray-400">
            O <strong>HitWave</strong> é a melhor forma de escutar seus artistas preferidos, explorar álbuns incríveis e curtir músicas com facilidade e qualidade.
            Uma plataforma feita para quem ama música, com uma experiência leve, moderna e organizada.
        </p>
    </div>
</div>

<div class="py-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"><strong>Artistas<strong></h2>

    <div class="flex flex-wrap gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="<?php echo e(route('artists.show', $artist->id)); ?>" class="block w-full">
                    <div class="w-full h-48 mb-4 relative overflow-hidden rounded-lg">
                        <?php if($artist->image): ?>
                            <img src="<?php echo e(asset('storage/' . $artist->image)); ?>" alt="<?php echo e($artist->name); ?>" class="object-cover w-full h-full">
                        <?php else: ?>
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate"><?php echo e($artist->name); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum artista cadastrado.
            </div>
        <?php endif; ?>
    </div>
</div>
    <div class="py-4 flex justify-center">
        <?php echo e($artists->links()); ?>

    </div>


    <div class="py-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"><strong>Álbuns</strong></h2>

    <div class="flex flex-wrap gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="<?php echo e(route('albums.show', $album->id)); ?>" class="block w-full">
                    <div class="w-full h-48 mb-4 relative overflow-hidden rounded-lg">
                        <?php if($album->image): ?>
                            <img src="<?php echo e(asset('storage/' . $album->image)); ?>" alt="<?php echo e($album->name); ?>" class="object-cover w-full h-full">
                        <?php else: ?>
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate"><?php echo e($album->name); ?></div>
                    <div class="text-gray-600 dark:text-gray-300 text-sm truncate">
                        <?php echo e($album->artist ? $album->artist->name : 'Artista não encontrado'); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum álbum cadastrado.
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="py-4 flex justify-center">
    <?php echo e($albums->links()); ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/dashboard.blade.php ENDPATH**/ ?>