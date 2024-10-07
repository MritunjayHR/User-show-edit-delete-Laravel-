<!DOCTYPE html>
<html>
<head>
    <title>User Search and Registration</title>
</head>
<body>
    <h1>Search Users</h1>

    <form action="<?php echo e(route('users.search')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label>User ID:</label>
        <input type="text" name="user_id">
        <label>User Name:</label>
        <input type="text" name="user_name">
        <button type="submit">Search</button>
    </form>

    <?php if(isset($users) && $users->count() > 0): ?>
        <h2>Search Results</h2>
        <ul>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($user->id); ?> - <?php echo e($user->name); ?></li>
                <a href="<?php echo e(route('users.edit', $user->id)); ?>">Edit</a>
                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Delete</button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <a href="<?php echo e(route('users.create')); ?>">Create New User</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\user-app\resources\views/index.blade.php ENDPATH**/ ?>