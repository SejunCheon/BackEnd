<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글수정 폼') }}
            </h2>
            <button onclick=location.href="{{ route('posts.show', ['post'=>$post->id]) }}" type="button" class="btn btn-success hover:bg-green-700 font-bold text-white">상세보기</button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
    <form class="row g-3" action="{{ route('posts.update', ['post'=>$post->id]) }}"
    method="post" enctype="multipart/form-data"> {{-- enctype이 있어야 파일보낼수 있음 중요* --}}
        @method('patch')
        @csrf
        <div class="col-12 m-2">
          <label for="title" class="form-label">제목</label>
          <input type="text" name="title" class="form-control" id="title" 
                            placeholder="제목 입력"
                            value="{{ $post->title }}">
          @error('title')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
        </div>
        <div class="col-12 m-2">
          <label for="content" class="form-label">글내용</label>
          <textarea class="form-control"name="content" id="content"
                            value="{{ $post->content }}"></textarea>
          @error('content')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
        </div>
        <div class="col-12 m-2">
            @if ($post->image)
                <img src="{{'/storage/images/'.$post->image}}" alt="my post image" class="w-20 h-20 rounded-full card-img-top">
            @else
                <span class="ml-3">첨부된 이미지 파일 없음</span>
            @endif
            <label for="image" class="form-label">첨부 이미지</label>
             <input type="file" name="image" class="form-control" id="image">
          </div>
        <div class="col-12 m-2">
          <button type="submit" class="btn btn-success">글수정</button>
        </div>
      </form>
    </div>
</x-app-layout>
