<?php $__env->startSection('title', 'Achievements List'); ?>
<?php $__env->startSection('header', 'Achievements List'); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('achievements.create')); ?>" class="btn btn-primary mb-3">Add Achievement</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Date Achieved</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($achievement->title); ?></td>
            <td><?php echo e($achievement->category); ?></td>
            <td><?php echo e($achievement->description); ?></td>
            <td><?php echo e($achievement->date_achieved); ?></td>
            <td>
                <a href="<?php echo e(route('achievements.edit', $achievement->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(route('achievements.destroy', $achievement->id)); ?>" method="POST" style="display:inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="<?php echo e(route('achievements.show', $achievement->id)); ?>" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/achievements/index.blade.php ENDPATH**/ ?>