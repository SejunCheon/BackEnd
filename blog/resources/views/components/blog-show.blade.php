<div class="container">
    <!-- Well begun is half done. - Aristotle -->
    <div class="card" style="width: 18rem 100% margin-10px" >
        
        @if ($blog->image)
            <img src="{{ '/storage/image/'.$blog->image }}" class="card-img-top" alt="..."/>
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $blog->title }}</h5>
          <p class="card-text">{{ $blog->content }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">등록일 : {{ $blog->created_at}}</li>
          <li class="list-group-item">수정일 : {{ $blog->updated_at->diffForHumans()}}</li>
          <li class="list-group-item">작성자 : {{ $blog->writer->name }}</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">수정하기</a>
          <a href="#" class="card-link">삭제하기</a>
        </div>
      </div>
</div>