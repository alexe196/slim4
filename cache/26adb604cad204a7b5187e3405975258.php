

<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('description', 'Welcome to our website. This is the home page.'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/dashboard/category/add" class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Name</label>
                        <div class="col-md-12">
                            <input name="name" type="text" placeholder="Mobile" class="form-control ps-0 form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-12">Description</label>
                        <div class="col-md-12">
                            <textarea id="description" name="description" class="form-control ps-0 form-control-line" > </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Parent</label>
                        <div class="col-sm-12 border-bottom">
                            <select id="parent_id" name="parent" class="form-select shadow-none ps-0 border-0 form-control-line">
                                <option value="0">---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">slug</label>
                        <div class="col-md-12">
                            <input type="text" id="slug" name="slug" placeholder="mobile" class="form-control ps-0 form-control-line">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/dashboard/category/index.blade.php ENDPATH**/ ?>