<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    <div class="card" style="width: 18rem;">
        @if ($post->image)
            <img src="/storage/images/{{ $post->image }}" class="card-img-top" >
        @else
            <span>첨부된 사진 없음</span>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->content }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">작성자 : {{ $post->writer->name }}</li>
          <li class="list-group-item">작성일 : {{ $post->created_at }}</li>
          <li class="list-group-item">수정일 : {{ $post->updated_at }}</li>
        </ul>
        <div class="card-body">
          <button class="btn btn-success">수정하기</button>
          <button class="btn btn-danger">삭제하기</button>
        </div>
      </div>
</div>