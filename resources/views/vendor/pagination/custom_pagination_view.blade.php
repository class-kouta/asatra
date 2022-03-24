@if ($paginator->hasPages())

    {{-- 定数よりもページ数が多い時 --}}
    @if ($paginator->lastPage() > Paginate::LINK_SUM)

        {{-- 現在ページ ≦ 2 の場合 --}}
        @if ($paginator->currentPage() <= floor(Paginate::LINK_SUM / 2))
            <?php $start_page = 1; ?>
            <?php $end_page = Paginate::LINK_SUM; ?>

        {{-- 現在ページ > 最終ページ - 2 の場合 --}}
        @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(Paginate::LINK_SUM / 2))
            <?php $start_page = $paginator->lastPage() - (Paginate::LINK_SUM - 1); ?>
            <?php $end_page = $paginator->lastPage(); ?>

        {{-- 上記以外 --}}
        @else
            <?php $start_page = $paginator->currentPage() - (floor((Paginate::LINK_SUM % 2 == 0 ? Paginate::LINK_SUM - 1 : Paginate::LINK_SUM)  / 2)); ?>
            <?php $end_page = $paginator->currentPage() + floor(Paginate::LINK_SUM / 2); ?>
        @endif

    {{-- 定数よりもページ数が少ない時 --}}
    @else
        <?php $start_page = 1; ?>
        <?php $end_page = $paginator->lastPage(); ?>
    @endif


    <ul class="pagination" role="navigation">

        @if ($end_page > Paginate::LINK_SUM)
            <li class="page-item mx-1"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        @if ($end_page > Paginate::LINK_SUM + 1)
            <li class="page-item mx-1">. . .</li>
        @endif

        @for ($i = $start_page; $i <= $end_page; $i++)
            @if ($i == $paginator->currentPage())
                <li class="page-item active mx-1"><span class="page-link">{{ $i }}</span></li>
            @else
                <li class="page-item mx-1"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        @if ($end_page < $paginator->lastPage() - 1)
            <li class="page-item mx-1">. . .</li>
        @endif

        @if($end_page != $paginator->lastPage())
            <li class="page-item mx-1"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

    </ul>
@endif
