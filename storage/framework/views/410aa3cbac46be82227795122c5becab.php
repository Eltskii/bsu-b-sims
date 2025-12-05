<button <?php echo e($attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-status-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-status-red focus:ring-offset-2 transition ease-in-out duration-150'])); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/components/danger-button.blade.php ENDPATH**/ ?>