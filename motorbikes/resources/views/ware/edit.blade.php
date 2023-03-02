<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Ware') }}
        </h2>
    </x-slot>


    @if (session()->has('message'))

        <div class="mt-4 w-100">
            <div class="col-12">
                <div class="alert alert-{{ session()->get('message')["status"] }}">
                    {{ session()->get('message')["msg"] }}
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())

        <div class="mt-4 w-100">
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="col-10 col-md-8 my-4 col-xl-6 mx-auto row bg-white shadow border">
        <form action="{{ route('ware.update',$motor->id) }}" class="w-100" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="col-12 my-3">
                <x-label for="company" :value="__('Company')" />
                <x-select id="company" class="block mt-1 w-full"
                                    type="text"
                                    name="company"

                                    required>
                    @foreach (["Honda","Kawasaki","Suzuki","Yamah"] as $vcom)
                        <option {{ ($vcom == $motor->company)?'selected':'' }} value="{{ $vcom }}">{{ $vcom }}</option>
                    @endforeach
                </x-select>
            </div>


            <div class="col-12 mb-3">
                <x-label for="kind" :value="__('Model')" />
                <x-input id="kind" class="block mt-1 w-full"
                                    type="text"
                                    name="kind"
                                    value="{{ $motor->kind }}"
                                    required/>
            </div>

            <div class="col-12 mb-3">
                <x-label for="color" :value="__('Color')" />
                <x-input id="color" class="block mt-1 w-full"
                                    type="text"
                                    name="color"
                                    value="{{ $motor->color }}"
                                    required/>
            </div>

            <div class="col-12 mb-3">
                <x-label for="weight" :value="__('Weight')" />
                <x-input id="weight" class="block mt-1 w-full"
                                    type="number"
                                    name="weight"
                                    value="{{ $motor->weight }}"
                                    required/>
            </div>

            <div class="col-12 mb-3">
                <x-label for="price" :value="__('Price')" />
                <x-input id="price" class="block mt-1 w-full"
                                    type="number"
                                    name="price"
                                    value="{{ $motor->price }}"
                                    required/>
            </div>

            <div class="col-12 mb-3">
                <x-label for="image" :value="__('Image')" />
                <x-input id="image" class="block mt-1 w-full"
                                    type="file"
                                    name="image"
                                    />
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-success" type="submit">Edit</button>
            </div>
        </form>
    </div>

</x-app-layout>
