@if ($instance->image)
    <a href="{{ image_url($instance->image) }}" data-fancybox>
        <img src="{{ image_url($instance->image , '80x80') }}" style="border-radius:50%">
    </a>
@else
    <a href="{{ image_url('avatar.png') }}" data-fancybox>
        <img src="{{ image_url('avatar.png') }}" style="border-radius:50%">
    </a>
@endif
