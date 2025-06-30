<div class="card" style="width: 18rem;">
    @if($image)
        <img src="{{ asset($image) }}" class="card-img-top" alt="Card Image">
    @endif
    <div class="card-body">
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $slot }}</p>
    </div>
</div>
