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
     <?php $__env->slot('title', null, []); ?> Year Levels Report <?php $__env->endSlot(); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Students by Year Level Report')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex justify-between items-center no-print">
                        <h3 class="text-lg font-semibold">Students Grouped by Year Level</h3>
                        <button type="button" onclick="window.print()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            Print Report
                        </button>
                    </div>

                    <?php $__currentLoopData = $studentsByYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yearLevel => $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-8">
                            <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 mb-3">
                                <h4 class="font-bold text-lg"><?php echo e($yearLevel); ?></h4>
                                <p class="text-sm text-gray-600">Total Students: <?php echo e($students->count()); ?></p>
                            </div>

                            <?php if($students->count() > 0): ?>
                                <table class="min-w-full divide-y divide-gray-200 mb-4">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Student ID</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Program</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="px-4 py-2 text-sm"><?php echo e($student->student_id); ?></td>
                                                <td class="px-4 py-2 text-sm"><?php echo e($student->last_name); ?>, <?php echo e($student->first_name); ?></td>
                                                <td class="px-4 py-2 text-sm"><?php echo e($student->program->code ?? 'N/A'); ?></td>
                                                <td class="px-4 py-2 text-sm"><?php echo e($student->status); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-gray-500 italic ml-4">No students in this year level.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-6 pt-4 border-t text-sm text-gray-600">
                        <p><strong>Total Students:</strong> <?php echo e(collect($studentsByYear)->flatten()->count()); ?></p>
                        <p><strong>Generated:</strong> <?php echo e(now()->format('F d, Y h:i A')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/reports/year-levels.blade.php ENDPATH**/ ?>