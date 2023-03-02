<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-3 mb-3 w-100">
        <div class="col-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-dark">
                    Welcome
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))

        <div class="mb-3 w-100">
            <div class="col-12">
                <div class="alert alert-{{ session()->get('message')["status"] }}">
                    {{ session()->get('message')["msg"] }}
                </div>
            </div>
        </div>
    @endif
    @if (sizeof($motors)>0)
    <div class="w-100 row">
        @foreach ($motors as $motor)
            <div class="mt-3 col-12 col-md-4 col-xl-3">
                <div class="card w-100 h-100" style="width:400px">
                    <img class="card-img-top" src="{{ asset($motor->image) }}" alt="Card image">
                    <div class="card-body">
                      <h4 class="card-title text-dark">{{ $motor->company }} - {{ $motor->kind }} <span class="badge badge-light shadow float-right border" style="background: {{ $motor->color }} !important;">  </span></h4>
                      <p class="card-text text-secondary">weight : {{ number_format($motor->weight) }} Kg</p>
                      <p class="card-text text-success">price : {{ number_format($motor->price) }} IR</p>
                      <p class="card-text">

                        <a class="btn btn-warning w-100" href="{{ route('ware.edit',$motor->id) }}">Edit</a>
                      </p>

                      <p class="card-text">

                        <form action="{{ route('ware.destroy',$motor->id) }}" class="w-100" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit">Delete</button>
                        </form>



                      </p>
                    </div>
                  </div>
            </div>
        @endforeach

        <div class="my-3 col-12 paginate">
            {{ $motors->links() }}
        </div>
    </div>
    @endif
</x-app-layout>
