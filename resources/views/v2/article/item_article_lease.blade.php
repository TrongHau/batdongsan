<?php
use App\Library\Helpers;
$user = Auth::user();
$paging = $article->links();
$list = $article->toArray();
?>
@if($list['data'])
<table class="table table-hover list_data_article">
    <thead>
    <tr style="background: #f0f2f5;">
        <th style="width: 40px;">
            STT
        </th>
        <th style="width: 70px;">
            Mã tin
        </th>
        <th style="width: 330px;">
            Tiêu đề
        </th>
        <th style="width: 30px;">
            Xem
        </th>
        <th style="width: 90px;">
            Ngày bắt đầu
        </th>
        <th style="width: 60px;">
            Ghi chú
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($list['data'] as $key => $item)
        <tr id="item-{{$item['id']}}">
            <td>
                {{++$key + ($list['per_page'] * ($list['current_page'] - 1))}}
            </td>
            <td>
                <p>
                    {{$item['id']}}
                </p>
                @if($item['aprroval'] == 0)
                    Chưa duyệt
                @elseif($item['aprroval'] == 1)
                    Đã duyệt<br/>
                    {{date_format(date_create($item['updated_at']), "d-m-Y")}}
                @endif
            </td>
            <td>
                <span style="float: left; word-wrap: break-word; color: #055699;" id="view_18965371">
                    <img style="width: 77px; height: 62px; float: left; padding-right: 8px;" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}" alt="{{$item['title']}}">{{$item['title']}}</span>
                <div style="clear: both; text-align: right; padding-top: 5px;">
                    <a id="MainContent__userPage_ctl00_rpItems_lnkEdit_0" href="/quan-ly-tin/dang-tin-ban-cho-thue/{{$item['id']}}">
                        <img src="/imgs/sua.gif"> Sửa</a>&nbsp;
                    <a id="MainContent__userPage_ctl00_rpItems_lnkDel_0" class="btn-xoa" onclick="deleteArticle('{{$item['id']}}')" href="javascript:void(0)">Xóa</a>
                    <div style="display: none;">

                    </div>
                </div>
            </td>
            <td>
                <p>
                    <a id="pageviews_18965371" href="javascript: PageViewDaily('9fLJVubxXI8tONW9Zh5KSg==')" class="grey" style="text-decoration: underline">{{$item['views'] ? $item['views'] : '_'}}</a>
                </p>
                <p>
                    <br>
                </p>
            </td>
            <td>
                <p>
                    {{date_format(date_create($item['created_at']), "d-m-Y")}}
                </p>
            </td>
            <td>
                <p>
                    <a href="javascript:void(0)" onclick="getAllNote('{{$item['note']}}')" class="grey" style="text-decoration: underline;">{{$item['note'] ? 1 : 0}}</a>
                </p>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pager">
    <?php echo str_replace('/thong-tin-ca-nhan', '/quan-ly-tin/tin-cho-thue', $paging) ?>
</div>
@else
    Hiện tại bạn vẫn chưa có bài tin đăng nào.
@endif