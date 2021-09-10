<div>
        <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
        <table class="table table-dark table-striped table-hover">
            <thead>
              <tr>
                <th>제목</th>
                {{-- <th>내용</th> --}}
                <th>작성자</th>
                <th>작성일</th>
              </tr>
            </thead>
            <tbody>
            <tr>
            @foreach ($blogs as $blog)
                <tr>
                  <td>{{ $blog->title }}</td>
                  {{-- <td>{{ $blog->content }}</td> --}}
                  <td>{{ $blog->writer->name }}</td>
                  {{-- 관계로 정의된 writer함수는 속성처럼 괄호를 안써도된다 --}}
                  <td>{{ $blog->created_at }}</td>
                </tr>
            @endforeach
            </tr>
            </tbody>
        </table>
</div>
 