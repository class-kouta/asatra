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


    <ul class="c-page" role="navigation">

        @if ($end_page > Paginate::LINK_SUM)
            <li><a class="c-page__link" href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        @if ($end_page > Paginate::LINK_SUM + 1)
            <li>. . .</li>
        @endif

        @for ($i = $start_page; $i <= $end_page; $i++)
            @if ($i == $paginator->currentPage())
                <li class="c-page__active"><span class="c-page__link">{{ $i }}</span></li>
            @else
                <li><a class="c-page__link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        @if ($end_page < $paginator->lastPage() - 1)
            <li>. . .</li>
        @endif

        @if($end_page != $paginator->lastPage())
            <li><a class="c-page__link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

    </ul>
@endif
