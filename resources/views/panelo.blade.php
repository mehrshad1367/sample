<h2>
    <a href="{{route('panel.ads.add')}}" class="btn btn-icon ">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
            </g>
        </svg>

        <!--<i class="flaticon2-plus"></i>-->
    </a>

    {{@$page_title}}

    @if(Auth::user()->task=='marketing')
        <div class="col-sm-12 " style="z-index:2; ">
            <form action="{{url('panel/search/advertising')}}" method="GET" >
                <div class="">
                    <div class="">
                        <div class="">
                            <input type="text" class="form-control " placeholder="جستجو..." id="q" name="q" style="border-radius:20px; border:1px solid orangered" />
                            <select name="type" class="form-control">
                                <option value="ID">کد</option>
                                <option value="Title">عنوان</option>
                                <option value="username">شناسه کاربری</option>
                            </select>
                            <div class="input-group-btn">
                                <button class="btn btn-primary " type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif

</h2>

<hr>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--begin:: Portlet-->
    @if(isset($ads))
        @forelse($ads as $item)
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">
                            <div class="kt-widget__media kt-hidden-">
                                {{--                                    @include('member.ads.pic')--}}
                            </div>
                            <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                {{\App\Helpers\Functions::toUtf($item->Title)}}
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__head">
                                    <a href="{{route('panelo.ads.show',[$item->ID,\App\Helpers\Slug::url_slug(\App\Helpers\Functions::toUtf($item->Title))])}}" class="kt-widget__username">
                                        <i class="flaticon2-correct kt-font-success"></i>
                                        {{$item->ID}}  {{\App\Helpers\Functions::toUtf($item->Title)}}
                                        {{--<p>{{\App\Helpers\Functions::enTofa(number_format($item->price))}}--}}
                                        {{--ریال--}}
                                        {{--</p>--}}
                                    </a>

                                    <div class="kt-widget__action">
                                        {{--                                    <button type="button" class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;--}}
                                        @if($item->Point)
                                            @for($i=1; $i<=$item->Point; $i++)
                                                <i class="fa fa-star" style="color:gold"></i>
                                            @endfor
                                        @endif
                                        @switch($item->Duration)
                                            @case('1')
                                            <button type="button" class="btn btn-success btn-sm btn-upper">یک هفته ای</button>
                                            @break
                                            @case('2')
                                            <button type="button" class="btn btn-success btn-sm btn-upper">یک ماهه</button>
                                            @break
                                            @case('3')
                                            <button type="button" class="btn btn-success btn-sm btn-upper">سه ماهه</button>
                                            @break
                                            @case('4')
                                            <button type="button" class="btn btn-success btn-sm btn-upper">شش ماهه</button>
                                            @break

                                        @endswitch

                                        @switch($item->PlanType)
                                            @case('1')
                                            <button type="button" class="btn btn-brand btn-sm btn-upper">برنزی</button>
                                            @break
                                            @case('2')
                                            <button type="button" class="btn btn-brand btn-sm btn-upper">نقره ای</button>
                                            @break
                                            @case('3')
                                            <button type="button" class="btn btn-brand btn-sm btn-upper">طلایی</button>
                                            @break
                                            @case('4')
                                            <button type="button" class="btn btn-brand btn-sm btn-upper">پلاتینی</button>
                                            @break
                                        @endswitch
                                        <a class = "btn btn-primary" style="cursor: pointer ; color: white" href="{{url('marketing/Dads/edit',[$item->ID])}}" data-id="#" id="btn_update">ویرایش</a>
                                    </div>
                                </div>

                                <div class="kt-widget__subhead">
                                    {{--                                <a href="#"><i class="flaticon2-placeholder"></i>--}}
                                    {{--                                    منبع:--}}
                                    {{--                                    {{$item->source}}--}}
                                    {{--                                </a>--}}
                                    {{--                                <a href="#"><i class="flaticon2-new-email"></i>--}}
                                    {{--                                    دسته بندی آفتاب:--}}
                                    {{--                                    {{$item->cat}}--}}
                                    {{--                                </a>--}}
                                    {{--                                @if($item->source_id!=1)--}}
                                    {{--                                <a href="#"><i class="flaticon2-calendar-3"></i>دسته بندی منبع:--}}
                                    {{--                                {{$item->category}}--}}
                                    {{--                                @endif--}}
                                    {{--                                </a>--}}

                                </div>

                                <div class="kt-widget__info">
                                    {{--<div class="kt-widget__desc">--}}
                                    {{--{{$item->intro}}--}}
                                    {{--</div>--}}
                                    {{--                                <div class="kt-widget__progress">--}}
                                    {{--                                    <div class="kt-widget__text">--}}
                                    {{--                                        Progress--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="progress" style="height: 5px;width: 100%;">--}}
                                    {{--                                        <div class="progress-bar kt-bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="kt-widget__stats">--}}
                                    {{--                                        78%--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                        {{--                            @include('member.common.frm.stats')--}}
                    </div>
                </div>
            </div>
        @empty
            <p class="alert alert-info">موردی یافت نشد</p>
        @endforelse
    @endif
<!--end:: Portlet-->
    @if(isset($ads)){{$ads->links()}} @endif
</div>
