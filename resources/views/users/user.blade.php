<div class="card mt-3">
    <div class="card-body">
      <div class="d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{-- <img src="{{ $user->image }}" id="img" class="img-fuild rounded-circle" width="80" height="80"> --}}
            <img src="{{ $user->image }}" alt="Contact Person" class="img-fuild rounded-circle" width="60" height="60">
        </a>
        @if( Auth::id() !== $user->id )
          <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
          >
          </follow-button>
        @endif
      </div>
      <h2 class="h5 card-title m-0">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          {{ $user->name }}
        </a>
      </h2>
      @if( Auth::id() === $user->id )
      <div class="ml-auto">
        <a class='btn btn-amber rounded-pill waves-effect' href="{{ route('users.edit', ['name' => $user->name]) }}">編集</a>
      </div>
      @endif
    </div>
    <div class="card-body">
      <div class="card-text">
        <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
          {{ $user->count_followings }} フォロー
        </a>
        <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
          {{ $user->count_followers }} フォロワー
        </a>
      </div>
    </div>
  </div>
