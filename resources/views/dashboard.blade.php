<!-- filepath: resources/views/dashboard.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold leading-tight text-gray-800">
      {{ __('Dashboard Analisis') }}
    </h2>
  </x-slot>

  <div class="min-h-screen bg-gray-50 py-8">
    <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

      <!-- Grafik keluhan bulanan -->
      <div class="rounded-xl bg-white p-6 shadow">
        <h3 class="mb-4 flex items-center gap-2 text-lg font-semibold text-gray-700">
          <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M3 3v18h18"></path>
            <path d="M21 21V3H3"></path>
          </svg>
          Grafik Keluhan Bulanan
        </h3>
        <div class="h-64">
          <canvas id="monthlyChart"></canvas>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        <!-- Grafik per kategori -->
        <div class="rounded-xl bg-white p-6 shadow">
          <h3 class="mb-4 flex items-center gap-2 text-lg font-semibold text-gray-700">
            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            Grafik Keluhan per Kategori
          </h3>
          <div class="h-64">
            <canvas id="categoryChart"></canvas>
          </div>
        </div>

        <!-- Top 10 Pelapor -->
        <div class="rounded-xl bg-white p-6 shadow">
          <h3 class="mb-4 flex items-center gap-2 text-lg font-semibold text-gray-700">
            <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path d="M12 4v16m8-8H4"></path>
            </svg>
            Top 10 Pelapor
          </h3>
          <div class="h-64">
            <canvas id="topUserChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const monthlyLabels = {!! json_encode(array_keys($monthly->toArray())) !!};
      const monthlyData = {!! json_encode(array_values($monthly->toArray())) !!};
      const categoryLabels = {!! json_encode(array_keys($perCategory->toArray())) !!};
      const categoryData = {!! json_encode(array_values($perCategory->toArray())) !!};
      const topUserLabels = {!! json_encode(array_keys($topUsers->toArray())) !!};
      const topUserData = {!! json_encode(array_values($topUsers->toArray())) !!};

      // Grafik Bulanan
      new Chart(document.getElementById('monthlyChart'), {
        type: 'line',
        data: {
          labels: monthlyLabels,
          datasets: [{
            label: 'Jumlah Keluhan',
            data: monthlyData,
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37,99,235,0.15)',
            fill: true,
            tension: 0.4,
            pointRadius: 4,
            pointBackgroundColor: '#2563eb'
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });

      // Grafik per Kategori
      new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
          labels: categoryLabels,
          datasets: [{
            label: 'Jumlah Keluhan',
            data: categoryData,
            backgroundColor: '#22c55e',
            borderRadius: 6,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });

      // Top 10 Pelapor
      new Chart(document.getElementById('topUserChart'), {
        type: 'bar',
        data: {
          labels: topUserLabels,
          datasets: [{
            label: 'Jumlah Keluhan',
            data: topUserData,
            backgroundColor: '#f59e42',
            borderRadius: 6,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          indexAxis: 'y',
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
    });
  </script>
</x-app-layout>
