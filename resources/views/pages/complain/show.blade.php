<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Detail Keluhan') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="space-y-6 p-6 text-gray-900">
          <div class="space-y-2">
            <x-input-label :value="__('Nama Kategori')" />
            <div class="mt-1 rounded-md border border-gray-200 bg-gray-50 p-2 text-gray-800">
              {{ $complain->title }}
            </div>
          </div>
          <div class="space-y-2">
            <x-input-label :value="__('Deskripsi Keluhan')" />
            <div class="mt-1 h-[200px] rounded-md border border-gray-200 bg-gray-50 p-2 text-gray-800">
              {{ $complain->description }}
            </div>
          </div>
          <div class="space-y-2">
            <x-input-label :value="__('Lokasi Unit')" />
            <div class="mt-1 rounded-md border border-gray-200 bg-gray-50 p-2 text-gray-800">
              {{ $complain->lokasi_unit }}
            </div>
          </div>
          <div class="mb-4 space-y-2">
            <x-input-label :value="__('Photo')" />
            <div class="mt-1">
              @if ($complain->photo)
                <img src="{{ asset('storage/' . $complain->photo) }}" alt="Foto Keluhan"
                  class="h-32 w-32 rounded object-cover" />
              @else
                <span class="text-gray-400">-</span>
              @endif
            </div>
          </div>

          <div class="flex justify-end">
            <a href="{{ route('complain.index') }}"
              class="mr-2 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
              Kembali
            </a>
          </div>
        </div>


      </div>
    </div>
  </div>
  </div>
</x-app-layout>
