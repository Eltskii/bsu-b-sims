<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Batch Details')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Batch Information -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">File Name</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1"><?php echo e($batch->file_name); ?></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Status</p>
                    <span class="inline-block px-3 py-1 text-xs rounded-full font-medium mt-1
                        <?php if(in_array($batch->status, ['pending', 'ready'])): ?> bg-amber-100 text-amber-800
                        <?php elseif($batch->status == 'submitted'): ?> bg-blue-100 text-blue-800
                        <?php elseif($batch->status == 'approved'): ?> bg-emerald-100 text-emerald-800
                        <?php elseif($batch->status == 'rejected'): ?> bg-red-100 text-red-800
                        <?php else: ?> bg-gray-100 text-gray-800 <?php endif; ?>">
                        <?php echo e(ucfirst($batch->status)); ?>

                    </span>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Total Records</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1"><?php echo e($batch->total_records); ?></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Success/Error</p>
                    <div class="mt-1">
                        <span class="text-lg font-semibold text-green-600"><?php echo e($successCount); ?></span>
                        <span class="text-gray-400">/</span>
                        <span class="text-lg font-semibold text-red-600"><?php echo e($errorCount); ?></span>
                    </div>
                </div>
            </div>

            <!-- Records Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Import Records</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-brand-deep to-brand-medium text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Student ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Subject Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Grade</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Error Message</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 <?php if($record->status == 'error'): ?> bg-red-50 <?php elseif($record->status == 'matched'): ?> bg-green-50 <?php endif; ?>">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <?php echo e($record->student_id_number); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            <?php echo e($record->subject_code); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                            <?php echo e($record->grade ? number_format($record->grade, 2) : '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium
                                                <?php if($record->status == 'matched'): ?> bg-green-100 text-green-800
                                                <?php elseif($record->status == 'error'): ?> bg-red-100 text-red-800
                                                <?php else: ?> bg-yellow-100 text-yellow-800 <?php endif; ?>">
                                                <?php echo e(ucfirst($record->status)); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-red-600">
                                            <?php echo e($record->error_message ?? '—'); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            No records in this batch yet.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-between items-center">
                <a href="<?php echo e(route('chairperson.grade-batches.index')); ?>" 
                   class="text-gray-700 hover:text-gray-900 font-medium">
                    ← Back to Batches
                </a>
                <div class="flex gap-3">
                    <?php if(in_array($batch->status, ['pending', 'ready']) && $errorCount < $batch->total_records): ?>
                        <form action="<?php echo e(route('chairperson.grade-import.submit', $batch)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" 
                                    class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-lg font-medium shadow-md hover:shadow-lg transition-all">
                                Submit for Approval
                            </button>
                        </form>
                    <?php endif; ?>
                    
                    <?php if(in_array($batch->status, ['pending', 'ready']) && $errorCount > 0): ?>
                        <form action="<?php echo e(route('chairperson.grade-batches.retry', $batch)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" 
                                    class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-medium shadow-md hover:shadow-lg transition-all">
                                Retry Failed Records
                            </button>
                        </form>
                    <?php endif; ?>
                    
                    <?php if(in_array($batch->status, ['pending', 'ready'])): ?>
                        <form action="<?php echo e(route('chairperson.grade-batches.destroy', $batch)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" 
                                    onclick="return confirm('Delete this batch?')"
                                    class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium shadow-md hover:shadow-lg transition-all">
                                Delete
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/chairperson/grades/batches/show.blade.php ENDPATH**/ ?>