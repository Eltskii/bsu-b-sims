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
     <?php $__env->slot('title', null, []); ?> Edit Academic Year <?php $__env->endSlot(); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Edit Academic Year')); ?>: <?php echo e($academicYear->year_code); ?>

            </h2>
            <a href="<?php echo e(route('academic-years.index')); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back to List
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="<?php echo e(route('academic-years.update', $academicYear)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Year Code and Semester Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Year Code -->
                            <div>
                                <label for="year_code" class="block text-sm font-medium text-gray-700 mb-2">Year Code *</label>
                                <input type="text" name="year_code" id="year_code" placeholder="e.g., 2024-2025-1" value="<?php echo e(old('year_code', $academicYear->year_code)); ?>" required
                                       class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['year_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['year_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Semester -->
                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">Semester *</label>
                                <select name="semester" id="semester" required class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">Select Semester</option>
                                    <option value="1st Semester" <?php echo e(old('semester', $academicYear->semester) == '1st Semester' ? 'selected' : ''); ?>>1st Semester</option>
                                    <option value="2nd Semester" <?php echo e(old('semester', $academicYear->semester) == '2nd Semester' ? 'selected' : ''); ?>>2nd Semester</option>
                                    <option value="Summer" <?php echo e(old('semester', $academicYear->semester) == 'Summer' ? 'selected' : ''); ?>>Summer</option>
                                </select>
                                <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Main Dates Section -->
                        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded">
                            <h3 class="font-semibold text-gray-800 mb-4">Semester Dates</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date *</label>
                                    <input type="date" name="start_date" id="start_date" value="<?php echo e(old('start_date', $academicYear->start_date ? \Carbon\Carbon::parse($academicYear->start_date)->format('Y-m-d') : '')); ?>" required
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date *</label>
                                    <input type="date" name="end_date" id="end_date" value="<?php echo e(old('end_date', $academicYear->end_date ? \Carbon\Carbon::parse($academicYear->end_date)->format('Y-m-d') : '')); ?>" required
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Registration Period Section -->
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded">
                            <h3 class="font-semibold text-gray-800 mb-4">Registration Period</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="registration_start_date" class="block text-sm font-medium text-gray-700 mb-2">Registration Start</label>
                                    <input type="date" name="registration_start_date" id="registration_start_date" value="<?php echo e(old('registration_start_date', $academicYear->registration_start_date ? \Carbon\Carbon::parse($academicYear->registration_start_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['registration_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['registration_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="registration_end_date" class="block text-sm font-medium text-gray-700 mb-2">Registration End</label>
                                    <input type="date" name="registration_end_date" id="registration_end_date" value="<?php echo e(old('registration_end_date', $academicYear->registration_end_date ? \Carbon\Carbon::parse($academicYear->registration_end_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['registration_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['registration_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="add_drop_deadline" class="block text-sm font-medium text-gray-700 mb-2">Add/Drop Deadline</label>
                                    <input type="date" name="add_drop_deadline" id="add_drop_deadline" value="<?php echo e(old('add_drop_deadline', $academicYear->add_drop_deadline ? \Carbon\Carbon::parse($academicYear->add_drop_deadline)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['add_drop_deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['add_drop_deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Classes Period Section -->
                        <div class="mb-6 p-4 bg-purple-50 border border-purple-200 rounded">
                            <h3 class="font-semibold text-gray-800 mb-4">Classes Period</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="classes_start_date" class="block text-sm font-medium text-gray-700 mb-2">Classes Start</label>
                                    <input type="date" name="classes_start_date" id="classes_start_date" value="<?php echo e(old('classes_start_date', $academicYear->classes_start_date ? \Carbon\Carbon::parse($academicYear->classes_start_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['classes_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['classes_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="classes_end_date" class="block text-sm font-medium text-gray-700 mb-2">Classes End</label>
                                    <input type="date" name="classes_end_date" id="classes_end_date" value="<?php echo e(old('classes_end_date', $academicYear->classes_end_date ? \Carbon\Carbon::parse($academicYear->classes_end_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['classes_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['classes_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Midterm Period Section -->
                        <div class="mb-6 p-4 bg-orange-50 border border-orange-200 rounded">
                            <h3 class="font-semibold text-gray-800 mb-4">Midterm Period</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="midterm_start_date" class="block text-sm font-medium text-gray-700 mb-2">Midterm Start</label>
                                    <input type="date" name="midterm_start_date" id="midterm_start_date" value="<?php echo e(old('midterm_start_date', $academicYear->midterm_start_date ? \Carbon\Carbon::parse($academicYear->midterm_start_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['midterm_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['midterm_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="midterm_end_date" class="block text-sm font-medium text-gray-700 mb-2">Midterm End</label>
                                    <input type="date" name="midterm_end_date" id="midterm_end_date" value="<?php echo e(old('midterm_end_date', $academicYear->midterm_end_date ? \Carbon\Carbon::parse($academicYear->midterm_end_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['midterm_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['midterm_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Exam Period Section -->
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded">
                            <h3 class="font-semibold text-gray-800 mb-4">Exam Period</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="exam_start_date" class="block text-sm font-medium text-gray-700 mb-2">Exam Start</label>
                                    <input type="date" name="exam_start_date" id="exam_start_date" value="<?php echo e(old('exam_start_date', $academicYear->exam_start_date ? \Carbon\Carbon::parse($academicYear->exam_start_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['exam_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['exam_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="exam_end_date" class="block text-sm font-medium text-gray-700 mb-2">Exam End</label>
                                    <input type="date" name="exam_end_date" id="exam_end_date" value="<?php echo e(old('exam_end_date', $academicYear->exam_end_date ? \Carbon\Carbon::parse($academicYear->exam_end_date)->format('Y-m-d') : '')); ?>"
                                           class="w-full border rounded px-3 py-2 <?php $__errorArgs = ['exam_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['exam_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                                Update Academic Year
                            </button>
                            <a href="<?php echo e(route('academic-years.index')); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded">
                                Cancel
                            </a>
                        </div>
                    </form>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/academic-years/edit.blade.php ENDPATH**/ ?>