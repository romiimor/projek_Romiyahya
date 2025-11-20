<div class="d-flex justify-content-between align-items-center mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($items as $label => $url)
                @if($loop->last)
                    {{-- Item terakhir (Aktif) --}}
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $label }}
                    </li>
                @else
                    {{-- Item sebelumnya (Link) --}}
                    <li class="breadcrumb-item">
                        <a href="{{ $url }}">{{ $label }}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>