<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1 border-b-2 border-emerald-400 text-sm font-semibold leading-5 text-white focus:outline-none transition duration-150 ease-in-out relative z-10'
            : 'inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white/90 hover:text-white hover:border-emerald-300 focus:outline-none focus:text-white transition duration-150 ease-in-out relative z-10';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?> <?php if($active): ?> aria-current="page" <?php endif; ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/components/nav-link.blade.php ENDPATH**/ ?>