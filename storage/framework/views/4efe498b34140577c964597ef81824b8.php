

<?php $__env->startSection('header'); ?>
    <h2 class="text-2xl font-semibold text-gray-900">Create Blog Post</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl">
    <form action="<?php echo e(route('admin.blog.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="bg-white rounded-lg shadow-sm">
            <!-- Basic Info -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Post Content</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" value="<?php echo e(old('title')); ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Enter post title">
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt (Short Summary)</label>
                        <textarea name="excerpt" rows="2"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Brief summary for listings and search results (max 500 chars)"><?php echo e(old('excerpt')); ?></textarea>
                        <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                        <textarea name="content" rows="15" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Write your blog post content here..."><?php echo e(old('content')); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-xs text-gray-500 mt-1">Tip: Use blank lines to separate paragraphs.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" name="featured_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <?php $__errorArgs = ['featured_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-xs text-gray-500 mt-1">Recommended: 1200x630px for optimal social sharing</p>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h3>
                <p class="text-sm text-gray-600 mb-4">Optimize your post for search engines. Leave blank to use defaults.</p>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" value="<?php echo e(old('meta_title')); ?>" maxlength="70"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="SEO title (max 70 characters)">
                        <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-xs text-gray-500 mt-1">If empty, the post title will be used.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" rows="2" maxlength="160"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="SEO description (max 160 characters)"><?php echo e(old('meta_description')); ?></textarea>
                        <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-xs text-gray-500 mt-1">If empty, the excerpt will be used.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="<?php echo e(old('meta_keywords')); ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="keyword1, keyword2, keyword3">
                        <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Publish Settings -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Publishing</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                            <?php echo e(old('is_published') ? 'checked' : ''); ?>>
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Publish this post
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Publish Date (Optional)</label>
                        <input type="datetime-local" name="published_at" value="<?php echo e(old('published_at')); ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Schedule for future or leave empty to publish now.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Priority</label>
                        <input type="number" name="priority" value="<?php echo e(old('priority', 0)); ?>" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Higher priority posts appear first (0 = default)</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="p-6 bg-gray-50 flex justify-end gap-4">
                <a href="<?php echo e(route('admin.blog.index')); ?>" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Create Post
                </button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\admin\blog\create.blade.php ENDPATH**/ ?>