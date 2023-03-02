<x-guest-layout>
    <div class="col-11 my-5 mx-auto border shadow bg-white rounded">
        <div class="row w-100">


              <div class=" col my-3">
                <form action="{{ route('index') }}" id="search_form" method="POST">
                    @csrf
                <div class="input-group rounded mb-3">
                    <input type="hidden" name="sort" value="{{ $sort }}">
                    <input type="text" class="form-control" name="search" placeholder="Color:Search" value="{{ ($search!=null)?$search:'' }}">
                    <div class="input-group-append">
                      <button class="btn btn-secondary" type="submit" >Go</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="custom-control text-right custom-switch col my-3">
                <input type="checkbox" class="custom-control-input" id="switch1" {{ ($sort=='price')?'checked':'' }} onclick="$('#search_form *[name=\'sort\']').val('price');$('#search_form').submit();">
                <label class="custom-control-label text-dark" for="switch1">sort by price</label>
              </div>

              <div class="custom-control text-right custom-switch col my-3">
                <input type="checkbox" class="custom-control-input" id="switch2" {{ ($sort=='created_at' || $sort==null)?'checked':'' }} onclick="$('#search_form *[name=\'sort\']').val('created_at');$('#search_form').submit();">
                <label class="custom-control-label text-dark" for="switch2">sort by time</label>
              </div>

            </div>




    </div>
    <div class="col-11 my-5 mx-auto border shadow bg-white">
        <div class="w-100 row">
            @if (sizeof($motors)>0)

                @foreach ($motors as $motor)
                    <div class="mt-3 col-12 col-md-4 col-xl-3">
                        <div class="card h-100 w-100" style="width:400px"  onclick="window.location.href='{{ route('ware.show',$motor->id) }}'">
                            <img class="card-img-top" src="{{ asset($motor->image) }}" alt="Card image">
                            <div class="card-body">
                            <h4 class="card-title text-dark">{{ $motor->company }} - {{ $motor->kind }} <span class="badge badge-light shadow float-right border" style="background: {{ $motor->color }} !important;">  </span></h4>
                            <p class="card-text text-secondary">weight : {{ number_format($motor->weight) }} Kg</p>
                            <p class="card-text text-success">price : {{ number_format($motor->price) }} IR</p>


                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="my-3 col-12 paginate">
                    {{ $motors->links() }}
                </div>
            @else
                <div class="my-3 col-12">
                    <div class="card h-100 w-100" style="width:400px">

                        <div class="card-body">
                        <h4 class="card-title text-center mb-0 text-dark">Not Found</h4>



                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
