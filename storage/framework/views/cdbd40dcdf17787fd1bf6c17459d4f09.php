<?php $__env->startSection('title', 'Achievement Details'); ?>
<?php $__env->startSection('header', 'Achievement Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h4 class="card-title mb-3"><?php echo e($achievement->title); ?></h4>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo e($achievement->category); ?></h6>
        <p class="card-text"><?php echo e($achievement->description); ?></p>
        <p class="text-muted">Date Achieved: <?php echo e($achievement->date_achieved); ?></p>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="<?php echo e(route('achievements.edit', $achievement->id)); ?>" class="btn btn-warning">Edit</a>

        <form action="<?php echo e(route('achievements.destroy', $achievement->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="<?php echo e(route('achievements.index')); ?>" class="btn btn-secondary">Back to List</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/achievements/show.blade.php ENDPATH**/ ?>