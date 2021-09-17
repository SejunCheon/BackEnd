<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('posts') }}
            </h2>
            <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-success hover:bg-green-700 font-bold text-white">목록보기</button>
        </div>
    </x-slot>
    <x-post-show :post="$post"/>
</x-app-layout>
