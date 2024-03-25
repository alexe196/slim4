

<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('description', 'Welcome to our website. This is the home page.'); ?>

<?php $__env->startSection('content'); ?>


<div class="container mt-5">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/dashboard/category/search" class="form-horizontal form-material mx-2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select id="category_id_search" name="id" class="form-select">
                                        <option value="0">search</option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button id="search_category_button_id" class="btn btn-success mx-auto mx-md-0 text-white">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Parent</th>
                                    <th class="border-top-0">Url</th>
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0"></th>
                                </tr>
                                </thead>
                                <tbody id="category_part_view">
                                    <?php echo $__env->make('dashboard.category.partview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/category/view.blade.php ENDPATH**/ ?>