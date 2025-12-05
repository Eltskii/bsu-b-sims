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
     <?php $__env->slot('title', null, []); ?> Subjects <?php $__env->endSlot(); ?>
    <div class="py-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Subjects Management</h1>
                        <p class="mt-1 text-sm text-gray-600">Manage curriculum subjects organized by department and program</p>
                    </div>
                    <a href="<?php echo e(route('subjects.create')); ?>" 
                       class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Subject
                    </a>
                </div>
            </div>

            <!-- Quick Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <?php
                    $totalSubjects = $subjects->count();
                    $activeSubjects = $subjects->where('is_active', true)->count();
                    $archivedSubjects = $subjects->where('is_active', false)->count();
                    $totalUnits = $subjects->where('is_active', true)->sum('units');
                ?>
                
                <!-- Total Subjects -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-indigo-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Subjects</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($totalSubjects); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Subjects -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-emerald-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Active/Offered</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($activeSubjects); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Units -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Units</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($totalUnits); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Archived -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border-l-4 border-amber-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Archived</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($archivedSubjects); ?></p>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(session('success')): ?>
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Search and Filter Section -->
                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                            <!-- Search Input -->
                            <div class="lg:col-span-2">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="searchInput" 
                                           placeholder="Search by subject code or name..." 
                                           class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200" 
                                           autocomplete="off">
                                </div>
                            </div>
                            
                            <!-- Department Filter -->
                            <select id="departmentFilter" 
                                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                <option value="">All Departments</option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dept->id); ?>"><?php echo e($dept->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                            <!-- Year Level Filter -->
                            <select id="yearLevelFilter" 
                                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                <option value="">All Year Levels</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                            
                            <!-- Semester Filter -->
                            <select id="semesterFilter" 
                                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                                <option value="">All Semesters</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="Summer">Summer</option>
                            </select>
                        </div>
                        
                        <!-- Results and Clear -->
                        <div class="mt-4 flex items-center justify-between">
                            <button id="clearFilters" 
                                    class="inline-flex items-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear Filters
                            </button>
                            <p class="text-sm text-gray-600">
                                Showing <span id="resultCount" class="font-semibold text-gray-900"><?php echo e($subjects->count()); ?></span> subjects
                            </p>
                        </div>
                    </div>

                    <!-- Hierarchical Department View -->
                    <div class="space-y-4" id="departmentContainer">
                        <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="border rounded-lg overflow-hidden department-section" data-dept-id="<?php echo e($department->id); ?>">
                                <!-- Department Header -->
                                <div class="bg-gradient-to-r from-indigo-700 to-indigo-600 hover:from-indigo-800 hover:to-indigo-700 text-white px-6 py-4 cursor-pointer flex items-center justify-between transition rounded-t-lg" onclick="toggleDepartment(this)">
                                    <div class="flex items-center gap-3">
                                        <svg class="department-toggle w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <div>
                                            <h3 class="font-bold text-lg"><?php echo e($department->name); ?></h3>
                                            <p class="text-xs opacity-75">Code: <?php echo e($department->code); ?> • <?php echo e($department->programs->sum(fn($p) => $p->subjects->count())); ?> subjects</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Department Content -->
                                <div class="department-content hidden bg-gray-50">
                                    <?php $__empty_2 = true; $__currentLoopData = $department->programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <div class="border-t program-item" data-program-id="<?php echo e($program->id); ?>">
                                            <!-- Program Header -->
                                            <div class="bg-indigo-50 hover:bg-indigo-100 px-6 py-3 cursor-pointer flex items-center justify-between transition" onclick="toggleProgram(event)">
                                                <div class="flex items-center gap-3 flex-1">
                                                    <svg class="program-toggle w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                    <div>
                                                        <h4 class="font-semibold text-gray-800"><?php echo e($program->code); ?> - <?php echo e($program->name); ?></h4>
                                                        <p class="text-xs text-gray-600"><?php echo e($program->subjects->count()); ?> subjects</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Subjects Table -->
                                            <div class="program-subjects hidden">
                                                <div class="overflow-x-auto">
                                                    <table class="w-full text-sm">
                                                        <thead class="bg-gray-200 text-gray-700">
                                                            <tr>
                                                                <th class="px-6 py-2 text-left font-semibold">Code</th>
                                                                <th class="px-6 py-2 text-left font-semibold">Subject Name</th>
                                                                <th class="px-6 py-2 text-left font-semibold">Year Level</th>
                                                                <th class="px-6 py-2 text-left font-semibold">Semester</th>
                                                                <th class="px-6 py-2 text-center font-semibold">Units</th>
                                                                <th class="px-6 py-2 text-left font-semibold">Status</th>
                                                                <th class="px-6 py-2 text-left font-semibold">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            <?php $__empty_3 = true; $__currentLoopData = $program->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                                                                <tr class="subject-row hover:bg-gray-50 transition" data-subject-code="<?php echo e($subject->code); ?>" data-subject-name="<?php echo e($subject->name); ?>" data-year-level="<?php echo e($subject->year_level); ?>" data-semester="<?php echo e($subject->semester); ?>">
                                                                    <td class="px-6 py-3 whitespace-nowrap">
                                                                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded">
                                                                            <?php echo e($subject->code); ?>

                                                                        </span>
                                                                    </td>
                                                                    <td class="px-6 py-3"><?php echo e($subject->name); ?></td>
                                                                    <td class="px-6 py-3 whitespace-nowrap"><?php echo e($subject->year_level); ?></td>
                                                                    <td class="px-6 py-3 whitespace-nowrap"><?php echo e($subject->semester); ?></td>
                                                                    <td class="px-6 py-3 whitespace-nowrap text-center"><?php echo e($subject->units); ?></td>
                                                                    <td class="px-6 py-3 whitespace-nowrap">
                                                                        <span class="px-2 py-1 text-xs rounded-full <?php echo e($subject->is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                                                                            <?php echo e($subject->is_active ? 'Offered' : 'Archived'); ?>

                                                                        </span>
                                                                    </td>
                                                                    <td class="px-6 py-3 whitespace-nowrap text-sm">
                                                                        <a href="<?php echo e(route('subjects.edit', $subject)); ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                                        <form action="<?php echo e(route('subjects.destroy', $subject)); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to <?php echo e($subject->is_active ? "archive" : "restore"); ?> this subject?');">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button type="submit" class="<?php echo e($subject->is_active ? 'text-yellow-600 hover:text-yellow-900' : 'text-green-600 hover:text-green-900'); ?>">
                                                                                <?php echo e($subject->is_active ? 'Archive' : 'Restore'); ?>

                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                                                                <tr>
                                                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                                                        No subjects in this program.
                                                                    </td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <div class="px-6 py-4 text-gray-500 text-center">
                                            No programs in this department.
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="px-6 py-4 text-center text-gray-500 bg-white rounded-lg border">
                                No departments available.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDepartment(header) {
            const content = header.nextElementSibling;
            const toggle = header.querySelector('.department-toggle');
            
            content.classList.toggle('hidden');
            toggle.classList.toggle('rotate-90');
        }

        function toggleProgram(event) {
            const header = event.currentTarget;
            const subjects = header.nextElementSibling;
            const toggle = header.querySelector('.program-toggle');
            
            subjects.classList.toggle('hidden');
            toggle.classList.toggle('rotate-90');
            
            event.stopPropagation();
        }

        $(document).ready(function() {
            function filterSubjects() {
                const searchTerm = $('#searchInput').val().toLowerCase();
                const deptFilter = $('#departmentFilter').val();
                const yearLevelFilter = $('#yearLevelFilter').val().toLowerCase();
                const semesterFilter = $('#semesterFilter').val().toLowerCase();
                let totalVisible = 0;
                const hasActiveSearch = searchTerm || deptFilter || yearLevelFilter || semesterFilter;

                // Filter department sections
                $('.department-section').each(function() {
                    const deptId = $(this).data('dept-id');
                    const deptContent = $(this).find('.department-content');
                    const deptToggle = $(this).find('.department-toggle');
                    let deptHasVisible = false;

                    // Check if department matches filter
                    if (deptFilter && deptId != deptFilter) {
                        $(this).hide();
                        return;
                    }

                    // Filter programs and subjects within this department
                    $(this).find('.program-item').each(function() {
                        const progContent = $(this).find('.program-subjects');
                        const progToggle = $(this).find('.program-toggle');
                        let progHasVisible = false;

                        $(this).find('.subject-row').each(function() {
                            const code = $(this).data('subject-code').toLowerCase();
                            const name = $(this).data('subject-name').toLowerCase();
                            const yearLevel = $(this).data('year-level').toLowerCase();
                            const semester = $(this).data('semester').toLowerCase();

                            const matchesSearch = searchTerm === '' || code.includes(searchTerm) || name.includes(searchTerm);
                            const matchesYear = yearLevelFilter === '' || yearLevel === yearLevelFilter;
                            const matchesSem = semesterFilter === '' || semester === semesterFilter;

                            if (matchesSearch && matchesYear && matchesSem) {
                                $(this).show();
                                progHasVisible = true;
                                deptHasVisible = true;
                                totalVisible++;
                            } else {
                                $(this).hide();
                            }
                        });

                        // Show/hide program based on subject visibility
                        if (progHasVisible) {
                            $(this).show();
                            // Auto-expand program when search is active
                            if (hasActiveSearch) {
                                progContent.removeClass('hidden');
                                progToggle.addClass('rotate-90');
                            }
                        } else {
                            $(this).hide();
                        }
                    });

                    // Show/hide department based on content
                    if (deptHasVisible) {
                        $(this).show();
                        // Auto-expand department when search is active
                        if (hasActiveSearch) {
                            deptContent.removeClass('hidden');
                            deptToggle.addClass('rotate-90');
                        }
                    } else {
                        $(this).hide();
                    }
                });

                $('#resultCount').text(totalVisible);
            }

            $('#searchInput').on('keyup', filterSubjects);
            $('#departmentFilter, #yearLevelFilter, #semesterFilter').on('change', filterSubjects);

            $('#clearFilters').on('click', function() {
                $('#searchInput').val('');
                $('#departmentFilter').val('');
                $('#yearLevelFilter').val('');
                $('#semesterFilter').val('');
                // Collapse all sections
                $('.department-content').addClass('hidden');
                $('.program-subjects').addClass('hidden');
                $('.department-toggle').removeClass('rotate-90');
                $('.program-toggle').removeClass('rotate-90');
                filterSubjects();
            });
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/subjects/index.blade.php ENDPATH**/ ?>