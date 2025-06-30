<?php $__env->startSection('title', 'Editar a Playlist'); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar a Playlist <?php echo e($playlist->name); ?>

        </h2>
    </div>
    <form action="<?php echo e(route('playlists.update', $playlist->id)); ?>" method="POST">
        <?php echo method_field('put'); ?>
        <?php echo $__env->make('playlists.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/playlists/edit.blade.php ENDPATH**/ ?>