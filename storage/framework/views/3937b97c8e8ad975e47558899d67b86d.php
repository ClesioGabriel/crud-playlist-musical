<?php $__env->startSection('title', 'Criar Novo Usuário'); ?>

<?php $__env->startSection('content'); ?>
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Novo Usuário
    </h2>
</div>

    <form action="<?php echo e(route('users.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('admin.users.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.users.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/users/create.blade.php ENDPATH**/ ?>