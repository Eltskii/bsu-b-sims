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
                <?php echo e(__('Subject Enrollment')); ?> - <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

            </h2>
            <a href="<?php echo e(route('students.show', $student)); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back to Student
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Student Info Card -->
            <div class="mb-6 bg-gradient-to-r from-indigo-50 to-purple-50 border-l-4 border-indigo-500 p-6 rounded-xl shadow-sm">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-indigo-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="font-semibold text-gray-800"><?php echo e($student->program->name ?? 'N/A'); ?></h3>
                        <p class="text-sm text-gray-600 mt-1"><?php echo e($student->year_level); ?> · <?php echo e($student->student_id); ?></p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Available Subjects -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                        <h3 class="font-bold text-white text-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Available Subjects (<?php echo e($availableSubjects->count()); ?>)
                        </h3>
                    </div>
                    <div class="p-6">
                        <?php $__empty_1 = true; $__currentLoopData = $availableSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php
                                            $isEnrolled = $enrolledSubjects->contains(function($enrollment) use ($subject) {
                                                return $enrollment->subject_id === $subject->id;
                                            });
                                        ?>
                                        
                                        <div class="mb-4 p-4 border-2 border-gray-200 rounded-xl hover:border-indigo-300 transition-colors duration-200">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-2 mb-1 flex-wrap">
                                                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded">
                                                            <?php echo e($subject->code); ?>

                                                        </span>
                                                        <span class="text-xs text-gray-500"><?php echo e($subject->units); ?> units</span>
                                                    </div>
                                                    <h4 class="font-semibold text-gray-900 mb-1"><?php echo e($subject->name); ?></h4>
                                                    <?php if($subject->description): ?>
                                                        <p class="text-sm text-gray-600 mb-2"><?php echo e($subject->description); ?></p>
                                                    <?php endif; ?>
                                                    <p class="text-xs text-gray-500"><?php echo e($subject->semester); ?></p>
                                                </div>
                                                
                                                <?php if($isEnrolled): ?>
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                                                        Enrolled
                                                    </span>
                                                <?php else: ?>
                                                    <form method="POST" action="<?php echo e(route('students.subjects.enroll', $student)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="subject_id" value="<?php echo e($subject->id); ?>">
                                                        <button type="submit" 
                                                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors duration-200">
                                                            Enroll
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">No Subjects Available</h3>
                                <p class="text-gray-500 text-sm">No subjects found for <?php echo e($student->program->name); ?> - <?php echo e($student->year_level); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Enrolled Subjects -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4">
                        <h3 class="font-bold text-white text-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Enrolled Subjects (<?php echo e($enrolledSubjects->count()); ?>)
                        </h3>
                    </div>
                    <div class="p-6">
                        <?php $__empty_1 = true; $__currentLoopData = $enrolledSubjects->groupBy('subject.year_level'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yearLevel => $enrollments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!-- Year Level Header -->
                            <div class="mb-4">
                                <div class="flex items-center mb-3">
                                    <div class="flex-1 border-t border-gray-300"></div>
                                    <span class="px-3 text-sm font-bold text-gray-600 uppercase"><?php echo e($yearLevel); ?></span>
                                    <div class="flex-1 border-t border-gray-300"></div>
                                </div>

                                <?php $__currentLoopData = $enrollments->groupBy('subject.semester'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $semesterEnrollments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Semester Subheader -->
                                    <div class="mb-2 ml-2">
                                        <span class="text-xs font-semibold text-gray-500"><?php echo e($semester); ?></span>
                                    </div>

                                <?php $__currentLoopData = $semesterEnrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($enrollment->subject): ?>
                                        <div class="mb-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-2 mb-1 flex-wrap">
                                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded">
                                                            <?php echo e($enrollment->subject->code); ?>

                                                        </span>
                                                        <span class="text-xs text-gray-600"><?php echo e($enrollment->subject->units); ?> units</span>
                                                        <?php if($enrollment->academicYear): ?>
                                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded">
                                                                <?php echo e($enrollment->academicYear->year_code); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                        <span class="px-2 py-1 text-xs rounded-full
                                                            <?php if($enrollment->status == 'Enrolled'): ?> bg-yellow-100 text-yellow-800
                                                            <?php elseif($enrollment->status == 'Completed'): ?> bg-green-100 text-green-800
                                                            <?php elseif($enrollment->status == 'Failed'): ?> bg-red-100 text-red-800
                                                            <?php else: ?> bg-gray-100 text-gray-800 <?php endif; ?>">
                                                            <?php echo e($enrollment->status); ?>

                                                        </span>
                                                    </div>
                                                    <h4 class="font-semibold text-gray-900 mb-1"><?php echo e($enrollment->subject->name); ?></h4>
                                                    
                                                    <?php if($enrollment->grade): ?>
                                                        <div class="mt-2">
                                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded">
                                                                Grade: <?php echo e($enrollment->grade); ?>

                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <?php if($enrollment->status == 'Enrolled'): ?>
                                                    <form method="POST" action="<?php echo e(route('students.subjects.drop', [$student, $enrollment])); ?>" 
                                                          onsubmit="return confirm('Are you sure you want to drop this subject?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" 
                                                                class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 text-sm font-semibold rounded-lg transition-colors duration-200">
                                                            Drop
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Not Enrolled Yet</h3>
                                <p class="text-gray-500 text-sm">Enroll in subjects from the left panel</p>
                            </div>
                        <?php endif; ?>

                        <?php if($enrolledSubjects->count() > 0): ?>
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-gray-700">Total Units Enrolled:</span>
                                    <span class="text-2xl font-bold text-indigo-600">
                                        <?php echo e($enrolledSubjects->where('status', 'Enrolled')->sum(function($e) { return $e->subject->units; })); ?>

                                    </span>
                                </div>
                                <?php if($currentAcademicYear): ?>
                                    <p class="text-xs text-gray-500 text-center mt-2">Current Academic Year: <?php echo e($currentAcademicYear->year_code); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/students/subjects.blade.php ENDPATH**/ ?>