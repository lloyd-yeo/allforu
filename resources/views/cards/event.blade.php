<div class="col_full testimonial event-card-template" style="margin-bottom:20px;">
    <div id="post-lists" class="widget clearfix">
        <div class="fancy-title title-bottom-border">
            <h2>{{ $event->name }}</h2>
        </div>
        <div id="post-list-footer">
            <div class="spost clearfix">
                <div class="entry-image">
                    @if($event->club->cover_img)
                        <img style="margin-left: 15px; border-radius: 400px;"
                             src="{{ asset(env('UPLOAD_PATH').'/' . $event->club->cover_img) }}"/>
                    @else
                        <img style="margin-left: 15px; border-radius: 400px;"
                             src="https://via.placeholder.com/400x400"/>
                    @endif
                    {{--<a href="#" class="nobg">--}}
                        {{--<img src="canvas/images/magazine/small/1.jpg" alt="">--}}
                    {{--</a>--}}
                </div>
                <div class="entry-c">
                    <div class="entry-title">
                        <h4><a href="#">{{ $event->club->name }}</a> <span class="label label-primary" style="color:white;">Featured</span></h4>
                    </div>
                    <ul class="entry-meta">
                        <li>0 people going</li>
                    </ul>
                    <br/>
                    <ul class="entry-meta" style="margin-top:0px;">
                        <li><span><i class="icon-calendar3"></i>Date:</span> {{ \Carbon\Carbon::parse($event->created_at)->toDayDateTimeString() }}</li>
                    </ul>
                </div>
                <div id="related-portfolio" style="margin-top:30px; margin-bottom:30px;" class="owl-carousel portfolio-carousel carousel-widget"
                     data-margin="30"
                     data-nav="false" data-autoplay="5000" data-items-xxs="1"
                     data-items-xs="1" data-items-sm="1" data-items-lg="3">

                    @foreach($event->getMedia('images') as $media)
                        <p class="form-group">
                            <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                        </p>
                        <div class="oc-item">
                            <div class="iportfolio">
                                <div class="portfolio-image">
                                    <a href="#">
                                        {{--<img src="{{ $media->getUrl() }}" alt="{{ $media->name }}">--}}
                                    </a>
                                    <div class="portfolio-overlay">
                                        <a href="#" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                        <a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- .portfolio-carousel end -->
                {{--visible-lg-block--}}
                {{--visible-md-block visible-sm-block visible-xs-block--}}
                <center>
                    <a href="#" class="button button-3d button-rounded button-reveal button-large button-red tright">
                        <i class="icon-heart"></i><span>LIKE</span>
                    </a>
                </center>
                <br/>
                <center>
                    <a href="#" class="button button-3d button-xlarge
                                    button-rounded button-aqua
                                    text-center">LEARN MORE</a></center>
            </div>
        </div>
    </div>
</div>