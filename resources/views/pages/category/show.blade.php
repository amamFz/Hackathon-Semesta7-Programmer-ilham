<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Detail Kategori') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="space-x-6 p-6 text-gray-900">
          <div class="mb-4 space-y-2">
            <x-input-label :value="__('Nama Kategori')" />
            <div class="mt-1 rounded-md border border-gray-200 bg-gray-50 p-2 text-gray-800">
              {{ $category->name }}
            </div>
          </div>
          <div class="flex justify-end">
            <a href="{{ route('category.index') }}"
              class="mr-2 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
              Kembali
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
