<div class="overflow-hidden overflow-x-auto rounded-lg bg-white shadow">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        {{ $thead }}
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
      {{ $slot }}
    </tbody>
  </table>
</div>
