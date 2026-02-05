

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Admin User Details</h1>
            <p class="text-gray-600 mt-1">View detailed information about this admin user</p>
        </div>
        <div class="flex gap-2">
            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" 
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                Edit User
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>" 
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">User Information</h2>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-16 w-16 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-green-600 font-semibold text-2xl"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-medium text-gray-900"><?php echo e($user->name); ?></div>
                            <div class="text-sm text-gray-500"><?php echo e($user->email); ?></div>
                        </div>
                    </div>

                    <div class="border-t pt-4">
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1">
                                    <?php if($user->is_active): ?>
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                    <?php else: ?>
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                    <?php endif; ?>
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Login</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php echo e($user->last_login_at ? $user->last_login_at->format('F d, Y - H:i:s') : 'Never logged in'); ?>

                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Login IP</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php echo e($user->last_login_ip ?? 'N/A'); ?>

                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500">Account Created</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php echo e($user->created_at->format('F d, Y - H:i:s')); ?>

                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php echo e($user->updated_at->format('F d, Y - H:i:s')); ?>

                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Permissions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Permissions</h2>
                
                <?php
                    $allPermissions = $user->roles->flatMap(function($role) {
                        return $role->permissions;
                    })->unique('id');
                ?>

                <?php if($allPermissions->count() > 0): ?>
                <div class="grid grid-cols-2 gap-3">
                    <?php $__currentLoopData = $allPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="text-sm font-medium text-gray-900"><?php echo e($permission->display_name); ?></div>
                            <?php if($permission->description): ?>
                            <div class="text-xs text-gray-500"><?php echo e($permission->description); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p class="text-gray-500 text-sm">No permissions assigned.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Roles -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Roles</h2>
                
                <?php if($user->roles->count() > 0): ?>
                <div class="space-y-2">
                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-3 rounded-lg <?php echo e($role->name === 'super_admin' ? 'bg-purple-50 border border-purple-200' : 'bg-blue-50 border border-blue-200'); ?>">
                        <div class="font-medium <?php echo e($role->name === 'super_admin' ? 'text-purple-800' : 'text-blue-800'); ?>">
                            <?php echo e($role->display_name); ?>

                        </div>
                        <?php if($role->description): ?>
                        <div class="text-xs <?php echo e($role->name === 'super_admin' ? 'text-purple-600' : 'text-blue-600'); ?> mt-1">
                            <?php echo e($role->description); ?>

                        </div>
                        <?php endif; ?>
                        <div class="text-xs <?php echo e($role->name === 'super_admin' ? 'text-purple-500' : 'text-blue-500'); ?> mt-1">
                            <?php echo e($role->permissions->count()); ?> permissions
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p class="text-gray-500 text-sm">No roles assigned.</p>
                <?php endif; ?>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
                
                <div class="space-y-2">
                    <?php if(auth()->user()->isSuperAdmin() && $user->id !== auth()->id()): ?>
                    <form action="<?php echo e(route('admin.users.toggle-status', $user)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors">
                            <?php echo e($user->is_active ? 'Deactivate Account' : 'Activate Account'); ?>

                        </button>
                    </form>

                    <a href="<?php echo e(route('admin.users.reset-password', $user)); ?>" 
                        class="block px-4 py-2 text-sm bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-colors">
                        Reset Password
                    </a>

                    <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" 
                        onsubmit="event.preventDefault(); openDeleteModal(this, 'Enter your password to delete this admin user.');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors">
                            Delete Account
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\admin\users\show.blade.php ENDPATH**/ ?>