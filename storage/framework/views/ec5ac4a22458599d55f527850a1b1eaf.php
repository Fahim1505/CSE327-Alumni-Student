

<?php $__env->startSection('title', 'Add Job'); ?>
<?php $__env->startSection('header', 'Add New Job'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('jobs.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="job_title" class="form-control" value="<?php echo e(old('job_title')); ?>" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="<?php echo e(old('company_name')); ?>" required>
    </div>
    <div class="mb-3">
        <label>Job Type</label>
        <input type="text" name="job_type" class="form-control" value="<?php echo e(old('job_type')); ?>" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required><?php echo e(old('description')); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Dateline</label>
        <input type="date" name="dateline" class="form-control" value="<?php echo e(old('dateline')); ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Add Job</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/jobs/create.blade.php ENDPATH**/ ?>