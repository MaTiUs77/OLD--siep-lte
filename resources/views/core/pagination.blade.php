@php
    if(!isset($page_link)) {
        $page_link = 'page';
    }

    if(isset($data['meta'])) {
        $data = $data['meta'];
    }
@endphp
@if($data['last_page']>1)
<div class="text-center">
    <ul class="pagination">
    @for ($i = 1; $i <= $data['last_page']; $i++)
        @php
            if(!isset($printedPg)) {
                $printedPg = 0;
            }
            $printedPg++;
            $link = request()->all();
            $link[$page_link] = $i;
        @endphp
        @if($printedPg<=3)
            @if($data['current_page']==$i)
                <li class="active"><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @else
                <li><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @endif
        @endif

        @if(
        (
        $printedPg == ($data['current_page']) ||
        $printedPg == ($data['current_page'] -1) ||
         $printedPg == ($data['current_page'] +1)
         ) &&
         ($printedPg > 3 && $printedPg < ($data['last_page']-2))
         )
            @if($data['current_page']==$i)
                <li class="active"><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @else
                <li><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @endif
        @endif

        @if(
        $printedPg>=($data['last_page'] - 2) &&
        $printedPg>3
        )
            @if($data['current_page']==$i)
                <li class="active"><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @else
                <li><a href="?{{ http_build_query($link ) }}">{{ $i }}</a></li>
            @endif
        @endif
    @endfor
</ul>
    <p>
        Resultados: <b>{{ $data['total'] }}</b>
        -
        Visualizando <b>{{ $data['from'] }}</b> a <b>{{ $data['to'] }}</b>
        -
        Pagina <b>{{ $data['current_page'] }}</b> de <b>{{ $data['last_page'] }}</b>
    </p>
</div>
@endif