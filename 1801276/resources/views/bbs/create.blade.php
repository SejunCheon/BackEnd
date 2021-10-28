<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('자동차 정보 등록 폼') }}
            </h2>
            <button onclick=location.href="{{ route('cars.index') }}" type="button" 
                        class="btn btn-success">목록보기</button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
    <form class="row g-3" method="post" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-12 m-2">
            <label for="name" class="form-label">자동차명</label>
            <input type="name" class="form-control" id="name"  placeholder="자동차명">
          </div>
          @error('name')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
          <div class="col-12 m-2">
            <label for="company" class="form-label">제조회사</label>
            <input type="text" class="form-control" id="company"  placeholder="제조회사">
          </div>
          @error('company')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
        <div class="col-12 m-2">
          <label for="year" class="form-label">제조년도</label>
          <input type="text" class="form-control" id="year"  placeholder="제조년도">
        </div>
        @error('year')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
        <div class="col-sm m-2">
            <label for="money" class="form-label">가격</label>
            <input type="text" class="form-control"  placeholder="가격" aria-label="money">
          </div>
          @error('money')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
          <div class="col-sm m-2">
            <label for="kind" class="form-label">차종</label>
            <input type="text" class="form-control"  placeholder="차종" aria-label="kind">
          </div>
          @error('kind')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
          <div class="col-sm m-2">
            <label for="Appearance" class="form-label">외형</label>
            <input type="text" class="form-control"  placeholder="외형" aria-label="Appearance">
          </div>
          @error('Appearance')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
          <div class="col-12 m-2">
            <label for="image" class="form-label">자동차 이미지</label>
            <input type="file" class="form-control" id="Appearance" name="image">
          </div>
          @error('image')
            <div class="text-red-800">
                <span>{{  $message }}</span>
            </div>
          @enderror
        <div class="col-12 m-2">
          <button type="submit" class="btn btn-success">글저장</button>
        </div>
      </form>
    </div>
</x-app-layout>