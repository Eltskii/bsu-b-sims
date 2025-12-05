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
     <?php $__env->slot('title', null, []); ?> Database Backups <?php $__env->endSlot(); ?>
    
    <div class="py-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- Page Header with Background -->
            <div class="mb-8 relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8 shadow-2xl">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white opacity-10"></div>
                <div class="absolute -left-10 -bottom-10 h-40 w-40 rounded-full bg-white opacity-10"></div>
                
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="p-2 bg-white/20 backdrop-blur-sm rounded-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                </svg>
                            </div>
                            <h1 class="text-3xl font-bold text-white drop-shadow-lg">Database Backups</h1>
                        </div>
                        <p class="text-indigo-100 ml-14">Protect your data with complete system snapshots</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <form action="<?php echo e(route('backups.cleanup')); ?>" method="POST" class="inline"
                              onsubmit="return confirm('⚠️ This will delete all backups older than 30 days. Continue?');">
                            <?php echo csrf_field(); ?>
                            <button type="submit" 
                                    class="inline-flex items-center px-5 py-3 bg-white/20 backdrop-blur-md hover:bg-white/30 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-200 border border-white/30">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Cleanup Old
                            </button>
                        </form>
                        <button type="button" 
                                onclick="document.getElementById('createBackupModal').classList.remove('hidden')"
                                class="inline-flex items-center px-5 py-3 bg-white hover:bg-indigo-50 text-indigo-700 font-semibold rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Backup
                        </button>
                    </div>
                </div>
            </div>

            <!-- Info Alert with enhanced design -->
            <div class="mb-8 relative overflow-hidden rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 shadow-md">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-200 rounded-full -mr-16 -mt-16 opacity-20"></div>
                <div class="relative p-5">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="p-2 bg-blue-500 rounded-lg shadow-md">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-bold text-gray-900 mb-1">💾 What's in a Backup?</h3>
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Complete database snapshots including <span class="font-semibold text-indigo-700">students, enrollments, grades, programs, subjects, users, and all system data</span>. 
                                Perfect for disaster recovery or migrating to a new server.
                            </p>
                            <div class="mt-3 flex items-center gap-2 text-xs font-medium text-amber-700 bg-amber-50 px-3 py-2 rounded-lg border border-amber-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Restoring will replace ALL current data - use with extreme caution!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Backups -->
                <div class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                                    <p class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Total Backups</p>
                                </div>
                                <p class="text-4xl font-extrabold text-gray-900 mt-2"><?php echo e($backups->total()); ?></p>
                                <p class="text-xs text-gray-500 mt-1">System snapshots</p>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-indigo-500 rounded-2xl blur-xl opacity-20"></div>
                                <div class="relative p-4 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Size -->
                <div class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                                    <p class="text-xs font-bold text-purple-600 uppercase tracking-wider">Total Size</p>
                                </div>
                                <p class="text-4xl font-extrabold text-gray-900 mt-2">
                                    <?php
                                        $units = ['B', 'KB', 'MB', 'GB'];
                                        $bytes = $totalSize;
                                        $i = 0;
                                        while ($bytes >= 1024 && $i < 3) {
                                            $bytes /= 1024;
                                            $i++;
                                        }
                                        echo round($bytes, 2);
                                    ?>
                                </p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($units[$i] ?? 'B'); ?> stored</p>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-purple-500 rounded-2xl blur-xl opacity-20"></div>
                                <div class="relative p-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Backup -->
                <div class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-teal-600 opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Latest Backup</p>
                                </div>
                                <p class="text-2xl font-extrabold text-gray-900 mt-2">
                                    <?php if($backups->count() > 0): ?>
                                        <?php echo e($backups->first()->created_at->diffForHumans()); ?>

                                    <?php else: ?>
                                        <span class="text-gray-400">Never</span>
                                    <?php endif; ?>
                                </p>
                                <p class="text-xs text-gray-500 mt-1">
                                    <?php if($backups->count() > 0): ?>
                                        <?php echo e($backups->first()->created_at->format('M d, Y - h:i A')); ?>

                                    <?php else: ?>
                                        No backups yet
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-emerald-500 rounded-2xl blur-xl opacity-20"></div>
                                <div class="relative p-4 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backups List -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">All Backups</h2>
                        </div>
                        <span class="text-sm text-gray-500"><?php echo e($backups->total()); ?> <?php echo e(Str::plural('backup', $backups->total())); ?></span>
                    </div>
                </div>
                <div class="p-6">
                    <?php if($backups->count() > 0): ?>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Filename</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Size</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Created By</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Created At</th>
                                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="group hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-200">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="p-2 bg-indigo-100 group-hover:bg-indigo-200 rounded-lg transition-colors duration-200">
                                                        <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-semibold text-gray-900"><?php echo e($backup->filename); ?></div>
                                                        <?php if($backup->description): ?>
                                                            <div class="text-xs text-gray-600 mt-0.5 flex items-center gap-1">
                                                                <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                <?php echo e($backup->description); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-purple-100 text-purple-700 text-xs font-semibold">
                                                    <?php echo e($backup->formatted_size); ?>

                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md">
                                                        <?php echo e(strtoupper(substr($backup->createdBy->name, 0, 1))); ?>

                                                    </div>
                                                    <span class="text-sm font-medium text-gray-900"><?php echo e($backup->createdBy->name); ?></span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900"><?php echo e($backup->created_at->format('M d, Y')); ?></div>
                                                <div class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <?php echo e($backup->created_at->format('h:i A')); ?>

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <!-- Download -->
                                                    <a href="<?php echo e(route('backups.download', $backup)); ?>" 
                                                       class="group/btn inline-flex items-center p-2.5 text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md"
                                                       title="Download Backup">
                                                        <svg class="w-5 h-5 group-hover/btn:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                        </svg>
                                                    </a>
                                                    
                                                    <!-- Restore -->
                                                    <form action="<?php echo e(route('backups.restore', $backup)); ?>" method="POST" class="inline"
                                                          onsubmit="return confirm('⚠️ WARNING: This will REPLACE your current database with this backup!\\n\\nAll current data will be lost. Are you absolutely sure?');">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" 
                                                                class="group/btn inline-flex items-center p-2.5 text-emerald-600 bg-emerald-50 hover:bg-emerald-600 hover:text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md"
                                                                title="Restore Database">
                                                            <svg class="w-5 h-5 group-hover/btn:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    
                                                    <!-- Delete -->
                                                    <form action="<?php echo e(route('backups.destroy', $backup)); ?>" method="POST" class="inline"
                                                          onsubmit="return confirm('⚠️ Delete this backup?\\n\\nThis action cannot be undone.');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" 
                                                                class="group/btn inline-flex items-center p-2.5 text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md"
                                                                title="Delete Backup">
                                                            <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php if($backups->hasPages()): ?>
                            <div class="mt-6">
                                <?php echo e($backups->links()); ?>

                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-16">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full mb-6">
                                <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No Backups Yet</h3>
                            <p class="text-sm text-gray-600 mb-8 max-w-md mx-auto">Your database isn't protected yet. Create your first backup to safeguard all student records, grades, and system data.</p>
                            <button type="button" 
                                    onclick="document.getElementById('createBackupModal').classList.remove('hidden')"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create Your First Backup
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Create Backup Modal -->
    <div id="createBackupModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
        <div class="relative w-full max-w-lg">
            <!-- Modal Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-white/20 backdrop-blur-sm rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Create New Backup</h3>
                        </div>
                        <button onclick="document.getElementById('createBackupModal').classList.add('hidden')" 
                                class="p-1 hover:bg-white/20 rounded-lg transition-colors duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Body -->
                <form action="<?php echo e(route('backups.store')); ?>" method="POST" class="p-6">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Info Notice -->
                    <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-r-lg">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-blue-800">
                                This will create a complete snapshot of your database. The process may take a few moments depending on database size.
                            </p>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-bold text-gray-900 mb-2">
                            Description <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4" 
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                                  placeholder="e.g., Before semester transition&#10;End of year backup&#10;Pre-migration snapshot"></textarea>
                        <p class="mt-2 text-xs text-gray-500">Add a note to help identify this backup later</p>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex gap-3">
                        <button type="button" 
                                onclick="document.getElementById('createBackupModal').classList.add('hidden')"
                                class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-200">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                            Create Backup
                        </button>
                    </div>
                </form>
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
<?php /**PATH /opt/lampp/htdocs/bsu-sims/resources/views/backups/index.blade.php ENDPATH**/ ?>