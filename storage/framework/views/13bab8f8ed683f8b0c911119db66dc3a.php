  <div>
      <div class="mb-2">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Images</h2>
      </div>
      <div>
          <label for="file" class="flex justify-center h-24" x-data="drop_file_component()">
              <div class="flex items-center justify-center w-full py-6 mb-4 rounded"
                  x-bind:class="dropingFile ? 'bg-gray-400 border-gray-500' : 'border-gray-500 bg-gray-200'"
                  x-on:drop="dropingFile = false" x-on:drop.prevent="
                handleFileDrop($event)
            "
                  x-on:dragover.prevent="dropingFile = true" x-on:dragleave.prevent="dropingFile = false">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-4" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                  </svg>
                  <div class="text-center" wire:loading.remove wire.target="files">Drop files here
                      to
                      upload</div>
                  <div class="mt-1" wire:loading.flex wire.target="files">
                      <svg class="w-5 h-5 mr-3 -ml-1 text-gray-700 animate-spin" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                              stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                          </path>
                      </svg>
                      <div>Pujant imatges...</div>
                  </div>
              </div>
          </label>
          <input type="file" id="file" multiple wire:model="files" class="hidden" />

          <script>
              function drop_file_component() {
                  return {
                      dropingFile: false,
                      handleFileDrop(e) {
                          if (event.dataTransfer.files.length > 0) {
                              const files = e.dataTransfer.files;
                              window.Livewire.find('<?php echo e($_instance->getId()); ?>').uploadMultiple('files', files,
                                  (uploadedFilename) => {}, () => {}, (event) => {}
                              )
                          }
                      }
                  };
              }
          </script>
      </div>

      <div>
          <!-- __BLOCK__ --><?php if(count($projectFiles)): ?>
              <ul class="relative grid grid-cols-4 gap-4" wire:sortable="updateImagesOrder">
                  <!-- __BLOCK__ --><?php $__currentLoopData = $projectFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li wire:sortable.item="<?php echo e($index); ?>" wire:key="image-<?php echo e($index); ?>"
                          class="relative bg-gray-100">
                          <a href="<?php echo e(\Storage::url($image['path'])); ?>" target="_blank" class="cursor-pointer">
                              <img src="<?php echo e(\Storage::url($image['path'])); ?>" class="w-auto h-40 mx-auto">
                          </a>
                          <button type="button"
                              class="absolute bottom-0 right-0 p-1 mb-2 mr-2 bg-gray-100 rounded-full"
                              x-on:click="if (confirm('Segur que vols eliminar la imatge?')) $wire.deleteFile(<?php echo e($index); ?>)">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg></button>
                      </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
              </ul>
          <?php endif; ?> <!-- __ENDBLOCK__ -->
      </div>
  </div>
<?php /**PATH /var/www/vhosts/piscastudio.com/scratch.piscastudio.com/resources/views/partials/file-uploader.blade.php ENDPATH**/ ?>