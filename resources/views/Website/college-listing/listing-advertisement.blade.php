@foreach ($advertisements as $advertisement)
<span><img class="listing_image"
        src="{{ asset('public/' . $advertisement->image) }}"
        alt="image">
</span>
<br>
<br>
@endforeach