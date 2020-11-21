 <!-- Pagination ==== -->
<nav class="wt-pagination mt-5">
    <ul>
        @if($paginator->onFirstPage())
        <li class="d-none"><i class="lnr lnr-chevron-left"></i></li>
        @else
        <li class="wt-prevpage"><a href="{{ $paginator->previousPageUrl() }}"><i class="lnr lnr-chevron-left"></i></a></li>
        @endif
        <!-- Pagination Elements -->
        @foreach($elements as $element)
            <!-- "Three Dots" Separator -->
            @if(is_string($element))
                <li><span>{{ $element }}</span></li>
            @endif
            <!-- Array Of Links -->
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if($paginator->hasMorePages())
        <li class="wt-nextpage"><a href="{{ $paginator->nextPageUrl() }}"><i class="lnr lnr-chevron-right"></i></a></li>
        @else
        <li class="d-none"><i class="lnr lnr-chevron-right"></i></li>
        @endif
    </ul>
</nav>




