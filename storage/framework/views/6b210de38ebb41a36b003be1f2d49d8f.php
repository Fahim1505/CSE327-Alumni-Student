

<?php $__env->startSection('title', 'Edit Job'); ?>
<?php $__env->startSection('header', 'Edit Job'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('jobs.update', $job->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="job_title" class="form-control" value="<?php echo e($job->job_title); ?>" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="<?php echo e($job->company_name); ?>" required>
    </div>
    <div class="mb-3">
        <label>Job Type</label>
        <input type="text" name="job_type" class="form-control" value="<?php echo e($job->job_type); ?>" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required><?php echo e($job->description); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Dateline</label>
        <input type="date" name="dateline" class="form-control" value="<?php echo e($job->dateline); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Job</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/jobs/edit.blade.php ENDPATH**/ ?>