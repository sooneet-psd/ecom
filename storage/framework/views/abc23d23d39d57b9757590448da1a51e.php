

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-serif font-bold text-gray-900 mb-8">Shipping Policy</h1>
            
            <div class="bg-white rounded-lg shadow-sm p-8">
                <?php if($content): ?>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <?php echo nl2br(e($content)); ?>

                    </div>
                <?php else: ?>
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500">Shipping policy content has not been added yet.</p>
                        <p class="text-sm text-gray-400 mt-2">Please check back later or contact us for more information.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-8 text-center">
                <a href="<?php echo e(route('home')); ?>" class="text-green-premium hover:underline">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\frontend\pages\shipping-policy.blade.php ENDPATH**/ ?>