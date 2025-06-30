<?php $__env->startSection('title', 'Cadastrar Nova Playlist'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Nova Playlist
    </h2>
</div>

    <form action="<?php echo e(route('playlists.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('playlists.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/playlists/create.blade.php ENDPATH**/ ?>