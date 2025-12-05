<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e($title ?? config('app.name', 'BSU-Bokod SIMS')); ?> - <?php echo e(config('app.name', 'BSU-Bokod SIMS')); ?></title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/bsu-logo.png')); ?>">
        <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('images/bsu-logo.png')); ?>">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        
        <!-- Toastify CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-slate-100">
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white shadow">
                    <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot ?? ''); ?>

            </main>
        </div>

        <!-- Toastify JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        
        <!-- Toast Messages -->
        <?php if(session('success')): ?>
        <script>
            Toastify({
                text: "<?php echo e(session('success')); ?>",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #10b981, #059669)",
                stopOnFocus: true,
                className: "toast-success",
            }).showToast();
        </script>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <script>
            Toastify({
                text: "<?php echo e(session('error')); ?>",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ef4444, #dc2626)",
                stopOnFocus: true,
                className: "toast-error",
            }).showToast();
        </script>
        <?php endif; ?>

        <?php if(session('info')): ?>
        <script>
            Toastify({
                text: "<?php echo e(session('info')); ?>",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #3b82f6, #2563eb)",
                stopOnFocus: true,
                className: "toast-info",
            }).showToast();
        </script>
        <?php endif; ?>

        <!-- Scripts Stack -->
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/layouts/app.blade.php ENDPATH**/ ?>