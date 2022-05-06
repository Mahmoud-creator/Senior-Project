@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 mb-4 mt-8']) }}>
        {{ $status }}
    </div>
@endif
