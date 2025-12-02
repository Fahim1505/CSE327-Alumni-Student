<?php $__env->startSection('title', 'Achievements List'); ?>
<?php $__env->startSection('header', 'Achievements List'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Achievements</h2>
    <a href="<?php echo e(route('achievements.create')); ?>" class="btn btn-primary">Add Achievement</a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if($achievements->count() > 0): ?>
    <div class="row">
        <?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo e($achievement->title); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($achievement->category); ?></h6>
                    <p class="card-text"><?php echo e($achievement->description); ?></p>
                    <p class="text-muted mt-auto">Date Achieved: <?php echo e($achievement->date_achieved); ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?php echo e(route('achievements.edit', $achievement->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('achievements.destroy', $achievement->id)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="<?php echo e(route('achievements.show', $achievement->id)); ?>" class="btn btn-info btn-sm">View</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p>No achievements found. <a href="<?php echo e(route('achievements.create')); ?>">Add one now</a>.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/achievements/index.blade.php ENDPATH**/ ?>