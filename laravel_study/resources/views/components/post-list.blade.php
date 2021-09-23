<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    {{-- @foreach ($posts as $post)
        <div class="my-2">
            <p>
                {{ $post->content }}
            </p>
        </div>
    @endforeach --}}
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">제목</th>
            <th scope="col">내용</th>
            <th scope="col">작성자</th>
            <th scope="col">작성시간</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($posts as $post)
              <tr>
                <td><a href="{{ route('posts.show', ['post'=>$post]) }}">{{  $post->title }}</a></td>
                <td>{{  $post->content }}</td>
                <td>{{  $post->writer->name }}</td> {{-- 관계로 정의된 함수는 속성처럼 괄호를 안써도된다 --}}
                <td>{{  $post->created_at->diffForHumans() }}</td>
              </tr>
            @endforeach
          </tr>
        </tbody>
      </table>
      {{ $posts->links() }}
</div>