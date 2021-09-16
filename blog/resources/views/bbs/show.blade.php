<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('상세보기') }}
        </h2>
        <button onclick=location.href="{{ route('blogs.index') }}" type="button" class="btn btn-primary font-bold text-white hover:bg-blue-700">목록보기</button>
        </div>
    </x-slot>
    <x-blog-show :blog='$blog'/>
</x-app-layout>