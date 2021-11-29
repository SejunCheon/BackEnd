<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-xs mx-auto my-6">
        <form action="{{ route('cars.store') }}"
            enctype="multipart/form-data"
            method="post"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="my-2">
                <label for="image">자동차 이미지: </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="file" id="image" name="image">
                @error('image')
                <div  class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            <div class="my-2">
                <label for="company">제조회사: </label>
                <select
                value="{{ old('company') }}"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                id="company" name="company_id">
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company')
                <div  class="my-4 text-red-400">
                    <span>
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>
            <div class="my-2">
                <label for="name">자동차명: </label>
                <input
                value="{{ old('name') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="name" name="name">
            </div>
            @error('name')
            <div  class="my-4 text-red-400">
                <span>
                    {{ $message }}
                </span>
            </div>
            @enderror
            <div class="my-2">
                <label for="year">제조년도: </label>
                <input
                value="{{ old('year') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" id="year" name="year">
            </div>
            @error('year')
            <div  class="my-4 text-red-400">
                <span>
                    {{ $message }}
                </span>
            </div>
            @enderror
            <div class="my-2">
                <label for="price">가격: </label>
                <input
                value="{{ old('price') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" id="price" name="price">
            </div>
            @error('price')
            <div  class="my-4 text-red-400">
                <span>
                    {{ $message }}
                </span>
            </div>
            @enderror
            <div class="my-2">

                <label for="type">차종: </label>
                <input
                value="{{ old('type') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="type" name="type">
            </div>
            @error('type')
            <div  class="my-4 text-red-400">
                <span>
                    {{ $message }}
                </span>
            </div>
            @enderror
            <div class="my-2">

                <label for="style">외형: </label>
                <input
                value="{{ old('style') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="style" name="style">
            </div>
            @error('style')
            <div  class="my-4 text-red-400">
                <span>
                    {{ $message }}
                </span>
            </div>
            @enderror
            <button class="my-4 px-4 py-2 bg-blue-400 rounded shadow text-white">등록</button>
        </form>
    </div>
</x-app-layout>
