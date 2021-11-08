<div class="container">
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    <div class="card" style="width: 100%">
        @if ($post->image)
            <img src="{{'/storage/images/'.$post->image }}" class= card-img-top style="width: 20rem">
        @else
            <span class="ml-3">첨부된 이미지 파일 없음</span>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->content }}</p>
          <div>
            <like-button :post="{{ $post }}" :loginuser="{{ auth()->user()->id }}"/>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">작성자 : {{ $post->writer->name }}</li>
          <li class="list-group-item">작성일 : {{ $post->created_at }}</li>
          <li class="list-group-item">수정일 : {{ $post->updated_at->diffForHumans() }}</li>
        </ul>
        {{-- <div class="card-body"><input type="text" id="myInput"></div> --}}
        <div class="card-body flex">
          @can('update', $post)
            <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="btn btn-success">수정하기</a>
          @endcan

          @can('delete', $post)
          <form class="ml-4" id="form" method="POST" enctype="multipart/form-data"
          onsubmit="event.preventDefault(); confirmDelete(event)"
          action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
            @csrf
            @method('delete') 
            {{-- <input type="hidden" name="_method" value="delete" > --}} {{-- @method('delete')와 같다 --}}
          <button type="submit" class="btn btn-danger">삭제하기</button>
        </form>
        @endcan
        </div>
      </div>

      <div class="card mt-2 mb-5" style="width:100%;">
        <comment-list :post="{{ $post }}" :loginuser="{{ auth()->user()->id }}"/>
      </div>
</div>