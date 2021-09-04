<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <p>나는 꿈을 가지고있는 {{ $name }}이다.</p>
    @foreach ($blogs as $blog)
    <div class="my-2">
        <p >
            {{ $blog->content }}
        </p>
    </div>
    @endforeach
</div>