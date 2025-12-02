<?php $__env->startSection('title', 'Add Achievement'); ?>
<?php $__env->startSection('header', 'Add Achievement'); ?>

<?php $__env->startSection('content'); ?>
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Add New Achievement</h4>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('achievements.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control" value="<?php echo e(old('category')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description')); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="date_achieved" class="form-label">Date Achieved</label>
                <input type="date" name="date_achieved" id="date_achieved" class="form-control" value="<?php echo e(old('date_achieved')); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?php echo e(route('achievements.index')); ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Achievement</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/achievements/create.blade.php ENDPATH**/ ?>