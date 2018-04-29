<div class="iportfolio">
    <div class="portfolio-image">
        <a href="canvas/portfolio-single.html">
            <img src="{{ $image }}" alt="Open Imagination">
        </a>
        <div class="portfolio-overlay">
            <a href="{{ $image }}" class="left-icon"
               data-lightbox="image"><i class="icon-line-plus"></i></a>
            <a href="canvas/portfolio-single.html" class="right-icon"><i
                        class="icon-line-ellipsis"></i></a>
        </div>
    </div>
    <div class="portfolio-desc testimonial">

        {{--@if ($club->cover_img)--}}
            {{--<a href="{{ asset(env('UPLOAD_PATH').'/'.$club->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$club->cover_img) }}"></a>--}}
        {{--@endif--}}

        <div class="fbox-desc center">
            <img class="center" style="display: inline;
            width:64px; height:64px; border-radius:64px; border-style:solid; border-width:1px; border-color:black;" src="http://206.189.42.39/thumb/1525030196-sbs-logo.jpeg" alt="">
            <h3 style="margin-top:20px;">NTU Biological Science Club<span class="subtitle">Nanyang Technological University</span></h3>
            <p><a href="#" class="button button-3d button-rounded button-blue" style="margin-top:20px;"><i class="icon-angle-right"></i>Find out</a></p>
        </div>

        {{--<div id="post-list-footer">--}}
            {{--<div class="spost clearfix">--}}
                    {{--<div class="entry-image">--}}
                        {{--<a href="#" class="nobg">--}}
                            {{--<img src="canvas/images/magazine/small/1.jpg"--}}
                                                      {{--alt="">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--<div class="entry-c">--}}
                    {{--<div class="entry-title">--}}
                        {{--<h3><a href="#">NTU Biological Science Club</a></h3>--}}
                    {{--</div>--}}
                    {{--<ul class="entry-meta">--}}
                        {{--<li>Nanyang Technological University</li>--}}
                    {{--</ul>--}}
                    {{--<br/>--}}
                    {{--<a href="#"--}}
                       {{--class="button button-rounded button-reveal button-large button-blue tright"--}}
                       {{--style="margin-left:0;">--}}
                        {{--<i class="icon-angle-right"></i>--}}
                        {{--<span style="color:white; margin-top:0;">Find out more</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>