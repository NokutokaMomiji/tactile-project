<div class="relative z-10" x-data="{ showDropdown: <?php if ((object) ('showDropdown') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showDropdown'->value()); ?>')<?php echo e('showDropdown'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showDropdown'); ?>')<?php endif; ?>.live }">

    <div class="relative mx-auto">
        <div class="relative">

            <input type="text" placeholder="<?php echo e(__('Buscar...')); ?>" wire:model.live='s'
                class="px-4 py-1.5 bg-blue-300 w-full rounded-full text-white h-11 mx-2.5 placeholder:text-white plceholder: placeholder:text-xl border-none" />
            <svg class="absolute text-white pointer-events-none size-7 right-4 top-2" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="w-full" x-show="showDropdown" x-on:click.away="showDropdown = false">
            <div class="absolute w-full mt-2 text-sm text-left bg-white border border-gray-300 rounded shadow">
                <ul class="w-full pb-2 space-y-2 overflow-y-auto scroll-pb-2 scroll-pt-11" id="options"
                    role="listbox">
                    <!--[if BLOCK]><![endif]--><?php if($this->users && $this->users->count()): ?>
                        <li>
                            <h2 class="bg-gray-100 px-4 py-2.5 text-xs font-semibold text-gray-900"><?php echo e(__('Usuaris')); ?></h2>
                            <ul class="text-sm text-gray-800">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a wire:navigate href="<?php echo e(route('profile-page', $user)); ?>"
                                        class="block px-4 py-2 hover:bg-sky-600 hover:text-white" id="option-2"
                                        role="option" tabindex="-1">
                                        <?php echo e($user->name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($this->projects && $this->projects->count()): ?>
                        <li>
                            <h2 class="bg-gray-100 px-4 py-2.5 text-xs font-semibold text-gray-900"><?php echo e(__('Projectes')); ?></h2>
                            <ul class="text-sm text-gray-800">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a wire:navigate href="<?php echo e(route('post.show', [$project])); ?>"
                                        class="block px-4 py-2 hover:bg-sky-600 hover:text-white" id="option-2"
                                        role="option" tabindex="-1">
                                        <?php echo e($project->title); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </ul>

                <!--[if BLOCK]><![endif]--><?php if($this->s && !count($this->projects) && !count($this->users)): ?>
                    <!-- Empty state, show/hide based on command palette state -->
                    <div class="px-6 text-sm text-center border-t border-gray-100 py-14 sm:px-14">
                        <svg class="w-5 h-5 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                        <p class="mt-4 font-semibold text-gray-900"><?php echo e(__("No s'han trobat resultats")); ?></p>
                        <p class="mt-2 text-gray-500"><?php echo e(__('No hem trobat res amb aquest terme. Si us plau, torneu-ho a provar.')); ?></p>
                    </div>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\dev\temp\projects\resources\views/livewire/search-form.blade.php ENDPATH**/ ?>