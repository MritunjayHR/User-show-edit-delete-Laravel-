<?php $__env->startSection('title', 'User Search and Registration'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Search Users</h1>
            <form action="<?php echo e(route('users.search')); ?>" method="POST" class="mb-5 p-4 bg-white rounded shadow">
                <?php echo csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="user_id" class="form-label">User ID:</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Enter User ID">
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">User Name:</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(isset($users) && $users->count() > 0): ?>
                <h2 class="text-center">All Users</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->user_id); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger text-center">No users found.</p>
            <?php endif; ?>
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success mt-3">Create New User</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\user-app\resources\views/users/index.blade.php ENDPATH**/ ?>