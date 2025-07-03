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

<div>
    <?php echo csrf_field(); ?>

    
    <div class="mb-4">
        <input
            type="text"
            name="name"
            placeholder="Nome da Playlist"
            value="<?php echo e(old('name', $playlist->name ?? '')); ?>"
            required
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
    </div>

    
    <div class="mb-4">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Imagem da Playlist
        </label>

        <input
            type="file"
            name="image"
            id="image"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >

        
        <?php if(isset($playlist) && $playlist->image): ?>
            <div class="mt-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">Imagem atual:</p>
                <img
                    src="<?php echo e(asset('storage/' . $playlist->image)); ?>"
                    alt="Imagem da Playlist"
                    class="w-32 h-32 object-cover mt-1 rounded"
                >
            </div>
        <?php endif; ?>
    </div>

    
    <div class="mb-4">
        <input
            type="text"
            name="description"
            placeholder="Descrição"
            value="<?php echo e(old('description', $playlist->description ?? '')); ?>"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
    </div>

    
    <div class="mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Selecione uma ou mais músicas
        </label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="flex items-center space-x-2 p-4 rounded-lg border border-gray-300 bg-white dark:bg-gray-800">
                    <input
                        type="checkbox"
                        name="music_id[]"
                        value="<?php echo e($music->id); ?>"
                        <?php if( (isset($playlist) && $playlist->musics->contains($music)) || (is_array(old('music_id')) && in_array($music->id, old('music_id'))) ): ?>
                            checked
                        <?php endif; ?>
                        class="text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500"
                    >
                    <span class="text-gray-900 dark:text-white"><?php echo e($music->title); ?></span>
                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="flex items-center gap-4 mt-6">
        <a href="<?php echo e(route('playlists.index')); ?>"
           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            <?php echo e(__('Voltar')); ?>

        </a>

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
            <i class="fa-solid fa-plus me-2"></i> <?php echo e(__('Enviar')); ?>

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
    </div>
</div>
<?php /**PATH /var/www/resources/views/playlists/partials/form.blade.php ENDPATH**/ ?>