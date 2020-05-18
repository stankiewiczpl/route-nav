@foreach($links as $link)
    <div class="col-6 col-sm-6 col-md-4 mb-4">
        <div class="tiles d-flex bg-inverse rounded-lg border-0 p-1 p-md-3  ">
            <div class="d-flex flex-wrap w-100 p-2">
                <div class="align-self-start w-100 d-flex justify-content-between">
                    @if ($link->icon)
                        <i class="{{$link->icon}} fa-2x px-2 py-1 color-inverse-white-green invisible"></i>
                    @endif
                    <span class="color-inverse-dark-white">.0{{$loop->iteration	}}</span>
                </div>
                <div class="align-self-end w-100 d-flex justify-content-between visible">
                    @if ($link->icon)
                        <i class="{{$link->icon}} fa-2x py-1 color-inverse-white-green"></i>
                    @endif
                </div>
                <div class="align-self-end w-100 d-flex justify-content-between">
                    <a href="{{url($link->url)}}" class="color-inverse-dark-white d-block font-weight-bolder text-decoration-none stretched-link">@lang($link->title)</a>
                    <i class="fa fa-chevron-right color-inverse-white-green invisible d-none d-sm-block"></i>
                </div>
            </div>
        </div>
    </div>
@endforeach