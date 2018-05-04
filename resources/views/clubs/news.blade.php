<div class="testimonial">
    <div class="testi-image">
        <a href="#">
            @if($club->cover_img)
                <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $club->cover_img) }}" alt="{{ $club->name }}">
            @else
                <img src="https://via.placeholder.com/100x100" alt="{{ $club->name }}">
            @endif

        </a>
    </div>
    <div class="testi-content">
        <p style="font-weight: bold;">{{ $news->description }}</p>
        <div class="testi-meta">
            {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
        </div>
    </div>
</div>