<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('posts') }}
    </h2>
    <button onclick=location.href="{{ route('blogs.create') }}" type="button" class="btn btn-primary font-bold text-white hover:bg-blue-700">글쓰기</button>
    </div>
</x-slot>
<x-blog-list :blogs='$blogs'/>
</x-app-layout>