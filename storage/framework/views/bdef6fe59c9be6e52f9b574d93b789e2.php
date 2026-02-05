<?php $__env->startSection('header'); ?>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Products
    </h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-medium">All Products</h3>
        <a href="<?php echo e(route('admin.products.create')); ?>"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            + Add New Product
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
        <form method="GET" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="flex-1 w-full">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Product Name or SKU"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2">
            </div>
            <div class="w-full md:w-64">
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2">
                    <option value="">All Categories</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Filter</button>
            <?php if(request()->anyFilled(['search', 'category_id'])): ?>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="text-gray-500 hover:text-gray-700 px-4 py-2">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dimensions (L
                        x W x H)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Weight</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Now
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <?php if($product->main_image): ?>
                                    <img class="h-10 w-10 rounded-full object-cover mr-3" src="<?php echo e($product->main_image); ?>" alt="">
                                <?php else: ?>
                                    <div
                                        class="h-10 w-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mr-3 text-xs">
                                        No Img</div>
                                <?php endif; ?>
                                <div class="text-sm font-medium text-gray-900"><?php echo e($product->name); ?></div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($product->category->name ?? 'Uncategorized'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php if($product->discount_price): ?>
                                <span class="text-gray-400 line-through text-xs mr-1">$<?php echo e(number_format($product->price, 2)); ?></span>
                                <span class="font-bold">$<?php echo e(number_format($product->discount_price, 2)); ?></span>
                            <?php else: ?>
                                $<?php echo e(number_format($product->price, 2)); ?>

                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($product->length); ?> x <?php echo e($product->width); ?> x <?php echo e($product->height); ?> cm
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($product->weight); ?> kg
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($product->material ?? '-'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($product->sku ?? '-'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($product->is_order_now_enabled ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                <?php echo e($product->is_order_now_enabled ? 'Enabled' : 'Disabled'); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="inline-block"
                                onsubmit="event.preventDefault(); openDeleteModal(this, 'Enter your password to delete this product.');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\admin\products\index.blade.php ENDPATH**/ ?>