<x-guest-layout>
    <div class="col-11 col-md-10 col-lg-6 my-5 mx-auto border shadow bg-white">
        @if ($motor)

            <div class="my-3 col-12">
                <div class="card h-100 w-100">
                    <img class="card-img-top" src="{{ asset($motor->image) }}" alt="Card image">

                    <div class="card-body">
                    <h4 class="card-title text-dark">{{ $motor->company }} - {{ $motor->kind }} <span class="badge badge-light shadow float-right border" style="background: {{ $motor->color }} !important;">  </span></h4>
                    <p class="card-text text-secondary">weight : {{ number_format($motor->weight) }} Kg</p>
                    <p class="card-text text-success">price : {{ number_format($motor->price) }} IR</p>

                    <p class="card-text text-info">created_time : {{ $motor->created_at->format('Y/m/d') }}</p>
                    <p class="card-text text-primary">update_time : {{ $motor->updated_at->format('Y/m/d') }}</p>
                    <p class="card-text text-secondary">support_mail : {{ $motor->user->email }}</p>

                    </div>
                </div>
            </div>


        @endif
    </div>
</x-guest-layout>
