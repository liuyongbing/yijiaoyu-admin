<?php $size = isset($size) ? $size : 10; ?>
<?php $totalPage = ceil($count / max($size, 1)); ?>
<?php $filters = isset($filters) ? $filters : []; ?>

<div class="row paginate-bottom">
    <div class="col-md-12">
        @if (isset($countInfo))
            {!!$countInfo!!}
        @endif
        <div class="dataTables_paginate paging_bootstrap  pull-right">
            <ul class="pagination">
                @if ($page > 1)
                    <li>
                        <a href="{{ route($routeName, array_merge($filters, ['page_num'=>1])) }}">
                            <i class="glyphicon glyphicon-step-backward"></i>
                        </a>
                    </li>
                @endif

                @if ($page != 1)
                    <li class="prev">
                        <a href="{{ route($routeName, array_merge($filters, ['page_num'=>$page-1])) }}">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                        </a>
                    </li>
                @endif

                @for ($i = $page > 3 ? ($page - 3):1 ; $i <= ($page > $totalPage-2 ? $totalPage:($page + 3)); $i++)
                    @if (abs($page - $i) > 3)
                        @continue
                    @endif

                    @if (abs($page - $i) > 2)
                        <li class="disabled"><a>...</a></li>
                        @continue
                    @endif

                    <li @if ($i == $page) class="active" @endif>
                        <a href="{{ route($routeName, array_merge($filters, ['page_num'=>$i])) }}">{{ $i }}</a>
                    </li>

                @endfor

                @if ($page < $totalPage)
                    <li class="next">
                        <a href="{{ route($routeName, array_merge($filters, ['page_num'=>$page+1])) }}">
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </a>
                    </li>
                @endif
                @if ($page != $totalPage && $totalPage !=0)
                    <li>
                        <a href="{{ route($routeName, array_merge($filters, ['page_num'=>$totalPage])) }}">
                            <i class="glyphicon glyphicon-step-forward"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
