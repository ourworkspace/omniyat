<div class="bottom-links w-100">
    <a href="{{route('site.portfolio')}}" class="back-list"><span>←</span> Back</a>

    <div class="header-container">
        <ul class="nav nav-tabs nav-tabs-noborder portal_menu_ul">
            @if(isset($about))
                <li class="active"><a data-toggle="tab" data-target="#about">about</a></li>
            @endif
            @if(isset($location))
                <li><a data-toggle="tab" data-target="#location">location</a></li>
            @endif
            @if(isset($design))
                <li><a data-toggle="tab" data-target="#design">design</a></li>
            @endif
            @if(isset($amenities_facilities))
                <li><a data-toggle="tab" data-target="#amenities">amenities & facilities</a></li>
            @endif
            @if(isset($lifeStyle))
                <li><a data-toggle="tab" data-target="#lifestyle">lifestyle</a></li>
            @endif
            @if(isset($gallery))
                <li><a data-toggle="tab" data-target="#gallery">gallery</a></li>
            @endif
            @if(isset($enquire))
                <li><a data-toggle="tab" data-target="#enquire" class="special_header_cls">enquire</a></li>
            @endif    
        </ul>

        <ul class="icon_links">
            @if(isset($vitual_tour) && count($vitual_tour) > 0)
                <li class="dropup" title="Virtual Tour"><a href="javascript:0;" class="dropbtn"><img src="{{asset('public/site/img/icons/vr.png')}}"></a>
                    <div class="dropup-content">
                        @foreach($vitual_tour as $key => $vtValue)
                            <a href="{{$vtValue->links}}" target="_blank">{{ucwords($vtValue->title)}}</a>
                        @endforeach
                    </div>
                </li>
            @endif
            @if(isset($floorplan))
                <li title="Floor plan"><a href="javascript:void(0)" data-toggle="modal" data-target="#download_modal"><img src="{{asset('public/site/img/icons/floorplan.png')}}"></a></li>
            @endif
            @if(isset($brochure))
                <li title="Brochure"><a href="javascript:void(0)" data-toggle="modal" data-target="#download_modal_1"><img src="{{asset('public/site/img/icons/brouchure.png')}}"></a></li>
            @endif
        </ul>
    </div>
</div>