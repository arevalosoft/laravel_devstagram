<div>
    @if ($posts->count())
      <div class="grid md:grid-cols-2 ls:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div>
          <a href="{{ route('posts.show', [$post->user, $post]) }}">
            <img src="{{ asset('uploads')  . '/' . $post->image }}" alt="Imagen del Post :: {{ $post->title }}">
          </a>
        </div>
        @endforeach
      </div>

      <div class="my-5">
        {{ $posts->links('pagination::tailwind'); }}
      </div>
    @else
      <p class="text-gray-600 uppercase text-sm font-bold text-center">¡No hay posts para mostrar!</p>
    @endif
</div>