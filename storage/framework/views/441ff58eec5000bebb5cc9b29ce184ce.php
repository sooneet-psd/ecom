

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Reset Password</h1>
        <p class="text-gray-600 mt-1">Reset password for <?php echo e($user->name); ?></p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm p-6 max-w-2xl">
        <form action="<?php echo e(route('admin.users.reset-password.update', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- User Info -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-green-600 font-semibold text-lg"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></span>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900"><?php echo e($user->name); ?></div>
                        <div class="text-sm text-gray-500"><?php echo e($user->email); ?></div>
                    </div>
                </div>
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="submit" 
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    Reset Password
                </button>
                <a href="<?php echo e(route('admin.users.index')); ?>" 
                    class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Warning -->
    <div class="bg-red-50 border border-red-200 rounded-lg p-4 max-w-2xl mt-4">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3">
                <p class="text-sm text-red-700 font-medium">Warning</p>
                <p class="text-sm text-red-700 mt-1">
                    The user will be logged out from all devices and will need to use the new password to login again.
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\admin\users\reset-password.blade.php ENDPATH**/ ?>