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
            <div>
                <a href="<?php echo e(route('chairperson.grades.index', ['view' => 'students'])); ?>" class="text-gray-500 hover:text-gray-700 text-sm">
                    ← Back to Students
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-1">
                    <?php echo e($student->last_name); ?>, <?php echo e($student->first_name); ?> <?php echo e($student->middle_name); ?>

                </h2>
            </div>
            <div class="text-right text-sm text-gray-600">
                <div><strong>Student ID:</strong> <?php echo e($student->student_id); ?></div>
                <div><strong>Program:</strong> <?php echo e($student->program->code ?? 'N/A'); ?> - <?php echo e($student->year_level); ?></div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <?php if(session('success')): ?>
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Enrolled Subjects & Grades</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-brand-deep to-brand-medium text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Subject Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Subject Name</th>
                                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Units</th>
                                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Current Grade</th>
                                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <?php echo e($enrollment->subject->code); ?>

                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <?php echo e($enrollment->subject->name); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                            <?php echo e($enrollment->subject->units); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <?php if($enrollment->grade !== null): ?>
                                                <?php if(is_numeric($enrollment->grade)): ?>
                                                    <span class="text-lg font-bold text-brand-deep"><?php echo e(number_format($enrollment->grade, 2)); ?></span>
                                                <?php else: ?>
                                                    <span class="text-lg font-bold text-orange-600"><?php echo e($enrollment->grade); ?></span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="text-gray-400 italic">No grade</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium
                                                <?php if($enrollment->status == 'Enrolled'): ?> bg-blue-100 text-blue-800
                                                <?php elseif($enrollment->status == 'Completed'): ?> bg-green-100 text-green-800
                                                <?php elseif($enrollment->status == 'Failed'): ?> bg-red-100 text-red-800
                                                <?php else: ?> bg-gray-100 text-gray-800 <?php endif; ?>">
                                                <?php echo e($enrollment->status); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                            <a href="<?php echo e(route('chairperson.grades.edit', $enrollment)); ?>" 
                                               class="text-brand-deep hover:text-brand-medium font-medium">
                                                <?php echo e($enrollment->grade !== null ? 'Edit' : 'Enter Grade'); ?>

                                            </a>
                                            <?php if($enrollment->gradeHistories()->count() > 0): ?>
                                                <a href="<?php echo e(route('chairperson.grades.history', $enrollment)); ?>" 
                                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                                    History
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary -->
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-bold text-brand-deep"><?php echo e($enrollments->count()); ?></div>
                                <div class="text-sm text-gray-600">Total Subjects</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-600"><?php echo e($enrollments->whereNotNull('grade')->count()); ?></div>
                                <div class="text-sm text-gray-600">Graded</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-yellow-600"><?php echo e($enrollments->whereNull('grade')->count()); ?></div>
                                <div class="text-sm text-gray-600">Pending</div>
                            </div>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/chairperson/grades/student.blade.php ENDPATH**/ ?>