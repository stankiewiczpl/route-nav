@if (count($crumbs))
    <ol class="breadcrumb">
        @foreach ($crumbs as $crumb)

            @if ($crumb->url && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ url($crumb->url) }}">{{ $crumb->title }}
                        @isset($crumb->icon )
                            <i class="{{$crumb->icon}}"></i>
                        @endisset
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    {{ $crumb->title }}
                    @isset($crumb->icon )
                        <i class="{{$crumb->icon}}"></i>
                    @endisset
                </li>
            @endif

        @endforeach
    </ol>
@endif