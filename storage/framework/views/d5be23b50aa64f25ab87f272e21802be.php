<?php $__env->startSection('title', 'Cadastrar Nova Música'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Nova Música
    </h2>
</div>


<form method="POST" action="<?php echo e(route('musics.store')); ?>" enctype="multipart/form-data" class="space-y-4">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('musics.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/musics/create.blade.php ENDPATH**/ ?>