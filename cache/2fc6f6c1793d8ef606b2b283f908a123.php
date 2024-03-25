

<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('description', 'Welcome to our website. This is the home page.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product-upload/file" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="product_id" value="<?php echo e($product_id); ?>">

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label" for="sort">
                                        Сортування
                                    </label>
                                    <input type="number" class="form-control"  id="sort" name="sort" min="1" max="100" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check pt-4" style="">
                                    <label class="form-check-label" for="is_viewer">
                                        В карточцi товара
                                    </label>
                                    <input class="form-check-input" name="is_viewer" type="checkbox" value="1" id="is_viewer">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label for="description" class="col-md-12">Завантажити файл</label>
                                    <input class="form-control" name="file" type="file" id="file" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group pt-4">
                                    <div class="col-sm-12 d-flex">
                                        <button class="btn btn-success mx-auto mx-md-0 text-white">Завантажити</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product</h4>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Name</th>
                        <th class="border-top-0">Img</th>
                        <th class="border-top-0">File Name</th>
                        <th class="border-top-0">sort</th>
                        <th class="border-top-0">Cart Product</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="product_part_view">
                    <?php if(!empty($product) && !empty($product[0]['path'])): ?>
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item['id']); ?></td>
                            <td><?php echo e($item['product_name']); ?></td>
                            <td><img src="<?php echo e($item['path']); ?>" height="50" /></td>
                            <td><?php echo e($item['file_name']); ?></td>
                            <td>
                                <input type="number" class="form-control" value="<?php echo e($item['sort']); ?>"  id="sort_<?php echo e($item['id']); ?>" name="sort" min="1" max="100" />
                            </td>
                            <td>
                                <input class="form-check-input" name="is_viewer" <?php echo e(!empty($item['is_viewer']) ? 'checked' : ''); ?> type="checkbox" value="1" id="is_viewer_<?php echo e($item['id']); ?>">
                            </td>
                            <td>
                                <form method="post" action="/dashboard/product-upload/delete" class="form-horizontal form-material mx-2">
                                    <input type="hidden" value="<?php echo e($item['id']); ?>" name="id">
                                    <input type="hidden" value="<?php echo e($product_id); ?>" name="product_id">
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <button  data-id="<?php echo e($item['id']); ?>" class="btn btn-outline-warning edit-images">Edit</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/product-apload-file/index.blade.php ENDPATH**/ ?>