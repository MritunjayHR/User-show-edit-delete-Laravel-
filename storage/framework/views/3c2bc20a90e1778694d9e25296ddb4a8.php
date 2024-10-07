<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="mb-4">Edit User</h1>
        <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo e($user->name); ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary mt-3">Back to Search</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\user-app\resources\views/users/edit.blade.php ENDPATH**/ ?>