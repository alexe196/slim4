<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($item['id']); ?></td>
        <td><?php echo e($item['name']); ?></td>
        <td><?php echo e($item['slug']); ?></td>
        <td><?php echo e($item['meta_description']); ?></td>
        <td><?php echo e($item['title']); ?></td>
        <td><?php echo e($item['categories_name']); ?></td>
        <td>
            <a class="btn btn-cyan" href="/dashboard/product/edit/<?php echo e($item['id']); ?>"> edit </a>
        </td>
        <td>
            <a class="btn btn-danger" href="/dashboard/product/delete/<?php echo e($item['id']); ?>"> delete </a>
        </td>
        <td>
            <a class="btn btn-primary" href="/dashboard/product-upload/view/<?php echo e($item['id']); ?>"> Зображення </a>
        </td>
        <td>
            <a class="btn btn-outline-secondary" href="/dashboard/product-variant/view/<?php echo e($item['id']); ?>"> Варианты Продукту </a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/product/partview.blade.php ENDPATH**/ ?>