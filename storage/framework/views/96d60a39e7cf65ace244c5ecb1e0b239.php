<!-- resources/views/jobs/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Job</title>
</head>
<body>
    <h1>Add Job</h1>

    <!-- Show validation errors -->
    <?php if($errors->any()): ?>
        <div style="color: red;">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('jobs.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label>Job Title:</label><br>
        <input type="text" name="job_title" value="<?php echo e(old('job_title')); ?>"><br><br>

        <label>Company Name:</label><br>
        <input type="text" name="company_name" value="<?php echo e(old('company_name')); ?>"><br><br>

        <label>Job Type:</label><br>
        <input type="text" name="job_type" value="<?php echo e(old('job_type')); ?>"><br><br>

        <label>Description:</label><br>
        <textarea name="description"><?php echo e(old('description')); ?></textarea><br><br>

        <label>Dateline:</label><br>
        <input type="date" name="dateline" value="<?php echo e(old('dateline')); ?>"><br><br>

        <button type="submit">Add Job</button>
    </form>
</body>
</html>
<?php /**PATH D:\laravel-projects\myproject\resources\views/welcome.blade.php ENDPATH**/ ?>