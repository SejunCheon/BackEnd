<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('cars') }}
            </h2>
            <button onclick=location.href="{{ route('cars.create') }}" type="button" 
                        class="btn btn-success">글작성하기</button>
        </div>
    </x-slot>
    {{-- <x-car-list :cars="$cars"/> --}}
</x-app-layout>