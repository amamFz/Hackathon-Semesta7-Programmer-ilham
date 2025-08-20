@props(['status'])

@php
  $colors = [
      'open' => 'bg-yellow-100 text-yellow-800',
      'in_progress' => 'bg-blue-100 text-blue-800',
      'closed' => 'bg-green-100 text-green-800',
  ];
  $color = $colors[$status] ?? 'bg-gray-100 text-gray-800';
@endphp

<span class="badge {{ $color }}">
  {{ ucfirst(str_replace('_', ' ', $status)) }}
</span>
