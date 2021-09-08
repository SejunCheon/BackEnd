<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('posts') }}
    </h2>
<x-blog-list :blogs='$blogs'/>
</x-slot>
</x-app-layout>