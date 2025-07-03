<?php $__env->startSection('title', 'Editar o Álbum'); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar o Álbum <?php echo e($album->name); ?>

        </h2>
    </div>
    <form action="<?php echo e(route('albums.update', $album->id)); ?>" enctype="multipart/form-data" method="POST">
        <?php echo method_field('put'); ?>
        <?php echo $__env->make('albums.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/albums/edit.blade.php ENDPATH**/ ?>