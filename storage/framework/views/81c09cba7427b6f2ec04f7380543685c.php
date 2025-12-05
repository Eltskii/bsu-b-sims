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
     <?php $__env->slot('title', null, []); ?> Student Profile <?php $__env->endSlot(); ?>
    <div class="py-8 bg-gray-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <a href="<?php echo e(route('students.index')); ?>" 
                               class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back to Students
                            </a>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900">Student Profile</h1>
                        <p class="mt-1 text-sm text-gray-600">Complete student information and academic records</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="<?php echo e(route('students.subjects', $student)); ?>" 
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Manage Subjects
                        </a>
                        <a href="<?php echo e(route('students.edit', $student)); ?>" 
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto">
                <!-- Student Profile Header Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <!-- Header with Photo and GPA -->
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-6">
                                <?php if($student->photo_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $student->photo_path)); ?>" 
                                         alt="<?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>" 
                                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                                <?php else: ?>
                                    <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center border-4 border-white shadow-lg">
                                        <span class="text-4xl font-bold text-indigo-600"><?php echo e(substr($student->first_name, 0, 1)); ?><?php echo e(substr($student->last_name, 0, 1)); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h2 class="text-2xl font-bold text-white mb-1">
                                        <?php echo e($student->last_name); ?>, <?php echo e($student->first_name); ?> <?php echo e($student->middle_name ? substr($student->middle_name, 0, 1) . '.' : ''); ?> <?php echo e($student->suffix); ?>

                                    </h2>
                                    <div class="flex items-center gap-3 text-white/90">
                                        <span class="text-lg font-medium"><?php echo e($student->student_id); ?></span>
                                        <span class="text-white/60">•</span>
                                        <?php if($student->status == 'Active'): ?>
                                            <span class="inline-flex items-center px-3 py-1 bg-emerald-500 text-white text-sm font-semibold rounded-full">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                Active
                                            </span>
                                        <?php elseif($student->status == 'Graduated'): ?>
                                            <span class="inline-flex items-center px-3 py-1 bg-purple-400 text-white text-sm font-semibold rounded-full">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                                                </svg>
                                                Graduated
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-3 py-1 bg-white/20 text-white text-sm font-semibold rounded-full">
                                                <?php echo e($student->status); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if($student->gpa || $student->academic_standing): ?>
                            <div class="text-right">
                                <?php if($student->gpa): ?>
                                <div class="text-white/80 text-sm">GPA</div>
                                <div class="text-2xl font-bold text-white"><?php echo e(number_format($student->gpa, 2)); ?></div>
                                <?php endif; ?>
                                <?php if($student->academic_standing): ?>
                                <div class="mt-2">
                                    <span class="px-3 py-1 bg-white/20 text-white text-xs font-semibold rounded-full uppercase">
                                        <?php echo e(str_replace('_', ' ', $student->academic_standing)); ?>

                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tabbed Content -->
                    <div x-data="{ activeTab: 'personal' }" class="border-b border-gray-200">
                        <!-- Tab Navigation -->
                        <nav class="flex overflow-x-auto">
                            <button @click="activeTab = 'personal'" 
                                    :class="activeTab === 'personal' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="py-4 px-6 border-b-2 font-medium text-sm whitespace-nowrap">
                                Personal Information
                            </button>
                            <button @click="activeTab = 'contact'" 
                                    :class="activeTab === 'contact' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="py-4 px-6 border-b-2 font-medium text-sm whitespace-nowrap">
                                Contact & Family
                            </button>
                            <button @click="activeTab = 'academic'" 
                                    :class="activeTab === 'academic' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="py-4 px-6 border-b-2 font-medium text-sm whitespace-nowrap">
                                Academic Information
                            </button>
                            <button @click="activeTab = 'enrollments'" 
                                    :class="activeTab === 'enrollments' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="py-4 px-6 border-b-2 font-medium text-sm whitespace-nowrap">
                                Enrollment History
                            </button>
                        </nav>

                        <!-- Tab Content -->
                        <div class="p-8">
                            <!-- Personal Information Tab -->
                            <div x-show="activeTab === 'personal'" x-cloak>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Last Name</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->last_name); ?></p>
                                    </div>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">First Name</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->first_name); ?></p>
                                    </div>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Middle Name</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->middle_name ?? 'N/A'); ?></p>
                                    </div>
                                    <?php if($student->suffix): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Suffix</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->suffix); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->maiden_name): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Maiden Name</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->maiden_name); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Birthdate</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->birthdate ? $student->birthdate->format('F d, Y') : 'N/A'); ?></p>
                                    </div>
                                    <?php if($student->place_of_birth): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Place of Birth</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->place_of_birth); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Gender</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->gender); ?></p>
                                    </div>
                                    <?php if($student->citizenship): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Citizenship</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->citizenship); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->ethnicity_tribal_affiliation): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Ethnicity / Tribal Affiliation</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->ethnicity_tribal_affiliation); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Contact & Family Tab -->
                            <div x-show="activeTab === 'contact'" x-cloak>
                                <!-- Student Contact -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Student Contact</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Contact Number</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->contact_number ?? 'N/A'); ?></p>
                                        </div>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Email Address</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->email_address ?? $student->email ?? 'N/A'); ?></p>
                                        </div>
                                        <?php if($student->home_address): ?>
                                        <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Home Address</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->home_address); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($student->address_while_studying): ?>
                                        <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Address While Studying</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->address_while_studying); ?></p>
                                        </div>
                                        <?php elseif($student->address): ?>
                                        <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Address</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->address); ?></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Parent Information -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Parent Information</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Mother's Name</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->mother_name ?? 'N/A'); ?></p>
                                        </div>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Mother's Contact Number</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->mother_contact_number ?? 'N/A'); ?></p>
                                        </div>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Father's Name</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->father_name ?? 'N/A'); ?></p>
                                        </div>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Father's Contact Number</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->father_contact_number ?? 'N/A'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Emergency Contact -->
                                <?php if($student->emergency_contact_person): ?>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Emergency Contact</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Contact Person</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_person); ?></p>
                                        </div>
                                        <?php if($student->emergency_contact_relationship): ?>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Relationship</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_relationship); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($student->emergency_contact_number): ?>
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Contact Number</p>
                                            <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_number); ?></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Academic Information Tab -->
                            <div x-show="activeTab === 'academic'" x-cloak>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Program</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->program->name ?? 'N/A'); ?></p>
                                        <?php if($student->program): ?>
                                            <p class="text-sm text-gray-600 mt-1"><?php echo e($student->program->code); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Year Level</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->year_level); ?></p>
                                    </div>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Status</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->status); ?></p>
                                    </div>
                                    <?php if($student->student_type): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Student Type</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->student_type); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->degree): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Degree</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->degree); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->major): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Major</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->major); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->section): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Section</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->section); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->attendance_type): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Attendance Type</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->attendance_type); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->curriculum_used): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Curriculum Used</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->curriculum_used); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Enrollment Date</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->enrollment_date ? $student->enrollment_date->format('F d, Y') : 'N/A'); ?></p>
                                    </div>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Academic Year</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->academicYear->year_code ?? 'N/A'); ?></p>
                                    </div>
                                    <?php if($student->total_units_enrolled): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Total Units Enrolled</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->total_units_enrolled); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->free_higher_education_benefit): ?>
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Free Higher Education Benefit</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->free_higher_education_benefit); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->gpa): ?>
                                    <div class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg">
                                        <p class="text-xs font-medium text-indigo-700 uppercase tracking-wider mb-1">GPA</p>
                                        <p class="text-2xl font-bold text-indigo-900"><?php echo e(number_format($student->gpa, 2)); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($student->academic_standing): ?>
                                    <div class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg">
                                        <p class="text-xs font-medium text-indigo-700 uppercase tracking-wider mb-1">Academic Standing</p>
                                        <p class="text-base font-bold text-indigo-900 uppercase"><?php echo e(str_replace('_', ' ', $student->academic_standing)); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <?php if($student->notes): ?>
                                <div class="mt-6 p-4 bg-amber-50 border-l-4 border-amber-400 rounded-r-lg">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <p class="text-xs font-medium text-amber-800 uppercase tracking-wider mb-1">Notes</p>
                                            <p class="text-sm text-amber-900"><?php echo e($student->notes); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Enrollment History Tab -->
                            <div x-show="activeTab === 'enrollments'" x-cloak>
                                <?php if($enrolledSubjects->count() > 0): ?>
                                    <?php $__currentLoopData = $enrolledSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yearLevel => $enrollments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="mb-6">
                                            <div class="flex items-center mb-3">
                                                <div class="flex-1 border-t border-gray-300"></div>
                                                <span class="px-3 text-sm font-bold text-gray-600 uppercase"><?php echo e($yearLevel); ?></span>
                                                <div class="flex-1 border-t border-gray-300"></div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                <?php $__currentLoopData = $enrollments->groupBy('subject.semester'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $semesterEnrollments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <div class="text-xs font-semibold text-gray-500 mb-2"><?php echo e($semester); ?></div>
                                                        <?php $__currentLoopData = $semesterEnrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($enrollment->subject): ?>
                                                            <div class="mb-2 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                                                <div class="flex justify-between items-start">
                                                                    <div class="flex-1">
                                                                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                                                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded">
                                                                                <?php echo e($enrollment->subject->code); ?>

                                                                            </span>
                                                                            <span class="text-xs text-gray-600"><?php echo e($enrollment->subject->units); ?> units</span>
                                                                            <?php if($enrollment->academicYear): ?>
                                                                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded">
                                                                                    <?php echo e($enrollment->academicYear->year_code); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <h4 class="font-medium text-sm text-gray-900"><?php echo e($enrollment->subject->name); ?></h4>
                                                                        
                                                                        <div class="flex items-center gap-2 mt-1">
                                                                            <span class="px-2 py-1 text-xs rounded-full
                                                                                <?php if($enrollment->status == 'Enrolled'): ?> bg-yellow-100 text-yellow-800
                                                                                <?php elseif($enrollment->status == 'Completed'): ?> bg-green-100 text-green-800
                                                                                <?php elseif($enrollment->status == 'Failed'): ?> bg-red-100 text-red-800
                                                                                <?php else: ?> bg-gray-100 text-gray-800 <?php endif; ?>">
                                                                                <?php echo e($enrollment->status); ?>

                                                                            </span>
                                                                            <?php if($enrollment->grade): ?>
                                                                                <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded">
                                                                                    Grade: <?php echo e($enrollment->grade); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <!-- Summary -->
                                    <div class="mt-6 pt-4 border-t border-gray-200">
                                        <div class="grid grid-cols-3 gap-4 text-center">
                                            <div>
                                                <p class="text-sm text-gray-600">Total Subjects</p>
                                                <p class="text-2xl font-bold text-gray-900"><?php echo e($enrolledSubjects->flatten()->count()); ?></p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Total Units</p>
                                                <p class="text-2xl font-bold text-indigo-600"><?php echo e($enrolledSubjects->flatten()->sum('subject.units')); ?></p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Currently Enrolled</p>
                                                <p class="text-2xl font-bold text-green-600"><?php echo e($enrolledSubjects->flatten()->where('status', 'Enrolled')->count()); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-12 text-gray-500">
                                        <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        <p class="text-sm font-medium mb-2">No Enrolled Subjects</p>
                                        <p class="text-xs mb-4">This student hasn't been enrolled in any subjects yet.</p>
                                        <a href="<?php echo e(route('students.subjects', $student)); ?>" class="text-sm text-emerald-600 hover:text-emerald-800 font-medium">
                                            Enroll in Subjects →
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/students/show.blade.php ENDPATH**/ ?>