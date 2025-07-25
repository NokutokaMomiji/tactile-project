<?php
    if (!isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
?>
<div>
    <!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
                        <span
                            class="relative inline-flex items-center px-6 py-3 text-base font-semibold text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                            <?php echo __('pagination.previous'); ?>

                        </span>
                    <?php else: ?>
                        <button type="button" wire:click="previousPage('<?php echo e($paginator->getPageName()); ?>')"
                            x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>" wire:loading.attr="disabled"
                            dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.before"
                            class="relative inline-flex items-center px-6 py-3 text-base font-semibold text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                            <?php echo __('pagination.previous'); ?>

                        </button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </span>

                <span>
                    <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
                        <button type="button" wire:click="nextPage('<?php echo e($paginator->getPageName()); ?>')"
                            x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>" wire:loading.attr="disabled"
                            dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.before"
                            class="relative inline-flex items-center px-6 py-3 ml-3 text-base font-semibold text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                            <?php echo __('pagination.next'); ?>

                        </button>
                    <?php else: ?>
                        <span
                            class="relative inline-flex items-center px-6 py-3 ml-3 text-base font-semibold text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                            <?php echo __('pagination.next'); ?>

                        </span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-base text-gray-700 leading-5 dark:text-gray-400">
                        <span><?php echo __('Showing'); ?></span>
                        <span class="font-semibold"><?php echo e($paginator->firstItem()); ?></span>
                        <span><?php echo __('to'); ?></span>
                        <span class="font-semibold"><?php echo e($paginator->lastItem()); ?></span>
                        <span><?php echo __('of'); ?></span>
                        <span class="font-semibold"><?php echo e($paginator->total()); ?></span>
                        <span><?php echo __('results'); ?></span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rtl:flex-row-reverse rounded-md shadow-sm">
                        <span>
                            
                            <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
                                <span aria-disabled="true" aria-label="<?php echo e(__('pagination.previous')); ?>">
                                    <span
                                        class="relative inline-flex items-center px-8 py-4 text-base font-semibold text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 dark:bg-gray-800 dark:border-gray-600"
                                        aria-hidden="true"
                                        style="font-size: 1.35rem; font-family: 'Verdana', sans-serif; font-weight: bold;">
                                        <
                                    </span>
                                </span>
                            <?php else: ?>
                                <button type="button" wire:click="previousPage('<?php echo e($paginator->getPageName()); ?>')"
                                    x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>"
                                    dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.after"
                                    class="relative inline-flex items-center px-8 py-4 text-base font-semibold text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring ring-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                    aria-label="<?php echo e(__('pagination.previous')); ?>"
                                    style="font-size: 1.35rem; font-family: 'Verdana', sans-serif; font-weight: bold;">
                                    <
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </span>

                        
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <!--[if BLOCK]><![endif]--><?php if(is_string($element)): ?>
                                <span aria-disabled="true">
                                    <span
                                        class="relative inline-flex items-center px-8 py-4 -ml-px text-base font-bold text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600"><?php echo e($element); ?></span>
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            
                            <!--[if BLOCK]><![endif]--><?php if(is_array($element)): ?>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span wire:key="paginator-<?php echo e($paginator->getPageName()); ?>-page<?php echo e($page); ?>">
                                        <!--[if BLOCK]><![endif]--><?php if($page == $paginator->currentPage()): ?>
                                        <span aria-current="page">
                                            <span class="relative inline-flex items-center px-8 py-4 -ml-px text-base text-white bg-blue-500 border border-gray-300 cursor-default leading-5 dark:bg-blue-500 dark:border-gray-600" style="font-weight: bold; font-size: 1.5rem; font-family: 'Roboto', sans-serif;">
                                                <?php echo e($page); ?>

                                            </span>
                                        </span>
                                        <?php else: ?>
                                            <button type="button" wire:click="gotoPage(<?php echo e($page); ?>, '<?php echo e($paginator->getPageName()); ?>')"
                                                x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>"
                                                class="relative inline-flex items-center px-8 py-4 -ml-px text-base font-semibold text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring ring-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                                style="font-size: 1.4rem; font-family: 'Roboto', sans-serif;"
                                                aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>">
                                                <?php echo e($page); ?>

                                            </button>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                        <span>
                            
                            <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
                                <button type="button" wire:click="nextPage('<?php echo e($paginator->getPageName()); ?>')"
                                    x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>"
                                    dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.after"
                                    class="relative inline-flex items-center px-8 py-4 -ml-px text-base font-semibold text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring ring-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                    aria-label="<?php echo e(__('pagination.next')); ?>"
                                    style="font-size: 1.35rem; font-family: 'Verdana', sans-serif; font-weight: bold;">
                                    >
                                </button>
                            <?php else: ?>
                                <span aria-disabled="true" aria-label="<?php echo e(__('pagination.next')); ?>">
                                    <span
                                        class="relative inline-flex items-center px-8 py-4 -ml-px text-base font-semibold text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5 dark:bg-gray-800 dark:border-gray-600"
                                        aria-hidden="true"
                                        style="font-size: 1.35rem; font-family: 'Verdana', sans-serif; font-weight: bold;">
                                        >
                                    </span>
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </span>
                    </span>
                </div>

            </div>
        </nav>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH D:\dev\temp\projects\resources\views/vendor/livewire/tailwind.blade.php ENDPATH**/ ?>