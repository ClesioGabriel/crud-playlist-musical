<?php $__env->startSection('title', 'Listagem dos Álbuns'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-6 mb-2">

    <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Álbuns</h1>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
        <div class="py-6 mb-2">
            <a href="<?php echo e(route('albums.create')); ?>">
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
                    <i class="fa-solid fa-plus m-1"></i> Cadastrar Novo Álbum
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

    <div class="flex flex-wrap gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="<?php echo e(route('albums.show', $album->id)); ?>" class="block w-full">
                    <div class="w-[200px] h-[200px] flex items-center justify-center rounded-lg overflow-hidden mb-4 border border-gray-200 dark:border-gray-700 transition-transform transition duration-200 hover:scale-105 hover:shadow-lg">
                        <?php if($album->image): ?>
                            <img src="<?php echo e($album->image && file_exists(public_path('storage/' . $album->image)) ? asset('storage/' . $album->image) : asset('images/default-album.png')); ?>" alt="<?php echo e($album->name); ?>"
                                class="object-cover w-full h-full">
                        <?php else: ?>
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate" title="<?php echo e($album->name); ?>"><?php echo e($album->name); ?></div>
                    <div class="text-gray-600 dark:text-gray-300 mb-2 truncate">
                        <?php echo e($album->artist ? $album->artist->name : 'Artista não encontrado'); ?>

                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                    <div class="flex justify-center space-x-3 text-xs">
                        <a href="<?php echo e(route('albums.edit', $album->id)); ?>" class="text-gray-600 hover:underline">Editar</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="w-full text-center py-8 text-gray-500 dark:text-gray-400">
                Nenhum álbum no banco.
            </div>
        <?php endif; ?>
    </div>

        <div class="py-4 flex justify-center">
            <?php echo e($albums->links()); ?>

        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/albums/index.blade.php ENDPATH**/ ?>