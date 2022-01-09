<div class="card mt-3">
    <div class="card-body">
      <div class="d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            @if ($user->image)
            <img src="{{ $user->image }}" alt="Contact Person" class="img-fuild rounded-circle" width="60" height="60" style="width:90px; height:90px; background-position:center; border-radius:50%; object-fit:cover;"/>
            @else
            <p class="d-flex align-items-center mb-0">
                <i class="far fa-user-circle fa-5x text-secondary"></i>
                <span class="small text-muted ml-1">(未設定)</span>
            </p>
            @endif
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
      @if (Auth::id() == 1)
      <div class="card-title mt-3">
          <p class="text-danger">※ゲストユーザーは、ユーザー名とメールアドレスを編集できません。</p>
      </div>
      @elseif( Auth::id() === $user->id && Auth::id() !== 1)
      <div class="ml-auto">
        <a class='btn btn-amber rounded-pill waves-effect' href="{{ route('users.edit', ['name' => $user->name]) }}">編集</a>
      </div>
      <div class="ml-auto">
        <a class='btn btn-amber rounded-pill waves-effect' href="{{ route('users.resign', ['name' => $user->name]) }}">退会</a>
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
