<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Buat Keluhan') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form action="{{ route('complain.update', $complain->id) }}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-2">
              <x-input-label for="title" :value="__('Judul Keluhan')" />
              <x-text-input id="title" name="title" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ old('title', $complain->title) }}" />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="space-y-2">
              <x-input-label for="description" :value="__('Deskripsi Keluhan')" />
              <x-textarea id="description" name="description" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $complain->description) }}</x-textarea>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="space-y-2">
              <x-input-label for="lokasi_unit" :value="__('Lokasi Unit')" />
              <x-text-input id="lokasi_unit" name="lokasi_unit" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ old('lokasi_unit', $complain->lokasi_unit) }}" />
              <x-input-error :messages="$errors->get('lokasi_unit')" class="mt-2" />
            </div>
            <div class="space-y-2">
              <x-input-label for="photo" :value="__('Photo (opsional, upload jika ingin ganti)')" />
              <x-text-input id="photo" name="photo" type="file"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ old('photo') }}" />
              <x-input-error :messages="$errors->get('photo')" class="mt-2" />
              <div class="mt-1">
                @if ($complain->photo)
                  <img src="{{ asset('storage/' . $complain->photo) }}" alt="Foto Keluhan"
                    class="h-32 w-32 rounded object-cover" />
                @else
                  <span class="text-gray-400">-</span>
                @endif
              </div>


              @if (
                  (auth()->user() && auth()->user()->role === 'admin') ||
                      auth()->user()->role === 'supervisor' ||
                      auth()->user()->role === 'staff')
                <div class="space-y-2">
                  <x-input-label for="comment" :value="__('Komentar Admin (opsional)')" />
                  <x-textarea id="comment" name="comment" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('comment', $complain->comment) }}</x-textarea>
                  <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                </div>
              @endif
            </div>
            <div class="flex justify-end gap-2">
              <a href="{{ route('complain.index') }}"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                Batal
              </a>
              <x-button>
                Simpan
              </x-button>
            </div>
          </form>

          @if (auth()->user() && auth()->user()->role === 'admin')
            @if ($complain->status !== 'closed')
              <form method="POST" action="{{ route('complain.close', $complain->id) }}" class="mt-4">
                @csrf
                @method('PUT')
                <x-button type="submit" class="bg-green-600">
                  Tutup Keluhan
                </x-button>
              </form>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
