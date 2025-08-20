<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit Kategori') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="space-y-2">
              <x-input-label for="name" :value="__('Nama Kategori')" />
              <x-text-input id="name" name="name" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ old('name', $category->name) }}" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="flex justify-end">
              <a href="{{ route('category.index') }}"
                class="mr-2 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                Batal
              </a>
              <x-button>
                Simpan
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
