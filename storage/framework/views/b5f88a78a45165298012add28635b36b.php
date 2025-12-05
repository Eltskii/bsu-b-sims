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
     <?php $__env->slot('title', null, []); ?> Student Report <?php $__env->endSlot(); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Student Master List Report')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Filters -->
                    <div class="mb-6">
                        <form method="GET" action="<?php echo e(route('reports.students')); ?>" class="flex gap-3">
                            <select name="program" class="border rounded px-3 py-2">
                                <option value="">All Programs</option>
                                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($program->id); ?>" <?php echo e(request('program') == $program->id ? 'selected' : ''); ?>>
                                        <?php echo e($program->code); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <select name="year_level" class="border rounded px-3 py-2">
                                <option value="">All Year Levels</option>
                                <option value="1st Year" <?php echo e(request('year_level') == '1st Year' ? 'selected' : ''); ?>>1st Year</option>
                                <option value="2nd Year" <?php echo e(request('year_level') == '2nd Year' ? 'selected' : ''); ?>>2nd Year</option>
                                <option value="3rd Year" <?php echo e(request('year_level') == '3rd Year' ? 'selected' : ''); ?>>3rd Year</option>
                                <option value="4th Year" <?php echo e(request('year_level') == '4th Year' ? 'selected' : ''); ?>>4th Year</option>
                            </select>
                            <select name="status" class="border rounded px-3 py-2">
                                <option value="">All Status</option>
                                <option value="Active" <?php echo e(request('status') == 'Active' ? 'selected' : ''); ?>>Active</option>
                                <option value="Graduated" <?php echo e(request('status') == 'Graduated' ? 'selected' : ''); ?>>Graduated</option>
                                <option value="Dropped" <?php echo e(request('status') == 'Dropped' ? 'selected' : ''); ?>>Dropped</option>
                            </select>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Filter
                            </button>
                            <button type="button" onclick="window.print()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                Print
                            </button>
                        </form>
                    </div>

                    <!-- Report Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student ID</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Program</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-4 py-2 text-sm"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-2 text-sm"><?php echo e($student->student_id); ?></td>
                                        <td class="px-4 py-2 text-sm"><?php echo e($student->last_name); ?>, <?php echo e($student->first_name); ?></td>
                                        <td class="px-4 py-2 text-sm"><?php echo e($student->program->code ?? 'N/A'); ?></td>
                                        <td class="px-4 py-2 text-sm"><?php echo e($student->year_level); ?></td>
                                        <td class="px-4 py-2 text-sm"><?php echo e($student->status); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                            No students found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-sm text-gray-600">
                        <p><strong>Total Students:</strong> <?php echo e($students->count()); ?></p>
                        <p><strong>Generated:</strong> <?php echo e(now()->format('F d, Y h:i A')); ?></p>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/reports/students.blade.php ENDPATH**/ ?>