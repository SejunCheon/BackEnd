<div>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">제조회사</th>
            <th scope="col">자동차명</th>
            <th scope="col">제조년도</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($cars as $car)
              <tr>
                <td><a href="{{ route('cars.show', ['car'=>$car]) }}">{{  $car->company }}</a></td>
                <td>{{  $car->company }}</td>
                <td>{{  $car->name }}</td> {{-- 관계로 정의된 함수는 속성처럼 괄호를 안써도된다 --}}
                <td>{{  $car->year }}</td>
              </tr>
            @endforeach
          </tr>
        </tbody>
      </table>
      {{ $cars->links() }}
</div>