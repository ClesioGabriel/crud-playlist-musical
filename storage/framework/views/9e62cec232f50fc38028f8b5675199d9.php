<?php $__env->startSection('title', 'Listagem dos Usuários'); ?>


<?php $__env->startSection('content'); ?>
    <div class="py-6 mb-2">

        <a href="<?php echo e(route('users.create')); ?>"
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
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Novo Usuário
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
                    <th class="px-6 py-3 text-left">Nome</th>
                    <th class="px-6 py-3 text-left">E-mail</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150 text-center">
                        <td class="px-6 py-6"><?php echo e($users->firstItem() + $index); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($user->name); ?></td>
                        <td class="px-6 py-6 text-left"><?php echo e($user->email); ?></td>
                        <td class="px-6 py-6">
                            <div class="flex justify-center gap-4">
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" 
                                onclick="event.stopPropagation();"
                                class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Editar
                                </a>

                                <a href="<?php echo e(route('users.show', $user->id)); ?>" 
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
                        <td colspan="4" class="text-center py-6 text-gray-400 dark:text-gray-300">
                            Nenhum usuário no banco
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="py-4">
        <?php echo e($users->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/users/index.blade.php ENDPATH**/ ?>