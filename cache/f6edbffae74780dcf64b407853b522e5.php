<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($item['id']); ?></td>
        <td><?php echo e($item['name']); ?></td>
        <td><?php echo e($item['description']); ?></td>
        <td><?php echo e($item['parent_id']); ?></td>
        <td><?php echo e($item['slug']); ?></td>
        <td>
            <a class="btn btn-cyan" href="/dashboard/category/edit/<?php echo e($item['id']); ?>"> edit </a>
        </td>
        <td>
            <a class="btn btn-danger" href="/dashboard/category/delete/<?php echo e($item['id']); ?>"> delete </a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/category/partview.blade.php ENDPATH**/ ?>