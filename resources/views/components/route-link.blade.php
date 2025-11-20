@props(['name', 'label', 'icon' => null, 'activePatterns' => null])
@php
    $patterns = $activePatterns ?? $name;
    $isActive = is_array($patterns) ? request()->routeIs(...$patterns) : request()->routeIs($patterns);
    $url = route($name);
@endphp
<li class="menu-item {{ $isActive ? 'active' : '' }}">
    <a href="{{ $url }}" class="menu-link">
        @if($icon)
            <i class="menu-icon tf-icons bx {{ $icon }}"></i>
        @endif
        <div>{{ $label }}</div>
    </a>
</li>
