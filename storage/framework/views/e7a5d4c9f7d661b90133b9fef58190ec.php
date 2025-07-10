<?php $__env->startSection('title', 'Listagem das Músicas'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-6 mb-2">

    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100 mb-4" style="font-family: 'Inter', 'Segoe UI', Arial, sans-serif;">MÚSICAS</h1>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-900 dark:text-gray-100">
                No <strong>HitWave</strong>, você tem acesso a uma jornada musical única: descubrindo novos sons e revivendo clássicos que combinam com cada momento do seu dia.
                Tudo isso com uma interface intuitiva, rápida e pensada para quem realmente vive a música.
            </p>
        </div>
    </div>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
        <div class="py-6 mb-2">
            <a href="<?php echo e(route('musics.create')); ?>">
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
                    <i class="fa-solid fa-plus m-1"></i>Cadastrar Nova Música
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

    <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl p-6">
        <table class="w-full text-sm text-center text-gray-800 dark:text-white">
            <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-500">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Título</th>
                    <th class="px-6 py-3">Artista</th>
                    <th class="px-6 py-3">Álbum</th>
                    <th class="px-6 py-3">Gênero</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr 
                        class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150 text-center cursor-pointer"
                        onclick="window.location='<?php echo e(route('musics.play', $music->id)); ?>'"
                    >
                        <td class="px-6 py-6"><?php echo e($musics->firstItem() + $index); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($music->title); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($music->artist->name ?? 'Artista não encontrado'); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($music->album->name ?? 'Álbum não encontrado'); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($music->genre); ?></td>
                        <td class="px-6 py-6">
                            <div class="flex justify-center gap-4">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                                    <a href="<?php echo e(route('musics.edit', $music->id)); ?>" 
                                        onclick="event.stopPropagation();"
                                        class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar
                                    </a>
                                <?php endif; ?>

                                <a href="<?php echo e(route('musics.show', $music->id)); ?>" 
                                    onclick="event.stopPropagation();"
                                    class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                    <i class="fa-solid fa-eye"></i>
                                    Detalhes
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400 dark:text-gray-300">
                            Nenhuma música no banco
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <div class="py-4">
        <?php echo e($musics->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/musics/index.blade.php ENDPATH**/ ?>