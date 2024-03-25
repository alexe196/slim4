<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?php echo $__env->yieldContent('title', 'Default Title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Default Description'); ?>">

    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="/public/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/public/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="/public/assets/plugins/c3-master/c3.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/css/style.min.css" rel="stylesheet">
    <link href="/public/css/main.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/public/js/main.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists image',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
            a11y_advanced_options: true
        });
    </script>

</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="loader-block-id"> </div>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <?php echo $__env->make('layouts.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts.leftmenu.leftmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</body>

<script src="/public/assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/public/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="/public/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/public/js/sidebarmenu.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="/public/assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="/public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="/public/assets/plugins/d3/d3.min.js"></script>
<script src="/public/assets/plugins/c3-master/c3.min.js"></script>
<!--Custom JavaScript -->
<script src="/public/js/pages/dashboards/dashboard1.js"></script>
<script src="/public/js/custom.js"></script>

</html>
<?php /**PATH D:\OpenServer\domains\slim.loc\resources\views/layouts/app.blade.php ENDPATH**/ ?>