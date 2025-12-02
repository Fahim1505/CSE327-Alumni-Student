<?php $__env->startSection('title', 'Jobs List'); ?>
<?php $__env->startSection('header', 'Jobs List'); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary mb-3">Add Job</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Job Type</th>
            <th>Description</th> <!-- Added -->
            <th>Dateline</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($job->job_title); ?></td>
            <td><?php echo e($job->company_name); ?></td>
            <td><?php echo e($job->job_type); ?></td>
            <td><?php echo e($job->description); ?></td> <!-- Added -->
            <td><?php echo e($job->dateline); ?></td>
            <td>
                <a href="<?php echo e(route('jobs.edit', $job->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST" style="display:inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel-projects\myproject\resources\views/jobs/index.blade.php ENDPATH**/ ?>