@foreach ($article->comments as $comment)
  <li class="list-group-item">
    <div class="py-3 w-100 d-flex">
        <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
            @if ($comment->user->image)
                <img src="{{ $comment->user->image }}" alt="Contact Person" class="img-fuild rounded-circle btn btn-outline-dark waves-effect p-0" width="60" height="60" style="width:90px; height:90px; background-position:center; border-radius:50%; object-fit:cover;"/>
            @else
                <i class="far fa-user-circle fa-5x text-light"></i>
            @endif
        </a>
        <div class="ml-2 d-flex flex-column">
            <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="in-link text-dark">
                <p class="font-weight-bold mb-0">
                    {{ $comment->user->name }}
                </p>
            </a>
        </div>
        <div class="d-flex justify-content-end flex-grow-1">
            <p class="mb-0 font-weight-lighter">
                {{ $comment->created_at->format('Y-m-d H:i') }}
            </p>
        </div>
    </div>
    <div class="py-3">
        {!! nl2br(e($comment->comment)) !!}
    </div>
    @if ($comment->user->id == Auth::id())
    <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </a>
    @endif
  </li>
@endforeach
