@if (count($links ?? ''))
    <ol class="breadcrumb">
        @foreach ($links as $link)

            @if ($link->url && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ url($link->url) }}"> @lang($link->title)
                        @isset($link->icon )
                            <i class="{{$link->icon}}"></i>
                        @endisset
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    @lang($link->title)
                    @isset($link->icon )
                        <i class="{{$link->icon}}"></i>
                    @endisset
                </li>
            @endif

        @endforeach
    </ol>
@endif