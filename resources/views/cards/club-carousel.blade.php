<div class="card-wrapper">
    <div class="content-wrapper">
        <div class="card">
            <div class="front">
                <div class="arrow"><i class="fa fa-arrow-left"></i></div>
                <div class="top-pic">
                    <button style="margin-top:10px; margin-left: 20px; background-color:yellow; border-color: yellow; float:left;">FEATURED</button>
                    <a style="float:right; margin-top: 10px; margin-right: 20px; color:white; font-weight:bold;" href="https://www.codepen.io/designcouch/public">
                        <i class="fa fa-share"></i>
                    </a>
                    <a style="float:right; margin-top: 10px; margin-right: 20px; color:white; font-weight:bold;" href="https://www.codepen.io/designcouch/public">
                        <i class="fa fa-heart-o"></i>
                    </a>
                </div>
                @if($club->cover_img)
                    <div class="avatar" style="background-image: url({{ asset(env('UPLOAD_PATH').'/thumb/' . $club->cover_img) }});"></div>
                @else
                    <div class="avatar" style="background-image: url(https://via.placeholder.com/150x150);"></div>
                @endif
                <div class="info-box">
                    <div class="info">
                        <h1>{{ $club->name }}</h1>
                        <h2>{{ $club->school->name }}</h2>
                    </div>
                </div>
                <div class="social-bar">
                    <a href="/club-wall/{{ $club->id }}" style="font-weight:bold;">FIND OUT MORE</a>
                </div>
            </div>

            <div class="back">
                <div class="back-info">
                    <p>My name is Jesse Couch, and I am an award winning, intensely creative, coffee-fueled front-end web designer and developer. My style and approach are very straight-forward — I obsess about keeping things as simple as humanly possible. That's it. If you like bells and whistles for the sake of bells and whistles, look elsewhere - but if you want to remain laser-focused on the goals for your new website, it's time time to talk.</p>
                </div>
                <div class="social-bar">
                    <a href="https://www.facebook.com/designcouch" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.twitter.com/designcouch" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.dribbble.com/designcouch" target="_blank">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <a href="https://www.codepen.io/designcouch/public">
                        <i class="fa fa-codepen"></i>
                    </a>
                    <a href="javascript:void(0);" class="more-info">
                        <i class="fa fa-undo"></i>
                    </a>
                </div>
            </div>
        </div>

        <div id="background">
            <div id="background-image"></div>
        </div>
    </div>
</div>