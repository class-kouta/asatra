@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">

        {{-- 前へ --}}
        <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">前へ</a>
        </li>

        {{-- First Page View --}}
        <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
        </li>

        {{-- Pagination Elemnts --}}
            {{-- Array Of Links --}}
            {{-- 定数よりもページ数が多い時 --}}
            @if ($paginator->lastPage() > Paginate::LINK_SUM)

                {{-- 現在ページ ≦ 2 の場合 --}}
                @if ($paginator->currentPage() <= floor(Paginate::LINK_SUM / 2))
                    <?php $start_page = 1; //最初のページ ?>
                    <?php $end_page = Paginate::LINK_SUM; ?>

                {{-- 現在ページ > 最終ページ - 2 の場合 --}}
                @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(Paginate::LINK_SUM / 2))
                    <?php $start_page = $paginator->lastPage() - (Paginate::LINK_SUM - 1); ?>
                    <?php $end_page = $paginator->lastPage(); ?>

                {{-- 上記以外の場合 --}}
                @else
                    <?php $start_page = $paginator->currentPage() - (floor((Paginate::LINK_SUM % 2 == 0 ? Paginate::LINK_SUM - 1 : Paginate::LINK_SUM)  / 2)); ?>
                    <?php $end_page = $paginator->currentPage() + floor(Paginate::LINK_SUM / 2); ?>
                @endif

            {{-- 定数よりもページ数が少ない時 --}}
            @else
                <?php $start_page = 1; ?>
                <?php $end_page = $paginator->lastPage(); ?>
            @endif

            {{-- 処理部分 --}}
            @for ($i = $start_page; $i <= $end_page; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- 最終ページ --}}
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
            </li>

            {{-- 次へ --}}
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">次へ</a>
            </li>

    </ul>
@endif
