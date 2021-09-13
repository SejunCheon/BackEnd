<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('글쓰기 폼') }}
        </h2>
        <button onclick=location.href="{{ route('blogs.index') }}" type="button" class="btn btn-primary font-bold text-white hover:bg-blue-700">목록보기</button>
        </div>
    </x-slot>
    <div class="m-4 p-4"> {{--  margin-4 padding-4  row g-3 g = gutter 컬럼사이의 패딩--}}
        <form class="row g-3" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="col-md-6">
              <label for="title" class="form-label">제목</label>
              <input type="title" name="title" class="form-control" id="title">
            </div>
            <div class="col-12">
              <label for="content" class="form-label">내용</label>
              <textarea name="content" id="content"  class="form-control"></textarea>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">이미지</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">작성하기</button>
            </div>
          </form>
    </div>
</x-app-layout>
    