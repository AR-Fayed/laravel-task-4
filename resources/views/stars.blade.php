@foreach ([1, 2, 3, 4, 5] as $i)
    @if ($i <= $product['rating'])
        <div class='d-flex align-items-center justify-content-center mb-1'>
            <small class='fa fa-star text-primary mr-1'></small>
        </div>
    @elseif ($i <= $product['rating'] + 0.5)
        <div class='d-flex align-items-center justify-content-center mb-1'>
            <small class='fa fa-star-half-alt text-primary mr-1'></small>
        </div>
    @else
        <div class='d-flex align-items-center justify-content-center mb-1'>
            <small class='far fa-star text-primary mr-1'></small>
        </div>
    @endif
@endforeach
