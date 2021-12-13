<section class="container">
    <div class="d-flex justify-content-center">
        <nav aria-label="page pagination">
            @if ($paginator->hasPages())
                <ul class="pagination justify-content-end">
                
                    @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link rounded-0" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link rounded-0" href="{{ $paginator->previousPageUrl() }}">Previous</a>
                    </li>
                    @endif


                
                    @foreach ($elements as $element)
                    
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif


                    
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link rounded-0">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link rounded-0" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach


                    
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link rounded-0" href="{{ $paginator->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link rounded-0" href="{{ $paginator->nextPageUrl() }}">Next</a>
                        </li>
                    @endif
                </ul>
            @endif 
        </nav>
    </div>
</section>