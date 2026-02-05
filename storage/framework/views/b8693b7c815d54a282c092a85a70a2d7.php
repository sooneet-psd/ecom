<div class="flex-shrink-0 w-64 snap-start">
    <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 h-full">
        <!-- Image -->
        <div class="relative aspect-[3/4] overflow-hidden bg-gray-100">
            <?php if($product->main_image): ?>
                <img src="<?php echo e($product->main_image); ?>" alt="<?php echo e($product->name); ?>"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <?php else: ?>
                <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
            <?php endif; ?>

            <!-- Badge -->
            <?php if(isset($badge)): ?>
                <?php
                    $colorClasses = [
                        'green' => 'bg-green-500',
                        'blue' => 'bg-blue-500',
                        'purple' => 'bg-purple-500',
                        'red' => 'bg-red-500',
                    ];
                    $bgClass = $colorClasses[$badgeColor ?? 'green'] ?? 'bg-gray-500';
                ?>
                <div class="absolute top-3 left-3">
                    <span class="<?php echo e($bgClass); ?> text-white text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider shadow-lg">
                        <?php echo e($badge); ?>

                    </span>
                </div>
            <?php endif; ?>

            <!-- Discount Badge -->
            <?php if($product->discount_price && $product->price > $product->discount_price): ?>
                <?php
                    $discountPercent = round((($product->price - $product->discount_price) / $product->price) * 100);
                ?>
                <div class="absolute top-3 right-3">
                    <span class="bg-red-600 text-white text-xs px-2 py-1 rounded-full font-bold shadow-lg">
                        -<?php echo e($discountPercent); ?>%
                    </span>
                </div>
            <?php endif; ?>

            <!-- Quick View Overlay -->
            <div class="absolute inset-x-0 bottom-0 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-center pb-6 bg-gradient-to-t from-black/50 to-transparent">
                <a href="<?php echo e(route('products.show', $product->slug ?? $product->id)); ?>"
                    class="bg-white text-gray-900 px-5 py-2 rounded-full font-medium hover:bg-green-premium hover:text-white transition shadow-lg transform translate-y-4 group-hover:translate-y-0 duration-300 text-sm">
                    View Details
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 text-center">
            <h3 class="text-sm font-serif font-bold text-gray-900 mb-2 truncate" title="<?php echo e($product->name); ?>">
                <?php echo e($product->name); ?>

            </h3>
            <div class="text-green-premium font-bold">
                <?php if($product->discount_price): ?>
                    <span class="text-gray-400 line-through text-sm mr-1">$<?php echo e(number_format($product->price, 2)); ?></span>
                    <span class="text-lg">$<?php echo e(number_format($product->discount_price, 2)); ?></span>
                <?php else: ?>
                    <span class="text-lg">$<?php echo e(number_format($product->price, 2)); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\DELL\Desktop\My Files\Dev\ecom\resources\views\partials\product-carousel-card.blade.php ENDPATH**/ ?>