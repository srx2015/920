<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
    @if($page['total_num'])
    {{$page['total_num']}} 条记录
    @endif
    @if($page['total_page'])
    {{$page['page']}}/{{$page['total_page']}} 页
    @endif
</div>
<div class="dataTables_paginate paging_bs_normal" id="datatable_paginate">
    <ul class="pagination pagination-sm">
        <li class="prev
            @if(!$page['last'])
                disabled
            @endif
        ">
            <a href="{{$page['url']}}p/{{$page['last']}}"><i class="fa fa-caret-left"></i> &nbsp;</a>
        </li>
        @for($i = $page['start']; $i <= $page['end']; $i++)
            <li
                @if($i == $page['page'])
                    class="active"
                @endif
            >
                <a href="{{$page['url']}}p/{{$i}}">{{$i}}</a>
            </li>
        @endfor
        <li class="next
            @if(!$page['next'])
                disabled
            @endif
        ">
            <a href="{{$page['url']}}p/{{$page['next']}}">&nbsp;<i class="fa fa-caret-right"></i> </a>
        </li>
    </ul>
</div>