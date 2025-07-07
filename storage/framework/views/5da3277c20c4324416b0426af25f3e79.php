<?php $__env->startSection('title', 'Listagem dos Artistas'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-6 mb-2">

    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100 mb-4" style="font-family: 'Inter', 'Segoe UI', Arial, sans-serif;">ARTISTAS</h1>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-900 dark:text-gray-100">
                Conheça os artistas no <strong>HitWave</strong> e descubra quem está por trás das músicas que você ama. Acompanhe discografias, biografias e novidades dos seus músicos favoritos — tudo em um só lugar, com praticidade e estilo.
            </p>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
        <div class="py-6 mb-2">
            <a href="<?php echo e(route('artists.create')); ?>">
                <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <i class="fa-solid fa-plus m-1"></i>Cadastrar Novo Artista
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

    <div class="py-6 mb-2">

    <div class="flex flex-wrap gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div>
                <a href="<?php echo e(route('artists.show', $artist->id)); ?>" class="block w-full">
                    <div class="w-24 h-24 mb-4 relative overflow-hidden rounded-full border border-gray-300 dark:border-gray-600">
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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                    <div class="flex justify-center space-x-3 text-xs">
                        <a href="<?php echo e(route('artists.edit', $artist->id)); ?>" class="text-gray-600 hover:underline">Editar</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum artista cadastrado.
            </div>
        <?php endif; ?>
    </div>

    <div class="py-4">
        <?php echo e($artists->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/artists/index.blade.php ENDPATH**/ ?>