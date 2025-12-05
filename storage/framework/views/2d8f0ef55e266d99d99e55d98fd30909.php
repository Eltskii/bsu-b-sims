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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Map Import Columns')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">File: <?php echo e($fileName); ?></h3>
                    
                    <p class="text-gray-600 mb-6">
                        We detected <?php echo e(count($headers)); ?> column(s) in your file. Please confirm which columns contain the Student ID, Subject Code, and Grade.
                    </p>

                    <!-- Auto-detected columns info -->
                    <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <p class="text-sm font-medium text-blue-900 mb-2">Auto-detected Mapping:</p>
                        <div class="text-sm text-blue-800 space-y-1">
                            <?php if(isset($autoDetectedMapping['student_id'])): ?>
                                <div>Student ID: <strong><?php echo e($headers[$autoDetectedMapping['student_id']] ?? 'Column ' . $autoDetectedMapping['student_id']); ?></strong></div>
                            <?php else: ?>
                                <div class="text-yellow-700">⚠ Student ID: Not detected</div>
                            <?php endif; ?>
                            
                            <?php if(isset($autoDetectedMapping['subject_code'])): ?>
                                <div>Subject Code: <strong><?php echo e($headers[$autoDetectedMapping['subject_code']] ?? 'Column ' . $autoDetectedMapping['subject_code']); ?></strong></div>
                            <?php else: ?>
                                <div class="text-yellow-700">⚠ Subject Code: Not detected</div>
                            <?php endif; ?>
                            
                            <?php if(isset($autoDetectedMapping['grade'])): ?>
                                <div>Grade: <strong><?php echo e($headers[$autoDetectedMapping['grade']] ?? 'Column ' . $autoDetectedMapping['grade']); ?></strong></div>
                            <?php else: ?>
                                <div class="text-yellow-700">⚠ Grade: Not detected</div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Column mapping form -->
                    <form method="POST" action="<?php echo e(route('chairperson.grade-import.preview')); ?>" class="space-y-6">
                        <?php echo csrf_field(); ?>

                        <!-- Student ID Column -->
                        <div>
                            <label for="student_id_column" class="block text-sm font-medium text-gray-700 mb-2">
                                Student ID Column <span class="text-red-500">*</span>
                            </label>
                            <select id="student_id_column" 
                                    name="student_id_column" 
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['student_id_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required>
                                <option value="">-- Select Column --</option>
                                <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>" <?php echo e(isset($autoDetectedMapping['student_id']) && $autoDetectedMapping['student_id'] == $index ? 'selected' : ''); ?>>
                                        <?php echo e($header); ?> (Column <?php echo e($index); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['student_id_column'];
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

                        <!-- Subject Code Column -->
                        <div>
                            <label for="subject_code_column" class="block text-sm font-medium text-gray-700 mb-2">
                                Subject Code Column <span class="text-red-500">*</span>
                            </label>
                            <select id="subject_code_column" 
                                    name="subject_code_column" 
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['subject_code_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required>
                                <option value="">-- Select Column --</option>
                                <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>" <?php echo e(isset($autoDetectedMapping['subject_code']) && $autoDetectedMapping['subject_code'] == $index ? 'selected' : ''); ?>>
                                        <?php echo e($header); ?> (Column <?php echo e($index); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['subject_code_column'];
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

                        <!-- Grade Column -->
                        <div>
                            <label for="grade_column" class="block text-sm font-medium text-gray-700 mb-2">
                                Grade Column <span class="text-red-500">*</span>
                            </label>
                            <select id="grade_column" 
                                    name="grade_column" 
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-brand-medium focus:border-brand-medium <?php $__errorArgs = ['grade_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required>
                                <option value="">-- Select Column --</option>
                                <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>" <?php echo e(isset($autoDetectedMapping['grade']) && $autoDetectedMapping['grade'] == $index ? 'selected' : ''); ?>>
                                        <?php echo e($header); ?> (Column <?php echo e($index); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['grade_column'];
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

                        <!-- Info box -->
                        <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                            <p class="text-sm text-green-800">
                                <strong>Grade Format Accepted:</strong><br>
                                • Percentage (0-100) - will be converted to Philippine scale<br>
                                • Philippine scale (1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 5.00)<br>
                                • Special grades: IP (In Progress) or INC (Incomplete)
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center pt-6 border-t">
                            <a href="<?php echo e(route('chairperson.grade-import.create')); ?>" 
                               class="text-gray-700 hover:text-gray-900 font-medium">
                                ← Back
                            </a>
                            <div class="flex gap-3">
                                <a href="<?php echo e(route('chairperson.grade-import.create')); ?>" 
                                   class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-medium">
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-6 py-2 bg-gradient-to-r from-brand-deep to-brand-medium hover:from-brand-medium hover:to-brand-light text-white rounded-lg font-medium">
                                    Preview Data →
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/chairperson/grades/import/map-columns.blade.php ENDPATH**/ ?>