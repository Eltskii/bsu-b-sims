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
     <?php $__env->slot('title', null, []); ?> Review Grade Batch <?php $__env->endSlot(); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Review Grade Batch')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Batch Information -->
            <div class="grid grid-cols-5 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">File Name</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1"><?php echo e($batch->file_name); ?></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Chairperson</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1"><?php echo e($batch->chairperson->name); ?></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Total Records</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1"><?php echo e($batch->total_records); ?></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Status</p>
                    <span class="inline-block px-3 py-1 text-xs rounded-full font-medium mt-1
                        <?php if($batch->status == 'submitted'): ?> bg-blue-100 text-blue-800
                        <?php elseif($batch->status == 'approved'): ?> bg-green-100 text-green-800
                        <?php elseif($batch->status == 'rejected'): ?> bg-red-100 text-red-800
                        <?php else: ?> bg-yellow-100 text-yellow-800 <?php endif; ?>">
                        <?php echo e(ucfirst($batch->status)); ?>

                    </span>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Success/Error</p>
                    <div class="mt-1">
                        <span class="text-lg font-semibold text-green-600"><?php echo e($successCount); ?></span>
                        <span class="text-gray-400">/</span>
                        <span class="text-lg font-semibold text-red-600"><?php echo e($errorCount); ?></span>
                    </div>
                </div>
            </div>

            <!-- Records Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Import Records</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Student ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Subject</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Grade</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Details</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 <?php if($record->status == 'error'): ?> bg-red-50 <?php elseif($record->status == 'matched'): ?> bg-green-50 <?php endif; ?>">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <?php echo e($record->student_id_number); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            <?php echo e($record->subject_code); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                            <?php echo e($record->grade ? number_format($record->grade, 2) : '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium
                                                <?php if($record->status == 'matched'): ?> bg-green-100 text-green-800
                                                <?php elseif($record->status == 'error'): ?> bg-red-100 text-red-800
                                                <?php else: ?> bg-yellow-100 text-yellow-800 <?php endif; ?>">
                                                <?php echo e(ucfirst($record->status)); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            <?php if($record->error_message): ?>
                                                <span class="text-red-600 font-medium"><?php echo e($record->error_message); ?></span>
                                            <?php else: ?>
                                                <span class="text-green-600">✓ Ready to apply</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            No records in this batch.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Section -->
            <?php if($batch->status === 'submitted'): ?>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Approval Actions</h3>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Approve Section -->
                            <div class="border-l-4 border-green-500 pl-6">
                                <h4 class="font-semibold text-green-700 mb-2">Approve Batch</h4>
                                <p class="text-sm text-gray-600 mb-4">
                                    This will apply <?php echo e($successCount); ?> grades and calculate GPA for affected students.
                                </p>
                                <?php if($errorCount > 0): ?>
                                    <p class="text-sm text-red-600 mb-4">
                                        ⚠️ Cannot approve: <?php echo e($errorCount); ?> record(s) have errors. Ask chairperson to fix.
                                    </p>
                                    <button disabled class="px-6 py-2 bg-gray-400 text-white rounded-lg font-medium cursor-not-allowed opacity-50">
                                        Approve (Errors Pending)
                                    </button>
                                <?php else: ?>
                                    <form action="<?php echo e(route('admin.grade-approvals.approve', $batch)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" 
                                                onclick="return confirm('Approve this batch? This will apply all <?php echo e($successCount); ?> grades.')"
                                                class="px-6 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-lg font-medium">
                                            ✓ Approve Batch
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>

                            <!-- Reject Section -->
                            <div class="border-l-4 border-red-500 pl-6">
                                <h4 class="font-semibold text-red-700 mb-2">Reject Batch</h4>
                                <p class="text-sm text-gray-600 mb-4">
                                    Return to chairperson for corrections or further review.
                                </p>
                                <button onclick="openRejectModal()" 
                                        class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-medium">
                                    ✗ Reject Batch
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reject Modal -->
                <div id="rejectModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg p-6 max-w-md mx-auto">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Reject Batch</h3>
                        <form action="<?php echo e(route('admin.grade-approvals.reject', $batch)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-4">
                                <label for="reason" class="block text-sm font-medium text-gray-700 mb-2">
                                    Reason for Rejection
                                </label>
                                <textarea id="reason" name="reason" rows="4" 
                                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-brand-medium focus:border-brand-medium"
                                          placeholder="Explain why this batch is being rejected..."></textarea>
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
                            <div class="flex justify-end gap-3">
                                <button type="button" onclick="closeRejectModal()" 
                                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-medium">
                                    Cancel
                                </button>
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium">
                                    Reject
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <p class="text-blue-700 font-medium">
                        This batch has already been <?php echo e($batch->status); ?>.
                    </p>
                </div>
            <?php endif; ?>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="<?php echo e(route('admin.grade-approvals.index')); ?>" 
                   class="text-gray-700 hover:text-gray-900 font-medium">
                    ← Back to Queue
                </a>
            </div>
        </div>
    </div>

    <script>
    function openRejectModal() {
        document.getElementById('rejectModal').classList.remove('hidden');
    }
    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
    }
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/admin/grade-approvals/show.blade.php ENDPATH**/ ?>