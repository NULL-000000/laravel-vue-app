<div class="user-card">
    <div class="meta">
        @if ($user->image)
            <div class="photo" style="background-image: url({{ $user->image }})"></div>
        @else
            <div class="photo"
                style="background-image: url(https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80)">
            </div>
        @endif
        <ul class="details">
            @if (Auth::id() === $user->id && Auth::id() !== 1)
                <div class="user-edit">
                    <div class="edit-btn">
                        <a class="edit-text" href="{{ route('users.edit', ['name' => $user->name]) }}">編集</a>
                    </div>
                </div>
            @endif
        </ul>
    </div>
    <div class="description">
        <div class="card-header">
            <div class="author">
                <i class="fas fa-user"></i>
                <a href="{{ route('users.show', ['name' => $user->name]) }}">
                    {{ $user->name }}
                </a>
            </div>
            <div class="follow">
                @if (Auth::id() !== $user->id)
                    <follow-button class="ml-auto"
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                    </follow-button>
                @endif
            </div>
        </div>
        <div class="card-body">
            {{ $user->introduction }}
            @if (Auth::id() === $user->id)
                @if (Auth::id() === 1)
                    <span>※ゲストユーザーは、ユーザー名とメールアドレスを編集できません。</span>
                @endif
            @endif
        </div>
        <div class="card-footer">
            <ul>
                <li>
                    <a href="{{ route('users.followings', ['name' => $user->name]) }}">
                        {{ $user->count_followings }} フォロー
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.followers', ['name' => $user->name]) }}">
                        {{ $user->count_followers }} フォロワー
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
