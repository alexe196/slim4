


<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="/dashboard/product-variant/form/<?php echo e($product_id); ?>">Створити варiант товару</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product</h4>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">sku</th>
                                    <th class="border-top-0">variant_name</th>
                                    <th class="border-top-0">price</th>
                                    <th class="border-top-0">count</th>
                                    <th class="border-top-0">is_active</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="product_part_view">
                                <?php if(!empty($productVariant)): ?>
                                    <?php $__currentLoopData = $productVariant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item['id']); ?></td>
                                            <td><?php echo e($item['sku']); ?></td>
                                            <td><?php echo e($item['variant_name']); ?></td>
                                            <td><?php echo e(round($item['price'], 2)); ?></td>
                                            <td><?php echo e(round($item['old_price'], 2)); ?></td>
                                            <td><?php echo e($item['count']); ?></td>
                                            <td><?php echo e(!empty($item['is_active']) ? 'active' : 'deactive'); ?></td>
                                            <td>
                                                <a href="/dashboard/product-variant/edit/<?php echo e($item['id']); ?>" class="btn btn-outline-warning">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/product-variant/index.blade.php ENDPATH**/ ?>