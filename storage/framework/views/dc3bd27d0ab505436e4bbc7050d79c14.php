<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header with Photo -->
<div class="relative overflow-hidden shadow-md" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white opacity-10"></div>
    <div class="absolute -left-10 -bottom-10 h-40 w-40 rounded-full bg-white opacity-10"></div>
    
    <div class="relative max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center gap-6">
            <?php if($student->photo_path): ?>
                <img src="<?php echo e(asset('storage/' . $student->photo_path)); ?>" 
                     alt="<?php echo e($student->first_name); ?>" 
                     class="w-24 h-24 rounded-full object-cover border-4 border-white/30">
            <?php else: ?>
                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center border-4 border-white/30">
                    <span class="text-4xl font-bold text-white"><?php echo e(strtoupper(substr($student->first_name, 0, 1))); ?><?php echo e(strtoupper(substr($student->last_name, 0, 1))); ?></span>
                </div>
            <?php endif; ?>
            <div>
                <h1 class="text-3xl font-bold text-white"><?php echo e($student->first_name); ?> <?php echo e($student->middle_name); ?> <?php echo e($student->last_name); ?><?php echo e($student->suffix ? ' ' . $student->suffix : ''); ?></h1>
                <p class="text-lg text-emerald-100 mt-1"><?php echo e($student->student_id); ?></p>
                <div class="flex items-center gap-4 mt-2">
                    <span class="px-3 py-1 bg-white/20 text-white text-sm font-medium rounded-full"><?php echo e($student->status); ?></span>
                    <?php if($student->gpa): ?>
                        <span class="px-3 py-1 bg-white/20 text-white text-sm font-medium rounded-full">GPA: <?php echo e(number_format($student->gpa, 2)); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-100 min-h-screen">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Personal Information -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
                <h2 class="text-lg font-semibold text-white">Personal Information</h2>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Last Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->last_name); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">First Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->first_name); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Middle Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->middle_name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Suffix</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->suffix ?? 'N/A'); ?></p>
                    </div>
                    <?php if($student->maiden_name): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Maiden Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->maiden_name); ?></p>
                    </div>
                    <?php endif; ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Birthdate</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->birthdate ? $student->birthdate->format('F d, Y') : 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Place of Birth</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->place_of_birth ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Gender</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->gender ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Citizenship</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->citizenship ?? 'N/A'); ?></p>
                    </div>
                    <?php if($student->ethnicity_tribal_affiliation): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Ethnicity/Tribal Affiliation</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->ethnicity_tribal_affiliation); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
                <h2 class="text-lg font-semibold text-white">Contact Information</h2>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Contact Number</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->contact_number ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Email Address</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->email ?? $student->email_address ?? 'N/A'); ?></p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Home Address</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->home_address ?? $student->address ?? 'N/A'); ?></p>
                    </div>
                    <?php if($student->address_while_studying): ?>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Address While Studying</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->address_while_studying); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Family Information -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
                <h2 class="text-lg font-semibold text-white">Family & Emergency Contact</h2>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Mother's Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->mother_name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Mother's Contact Number</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->mother_contact_number ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Father's Name</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->father_name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Father's Contact Number</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->father_contact_number ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Emergency Contact Person</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_person ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Relationship</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_relationship ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Emergency Contact Number</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->emergency_contact_number ?? 'N/A'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="px-6 py-4" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
                <h2 class="text-lg font-semibold text-white">Academic Information</h2>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Program</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->program->name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Year Level</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->year_level); ?></p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Status</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->status); ?></p>
                    </div>
                    <?php if($student->student_type): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Student Type</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->student_type); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->degree): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Degree</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->degree); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->major): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Major</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->major); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->section): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Section</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->section); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->attendance_type): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Attendance Type</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->attendance_type); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->curriculum_used): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Curriculum Used</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->curriculum_used); ?></p>
                    </div>
                    <?php endif; ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Enrollment Date</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->enrollment_date ? $student->enrollment_date->format('F d, Y') : 'N/A'); ?></p>
                    </div>
                    <?php if($student->academicYear): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Academic Year Enrolled</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->academicYear->year_code); ?> - <?php echo e($student->academicYear->semester); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->total_units_enrolled): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Total Units Enrolled</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->total_units_enrolled); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->free_higher_education_benefit): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Free Higher Education Benefit</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->free_higher_education_benefit); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->gpa): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">GPA</label>
                        <p class="text-base font-semibold text-indigo-600"><?php echo e(number_format($student->gpa, 2)); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->academic_standing): ?>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Academic Standing</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->academic_standing); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($student->notes): ?>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Notes</label>
                        <p class="text-base font-semibold text-gray-900"><?php echo e($student->notes); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <a href="<?php echo e(route('student.dashboard')); ?>" class="inline-flex items-center px-6 py-3 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200" style="background: linear-gradient(135deg, #047857, #0f766e, #115e59);">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/student/profile.blade.php ENDPATH**/ ?>