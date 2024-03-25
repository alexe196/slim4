

<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('description', 'Welcome to our website. This is the home page.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/dashboard/product/update" class="form-horizontal form-material mx-2">
                        <input type="hidden" name="id" value="<?php echo e($product['id']); ?>">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Name</label>
                            <div class="col-md-12">
                                <input name="name" value="<?php echo e($product['name']); ?>" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea
                                        type="text"
                                        name="description"
                                        class="form-control"
                                ><?php echo e(!empty($product['description']) ? $product['description'] : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">slug</label>
                            <div class="col-md-12">
                                <input name="slug" value="<?php echo e($product['slug']); ?>" type="text" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="category_id" name="category_id" class="form-select shadow-none ps-0 border-0 form-control-line">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($product['categories_id'] == $item['id'] ? 'selected' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Meta description</label>
                            <div class="col-md-12">
                                <textarea id="meta_description" name="meta_description" class="form-control ps-0 form-control-line text-area-form" ><?php echo e($product['meta_description']); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Title</label>
                            <div class="col-md-12">
                                 <textarea id="title" name="title" class="form-control ps-0 form-control-line text-area-form"><?php echo e($product['title']); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">is_active</label>
                            <div class="col-md-12">
                                <input class="form-check-input" name="is_active" <?php echo e(!empty($product['is_active']) ? 'checked' : ''); ?> type="checkbox" value="1" id="is_active">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/product/edit.blade.php ENDPATH**/ ?>