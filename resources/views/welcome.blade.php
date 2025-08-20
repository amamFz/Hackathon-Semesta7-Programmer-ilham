<!-- filepath: resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Complaint Management</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
  <div class="flex min-h-screen flex-col">
    <!-- Header/Navigation -->
    <header class="bg-white shadow dark:bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 dark:text-blue-400" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <h1 class="ml-3 text-2xl font-bold text-gray-900 dark:text-white">Smart Complaint</h1>
          </div>
          <div>
            @if (Route::has('login'))
              <div class="flex space-x-4">
                @auth
                  <a href="{{ url('/dashboard') }}"
                    class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Dashboard</a>
                @else
                  <a href="{{ route('login') }}"
                    class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Log
                    in</a>

                  @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                      class="rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">Register</a>
                  @endif
                @endauth
              </div>
            @endif
          </div>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <div class="flex flex-grow items-center">
      <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
          <div class="sm:text-center md:mx-auto md:max-w-2xl lg:col-span-6 lg:text-left">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl md:text-5xl dark:text-white">
              <span class="block">Manajemen Keluhan</span>
              <span class="block text-blue-600 dark:text-blue-400">yang Cerdas dan Efisien</span>
            </h2>
            <p class="mt-6 text-base text-gray-600 sm:text-lg md:text-xl dark:text-gray-300">
              Platform untuk mengelola keluhan dengan pintar, otomatis, dan terintegrasi.
              Dilengkapi dengan AI untuk menganalisis keluhan dan memberikan solusi terbaik.
            </p>
            <div class="mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                @auth
                  <a href="{{ url('/dashboard') }}"
                    class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 md:px-10 md:py-4 md:text-lg">
                    Buka Dashboard
                  </a>
                @else
                  <a href="{{ route('login') }}"
                    class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 md:px-10 md:py-4 md:text-lg">
                    Masuk
                  </a>
                @endauth
              </div>
              <div class="mt-3 sm:ml-3 sm:mt-0">
                <a href="#features"
                  class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-100 px-8 py-3 text-base font-medium text-blue-700 hover:bg-blue-200 md:px-10 md:py-4 md:text-lg dark:bg-gray-700 dark:text-blue-300 dark:hover:bg-gray-600">
                  Fitur
                </a>
              </div>
            </div>
          </div>
          <div
            class="relative mt-12 sm:mx-auto sm:max-w-lg lg:col-span-6 lg:mx-0 lg:mt-0 lg:flex lg:max-w-none lg:items-center">
            <div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md">
              <div class="relative block w-full overflow-hidden rounded-lg bg-white dark:bg-gray-700">
                <svg class="w-full text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 005 16a5 5 0 0010 0c0-1.32-.428-2.557-1.154-3.543A5 5 0 0010 11z"
                    clip-rule="evenodd" />
                </svg>
                <div class="absolute inset-0 flex h-full w-full items-center justify-center">
                  <p class="text-center text-lg font-semibold text-white">
                    Smart Complaint Management
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="bg-white dark:bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-3xl text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
            Fitur Unggulan
          </h2>
          <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">
            Platform Smart Complaint Management yang cerdas, otomatis dan terintegrasi
          </p>
        </div>
        <dl
          class="mt-12 space-y-10 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">Auto-Assignment</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Sistem otomatis menugaskan staff yang ahli dalam kategori keluhan yang dilaporkan.
            </dd>
          </div>
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">Re-Assignment Scheduler</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Keluhan yang tidak direspons dalam 2 jam akan otomatis dialihkan ke supervisor.
            </dd>
          </div>
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">Notifikasi Telegram</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Notifikasi real-time via Telegram untuk petugas dan supervisor saat keluhan baru, terlambat, atau closed.
            </dd>
          </div>
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">PDF Report</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Laporan mingguan dalam format PDF mengenai keluhan yang masuk dan penanganannya.
            </dd>
          </div>
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">AI Analysis</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Analisis kecerdasan buatan untuk mengidentifikasi pola keluhan dan memberikan rekomendasi solusi.
            </dd>
          </div>
          <div class="relative">
            <dt>
              <svg class="absolute h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <p class="ml-9 text-lg font-medium leading-6 text-gray-900 dark:text-white">Dashboard & Analitik</p>
            </dt>
            <dd class="ml-9 mt-2 text-base text-gray-500 dark:text-gray-300">
              Dashboard real-time untuk memantau keluhan, grafik bulanan, per kategori, dan top 10 pelapor.
            </dd>
          </div>
        </dl>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="text-center">
          <p class="text-base text-gray-400">
            &copy; {{ date('Y') }} Smart Complaint Management. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>
