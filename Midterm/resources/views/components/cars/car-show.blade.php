<x-guest-layout>
<div>
    <div class="w-full max-w-xs mx-auto my-6">
            <div class="my-2">
                <label for="image">자동차 이미지: </label>
                <img src="{{ $car->image }}">
            </div>
            <div class="my-2">
                <label for="company">제조회사: </label>
                <input readonly
                value="{{ $car->company->name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            </div>
            <div class="my-2">
                <label for="type">자동차명: </label>
                <input readonly
                value="{{ $car->name }}"
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
                <input readonly
                value="{{ $car->year }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" id="year" name="year">
            </div>
            <div class="my-2">
                <label for="price">가격: </label>
                <input readonly
                value="{{ $car->price }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" id="price" name="price">
            </div>
            <div class="my-2">
                <label for="type">차종: </label>
                <input readonly
                value="{{ $car->type }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="type" name="type">
            </div>
            <div class="my-2">

                <label for="style">외형: </label>
                <input readonly
                value="{{ $car->style }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" id="style" name="style">
            </div>
            <button class="my-4 px-4 py-2 bg-blue-400 rounded shadow text-white">등록</button>
</div>
</x-guest-layout>