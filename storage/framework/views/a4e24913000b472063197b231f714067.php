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
     <?php $__env->slot('title', null, []); ?> Students <?php $__env->endSlot(); ?>
    <div class="py-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Students Management</h1>
                        <p class="mt-1 text-sm text-gray-600">Manage and track student records and enrollment</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="<?php echo e(route('students.import.form')); ?>" 
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Import CSV
                        </a>
                        <a href="<?php echo e(route('students.create')); ?>" 
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Student
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <?php
                    $totalStudents = $students->count();
                    $activeStudents = $students->where('status', 'Active')->count();
                    $graduatedStudents = $students->where('status', 'Graduated')->count();
                    $irregularStudents = $students->where('is_irregular', true)->count();
                ?>
                
                <!-- Total Students -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-indigo-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Students</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($totalStudents); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Students -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-emerald-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Active Students</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($activeStudents); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graduated -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Graduated</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($graduatedStudents); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Irregular Students -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-amber-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Irregular</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($irregularStudents); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <!-- Search and Filter Section -->
                    <div class="mb-6 space-y-4">
                        <!-- Top Row: Search + Dropdowns -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <!-- Search Bar -->
                            <div class="relative w-full sm:w-80">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="searchInput" 
                                       placeholder="Search student ID or name" 
                                       class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" 
                                       autocomplete="off">
                            </div>
                            
                            <!-- Program Filter -->
                            <select id="programFilter" 
                                    class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent min-w-[140px]">
                                <option value="">All Programs</option>
                                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($program->code); ?>"><?php echo e($program->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                            <!-- Year Level Filter -->
                            <select id="yearLevelFilter" 
                                    class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent min-w-[130px]">
                                <option value="">All Years</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                        
                        <!-- Bottom Row: Status Tags + Results -->
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="text-sm font-medium text-gray-700">Status:</span>
                            <div class="flex flex-wrap gap-2">
                                <button data-status="" class="status-tag px-4 py-1.5 text-sm font-medium rounded-lg transition-all border-2 border-gray-200 bg-white text-gray-700 hover:border-gray-300 active">
                                    All
                                </button>
                                <button data-status="Active" class="status-tag px-4 py-1.5 text-sm font-medium rounded-lg transition-all border-2 border-emerald-200 bg-emerald-50 text-emerald-700 hover:border-emerald-300">
                                    Active
                                </button>
                                <button data-status="Graduated" class="status-tag px-4 py-1.5 text-sm font-medium rounded-lg transition-all border-2 border-purple-200 bg-purple-50 text-purple-700 hover:border-purple-300">
                                    Graduated
                                </button>
                                <button data-status="On Leave" class="status-tag px-4 py-1.5 text-sm font-medium rounded-lg transition-all border-2 border-amber-200 bg-amber-50 text-amber-700 hover:border-amber-300">
                                    On Leave
                                </button>
                                <button data-status="Dropped" class="status-tag px-4 py-1.5 text-sm font-medium rounded-lg transition-all border-2 border-red-200 bg-red-50 text-red-700 hover:border-red-300">
                                    Dropped
                                </button>
                            </div>
                            <div class="ml-auto text-sm text-gray-600">
                                <span id="resultCount" class="font-semibold text-indigo-600"><?php echo e($students->count()); ?></span> students
                            </div>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Student ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Program</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Year Level</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900"><?php echo e($student->student_id); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <?php if($student->photo_path): ?>
                                                    <img src="<?php echo e(asset('storage/' . $student->photo_path)); ?>" 
                                                         alt="<?php echo e($student->first_name); ?>" 
                                                         class="w-10 h-10 rounded-full object-cover mr-3 border-2 border-gray-200">
                                                <?php else: ?>
                                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center mr-3">
                                                        <span class="text-white font-semibold text-sm"><?php echo e(substr($student->first_name, 0, 1)); ?><?php echo e(substr($student->last_name, 0, 1)); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900"><?php echo e($student->last_name); ?>, <?php echo e($student->first_name); ?></div>
                                                    <?php if($student->email_address): ?>
                                                        <div class="text-xs text-gray-500"><?php echo e($student->email_address); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full">
                                                <?php echo e($student->program->code ?? 'N/A'); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo e($student->year_level); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($student->status == 'Active'): ?>
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-emerald-100 text-emerald-800 rounded-full">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Active
                                                </span>
                                            <?php elseif($student->status == 'Graduated'): ?>
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-800 rounded-full">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                                    </svg>
                                                    Graduated
                                                </span>
                                            <?php elseif($student->status == 'Dropped'): ?>
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dropped
                                                </span>
                                            <?php elseif($student->status == 'On Leave'): ?>
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-amber-100 text-amber-800 rounded-full">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    On Leave
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full">
                                                    <?php echo e($student->status); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <!-- View Button -->
                                                <a href="<?php echo e(route('students.show', $student)); ?>" 
                                                   class="inline-flex items-center p-2 text-indigo-600 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200 group" 
                                                   title="View Details">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                
                                                <!-- Subjects Button -->
                                                <a href="<?php echo e(route('students.subjects', $student)); ?>" 
                                                   class="inline-flex items-center p-2 text-emerald-600 hover:text-white hover:bg-emerald-600 rounded-lg transition-all duration-200 group" 
                                                   title="Manage Subjects">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                    </svg>
                                                </a>
                                                
                                                <!-- Edit Button -->
                                                <a href="<?php echo e(route('students.edit', $student)); ?>" 
                                                   class="inline-flex items-center p-2 text-blue-600 hover:text-white hover:bg-blue-600 rounded-lg transition-all duration-200 group" 
                                                   title="Edit Student">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                
                                                <!-- Delete Button -->
                                                <form action="<?php echo e(route('students.destroy', $student)); ?>" method="POST" class="inline" onsubmit="return confirm('⚠️ Are you sure you want to delete this student?\n\nThis action cannot be undone and will remove all associated records.');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" 
                                                            class="inline-flex items-center p-2 text-red-600 hover:text-white hover:bg-red-600 rounded-lg transition-all duration-200 group" 
                                                            title="Delete Student">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                                <p class="text-lg font-medium text-gray-900 mb-2">No students found</p>
                                                <p class="text-sm text-gray-500 mb-6">Get started by adding your first student or importing from CSV</p>
                                                <div class="flex gap-3">
                                                    <a href="<?php echo e(route('students.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Add Student
                                                    </a>
                                                    <a href="<?php echo e(route('students.import.form')); ?>" class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200">
                                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                                        </svg>
                                                        Import CSV
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <style>
        .status-tag.active {
            box-shadow: 0 0 0 2px currentColor;
            font-weight: 600;
        }
    </style>
    
    <script>
    $(document).ready(function() {
        let currentStatusFilter = '';
        
        function filterTable() {
            const searchTerm = $('#searchInput').val().toLowerCase();
            const programFilter = $('#programFilter').val().toLowerCase();
            const yearLevelFilter = $('#yearLevelFilter').val().toLowerCase();
            let visibleCount = 0;
            
            $('tbody tr').each(function() {
                const row = $(this);
                
                // Skip the "no students found" row
                if (row.find('td').attr('colspan')) {
                    return;
                }
                
                const studentId = row.find('td:eq(0)').text().toLowerCase();
                const studentName = row.find('td:eq(1)').text().toLowerCase();
                const program = row.find('td:eq(2)').text().toLowerCase();
                const yearLevel = row.find('td:eq(3)').text().toLowerCase();
                const status = row.find('td:eq(4)').text().toLowerCase();
                
                const matchesSearch = searchTerm === '' || 
                                    studentId.includes(searchTerm) || 
                                    studentName.includes(searchTerm);
                const matchesProgram = programFilter === '' || program.includes(programFilter);
                const matchesYearLevel = yearLevelFilter === '' || yearLevel === yearLevelFilter.toLowerCase();
                const matchesStatus = currentStatusFilter === '' || status.includes(currentStatusFilter.toLowerCase());
                
                if (matchesSearch && matchesProgram && matchesYearLevel && matchesStatus) {
                    row.show();
                    visibleCount++;
                } else {
                    row.hide();
                }
            });
            
            $('#resultCount').text(visibleCount);
        }
        
        // Status tag filtering
        $('.status-tag').on('click', function() {
            // Remove active class from all tags
            $('.status-tag').removeClass('active');
            
            // Add active class to clicked tag
            $(this).addClass('active');
            
            // Get the status from data attribute
            currentStatusFilter = $(this).data('status');
            
            // Trigger filter
            filterTable();
        });
        
        // Trigger filter on input/change
        $('#searchInput').on('keyup', filterTable);
        $('#programFilter, #yearLevelFilter').on('change', filterTable);
    });
    </script>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/students/index.blade.php ENDPATH**/ ?>