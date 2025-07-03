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

<div class="">
    <?php echo csrf_field(); ?>

    <div class="mb-4">
        <input type="file" name="image" placeholder="Imagem do Álbum"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <input type="text" name="name" placeholder="Nome" value="<?php echo e($album->name ?? old('name')); ?>"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <select name="artist_id" 
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Selecione um artista</option>
            <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($artist->id); ?>" 
                    <?php echo e((isset($album) && $album->artist_id == $artist->id) || old('artist_id') == $artist->id ? 'selected' : ''); ?>>
                    <?php echo e($artist->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>



    <div class="mb-4">
        <select name="genre"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecione o Gênero Musical</option>
            <option value="rock" <?php echo e((old('genre') == 'rock' || ($artist->genre ?? '') == 'rock') ? 'selected' : ''); ?>>Rock</option>
            <option value="pop" <?php echo e((old('genre') == 'pop' || ($artist->genre ?? '') == 'pop') ? 'selected' : ''); ?>>Pop</option>
            <option value="hiphop" <?php echo e((old('genre') == 'hiphop' || ($artist->genre ?? '') == 'hiphop') ? 'selected' : ''); ?>>Hip-Hop</option>
            <option value="classical" <?php echo e((old('genre') == 'classical' || ($artist->genre ?? '') == 'classical') ? 'selected' : ''); ?>>Classical</option>
            <option value="electronic" <?php echo e((old('genre') == 'electronic' || ($artist->genre ?? '') == 'electronic') ? 'selected' : ''); ?>>Electronic</option>
            <option value="reggae" <?php echo e((old('genre') == 'reggae' || ($artist->genre ?? '') == 'reggae') ? 'selected' : ''); ?>>Reggae</option>
            <option value="sertanejo" <?php echo e((old('genre') == 'sertanejo' || ($artist->genre ?? '') == 'sertanejo') ? 'selected' : ''); ?>>Sertanejo</option>
            <option value="funk" <?php echo e((old('genre') == 'funk' || ($artist->genre ?? '') == 'funk') ? 'selected' : ''); ?>>Funk</option>
            <option value="trap" <?php echo e((old('genre') == 'trap' || ($artist->genre ?? '') == 'trap') ? 'selected' : ''); ?>>Trap</option>
            <option value="other" <?php echo e((old('genre') == 'other' || ($artist->genre ?? '') == 'other') ? 'selected' : ''); ?>>Other</option>
        </select>
    </div>

    <div class="flex items-center gap-4 mt-6">
    <a href="<?php echo e(route('albums.index')); ?>"
       class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        <?php echo e(__('Voltar')); ?>

    </a>

    <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
        <i class="fa-solid fa-plus me-2"></i> Enviar
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

</div><?php /**PATH /var/www/resources/views/albums/partials/form.blade.php ENDPATH**/ ?>