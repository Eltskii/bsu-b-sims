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
                <?php echo e(__('Enter Grade')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Student and Enrollment Information -->
                    <div class="mb-8 grid grid-cols-2 gap-6">
                        <div class="border-l-4 border-brand-deep pl-4">
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Student ID</p>
                            <p class="text-lg font-semibold text-gray-800"><?php echo e($enrollment->student->student_id); ?></p>
                        </div>
                        <div class="border-l-4 border-brand-medium pl-4">
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Student Name</p>
                            <p class="text-lg font-semibold text-gray-800">
                                <?php echo e($enrollment->student->last_name); ?>, <?php echo e($enrollment->student->first_name); ?>

                            </p>
                        </div>
                        <div class="border-l-4 border-green-600 pl-4">
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Subject</p>
                            <p class="text-lg font-semibold text-gray-800">
                                <?php echo e($enrollment->subject->code); ?>: <?php echo e($enrollment->subject->name); ?>

                            </p>
                        </div>
                        <div class="border-l-4 border-blue-600 pl-4">
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Academic Year</p>
                            <p class="text-lg font-semibold text-gray-800">
                                <?php if($enrollment->academicYear): ?>
                                    <?php echo e($enrollment->academicYear->year_code); ?> (<?php echo e($enrollment->academicYear->semester); ?>)
                                <?php else: ?>
                                    <span class="text-gray-400">Not Set</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Grade Entry Form -->
                    <form method="POST" action="<?php echo e(route('chairperson.grades.update', $enrollment)); ?>" class="mt-8">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- Grade Conversion Reference -->
                        <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm font-medium text-blue-800 mb-2">Philippine Grading Scale:</p>
                            <div class="grid grid-cols-5 gap-2 text-xs text-blue-700">
                                <span>96-100 = 1.00</span>
                                <span>93-95 = 1.25</span>
                                <span>90-92 = 1.50</span>
                                <span>87-89 = 1.75</span>
                                <span>84-86 = 2.00</span>
                                <span>81-83 = 2.25</span>
                                <span>78-80 = 2.50</span>
                                <span>75-77 = 2.75</span>
                                <span>74 = 3.00</span>
                                <span class="text-red-600">Below 74 = 5.00</span>
                            </div>
                        </div>

                        <!-- Grade Input -->
                        <div class="mb-6">
                            <label for="grade" class="block text-sm font-medium text-gray-700 mb-2">
                                Grade (1.00 - 5.00) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select id="grade" 
                                        name="grade"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm 
                                               focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">-- Select Grade --</option>
                                    <optgroup label="Passing Grades">
                                        <option value="1.00" <?php echo e(old('grade', $enrollment->grade) == '1.00' ? 'selected' : ''); ?>>1.00 - Excellent (96-100)</option>
                                        <option value="1.25" <?php echo e(old('grade', $enrollment->grade) == '1.25' ? 'selected' : ''); ?>>1.25 - Excellent (93-95)</option>
                                        <option value="1.50" <?php echo e(old('grade', $enrollment->grade) == '1.50' ? 'selected' : ''); ?>>1.50 - Very Good (90-92)</option>
                                        <option value="1.75" <?php echo e(old('grade', $enrollment->grade) == '1.75' ? 'selected' : ''); ?>>1.75 - Very Good (87-89)</option>
                                        <option value="2.00" <?php echo e(old('grade', $enrollment->grade) == '2.00' ? 'selected' : ''); ?>>2.00 - Good (84-86)</option>
                                        <option value="2.25" <?php echo e(old('grade', $enrollment->grade) == '2.25' ? 'selected' : ''); ?>>2.25 - Good (81-83)</option>
                                        <option value="2.50" <?php echo e(old('grade', $enrollment->grade) == '2.50' ? 'selected' : ''); ?>>2.50 - Satisfactory (78-80)</option>
                                        <option value="2.75" <?php echo e(old('grade', $enrollment->grade) == '2.75' ? 'selected' : ''); ?>>2.75 - Satisfactory (75-77)</option>
                                        <option value="3.00" <?php echo e(old('grade', $enrollment->grade) == '3.00' ? 'selected' : ''); ?>>3.00 - Passing (74)</option>
                                    </optgroup>
                                    <optgroup label="Special Grades">
                                        <option value="IP" <?php echo e(old('grade', $enrollment->grade) == 'IP' ? 'selected' : ''); ?>>IP - In Progress</option>
                                        <option value="INC" <?php echo e(old('grade', $enrollment->grade) == 'INC' ? 'selected' : ''); ?>>INC - Incomplete</option>
                                    </optgroup>
                                    <optgroup label="Failing Grade">
                                        <option value="5.00" <?php echo e(old('grade', $enrollment->grade) == '5.00' ? 'selected' : ''); ?>>5.00 - Failed (Below 74)</option>
                                    </optgroup>
                                </select>
                                <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Current Grade: <strong><?php echo e($enrollment->grade ? (is_numeric($enrollment->grade) ? number_format($enrollment->grade, 2) : $enrollment->grade) : 'Not set'); ?></strong></p>
                        </div>

                        <!-- Remarks -->
                        <div class="mb-6">
                            <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">
                                Remarks (Optional)
                            </label>
                            <textarea id="remarks" 
                                      name="remarks" 
                                      rows="3"
                                      class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm 
                                             focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      placeholder="Add any comments or notes about this grade"><?php echo e(old('remarks', $enrollment->remarks)); ?></textarea>
                            <?php $__errorArgs = ['remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Reason for Change -->
                        <div class="mb-6">
                            <label for="reason" class="block text-sm font-medium text-gray-700 mb-2">
                                Reason for Entry/Modification <span class="text-red-500">*</span>
                            </label>
                            <select id="reason" 
                                    name="reason"
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm 
                                           focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">-- Select a reason --</option>
                                <option value="Initial Entry" <?php echo e(old('reason') == 'Initial Entry' ? 'selected' : ''); ?>>Initial Grade Entry</option>
                                <option value="Correction" <?php echo e(old('reason') == 'Correction' ? 'selected' : ''); ?>>Grade Correction</option>
                                <option value="Re-evaluation" <?php echo e(old('reason') == 'Re-evaluation' ? 'selected' : ''); ?>>Re-evaluation</option>
                                <option value="Grade Appeal" <?php echo e(old('reason') == 'Grade Appeal' ? 'selected' : ''); ?>>Grade Appeal Resolution</option>
                                <option value="Other" <?php echo e(old('reason') == 'Other' ? 'selected' : ''); ?>>Other</option>
                            </select>
                            <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Grade History -->
                        <?php if($enrollment->gradeHistories->count() > 0): ?>
                            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-sm font-medium text-gray-700 mb-3">Previous Changes:</p>
                                <div class="space-y-2 max-h-40 overflow-y-auto">
                                    <?php $__currentLoopData = $enrollment->gradeHistories->sortByDesc('created_at')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="text-sm">
                                            <span class="text-gray-600">
                                                <?php echo e($history->old_grade ? (is_numeric($history->old_grade) ? number_format($history->old_grade, 2) : $history->old_grade) : 'N/A'); ?> 
                                                <span class="text-gray-400">→</span> 
                                                <?php echo e(is_numeric($history->new_grade) ? number_format($history->new_grade, 2) : $history->new_grade); ?>

                                            </span>
                                            <span class="text-xs text-gray-500 ml-2">(<?php echo e($history->reason); ?>)</span>
                                            <span class="text-xs text-gray-400 ml-2"><?php echo e($history->created_at->format('M d, Y H:i')); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center pt-6 border-t">
                            <a href="<?php echo e(route('chairperson.grades.index')); ?>" 
                               class="text-gray-700 hover:text-gray-900 font-medium">
                                ← Back to Grades
                            </a>
                            <div class="flex gap-3">
                                <a href="<?php echo e(route('chairperson.grades.index')); ?>" 
                                   class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-medium">
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-6 py-2 bg-gradient-to-r from-brand-deep to-brand-medium hover:from-brand-medium hover:to-brand-light text-white rounded-lg font-medium">
                                    Save Grade
                                </button>
                            </div>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/chairperson/grades/edit.blade.php ENDPATH**/ ?>