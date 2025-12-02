

<?php $__env->startSection('title', $job->job_title); ?>
<?php $__env->startSection('header', $job->job_title); ?>

<?php $__env->startSection('content'); ?>
<p><strong>Company:</strong> <?php echo e($job->company_name); ?></p>
<p><strong>Type:</strong> <?php echo e($job->job_type); ?></p>
<p><strong>Description:</strong> <?php echo e($job->description); ?></p>
<p><strong>Dateline:</strong> <?php echo e($job->dateline); ?></p>
<a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-secondary">Back to Jobs</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/jobs/show.blade.php ENDPATH**/ ?>