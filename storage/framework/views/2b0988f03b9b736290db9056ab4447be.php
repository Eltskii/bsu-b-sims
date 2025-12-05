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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Preview Import Data')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">File: <?php echo e($fileName); ?></h3>
                    
                    <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <p class="text-sm text-blue-800 mb-3"><strong>Column Mapping:</strong></p>
                        <div class="grid grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">Student ID:</span><br>
                                <strong><?php echo e($headers[$columnMapping['student_id']] ?? 'Column ' . $columnMapping['student_id']); ?></strong>
                            </div>
                            <div>
                                <span class="text-gray-600">Subject Code:</span><br>
                                <strong><?php echo e($headers[$columnMapping['subject_code']] ?? 'Column ' . $columnMapping['subject_code']); ?></strong>
                            </div>
                            <div>
                                <span class="text-gray-600">Grade:</span><br>
                                <strong><?php echo e($headers[$columnMapping['grade']] ?? 'Column ' . $columnMapping['grade']); ?></strong>
                            </div>
                        </div>
                    </div>

                    <!-- Preview data table -->
                    <div class="mb-6 overflow-x-auto border rounded-lg">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">#</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Student ID</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Subject Code</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Grade (Raw)</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Grade (Normalized)</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php $__currentLoopData = $previewData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-4 py-3 text-gray-600"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-gray-900"><?php echo e($row['student_id']); ?></td>
                                        <td class="px-4 py-3 text-gray-900"><?php echo e($row['subject_code']); ?></td>
                                        <td class="px-4 py-3 text-gray-600"><?php echo e($row['grade_raw']); ?></td>
                                        <td class="px-4 py-3">
                                            <?php if($row['grade_normalized']): ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                                                    <?php if(in_array($row['grade_normalized'], ['1.00', '1.25', '1.50', '1.75', '2.00', '2.25', '2.50', '2.75', '3.00'])): ?>
                                                        bg-green-100 text-green-800
                                                    <?php elseif($row['grade_normalized'] === '5.00'): ?>
                                                        bg-red-100 text-red-800
                                                    <?php else: ?>
                                                        bg-yellow-100 text-yellow-800
                                                    <?php endif; ?>">
                                                    <?php echo e($row['grade_normalized']); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="text-gray-400">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <?php if($row['grade_error']): ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded">
                                                    Error
                                                </span>
                                            <?php elseif($row['grade_normalized']): ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">
                                                    ✓ Valid
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded">
                                                    Pending
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php if($row['grade_error']): ?>
                                        <tr class="bg-red-50">
                                            <td colspan="6" class="px-4 py-2 text-sm text-red-700">
                                                <strong>Error:</strong> <?php echo e($row['grade_error']); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                        <p class="text-sm text-blue-800">
                            Showing first <?php echo e(count($previewData)); ?> rows. Review the data above to ensure it's correct before proceeding.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t">
                        <a href="<?php echo e(route('chairperson.grade-import.back-to-mapping')); ?>" class="text-gray-700 hover:text-gray-900 font-medium">
                            ← Back to Mapping
                        </a>
                        <div class="flex gap-3">
                            <a href="<?php echo e(route('chairperson.grade-import.create')); ?>" 
                               class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-medium">
                                Cancel
                            </a>
                            <form method="POST" action="<?php echo e(route('chairperson.grade-import.process')); ?>" class="inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" 
                                        class="px-6 py-2 bg-gradient-to-r from-brand-deep to-brand-medium hover:from-brand-medium hover:to-brand-light text-white rounded-lg font-medium">
                                    Import Grades →
                                </button>
                            </form>
                        </div>
                    </div>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/chairperson/grades/import/preview.blade.php ENDPATH**/ ?>