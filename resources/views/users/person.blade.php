<div class="user-card">
    <div class="meta">
        @if ($person->image)
            <div class="photo" style="background-image: url({{ $person->image }})"></div>
        @else
            <div class="photo"
                style="background-image: url(https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80)">
            </div>
        @endif
        <ul class="details">
            @if (Auth::id() === $person->id && Auth::id() !== 1)
                <div class="user-edit">
                    <div class="edit-btn">
                        <a class="edit-text" href="{{ route('users.edit', ['name' => $person->name]) }}">編集</a>
                    </div>
                </div>
            @endif
        </ul>
    </div>
    <div class="description">
        <div class="card-header">
            <div class="author">
                <i class="fas fa-user"></i>
                <a href="{{ route('users.show', ['name' => $person->name]) }}">
                    {{ $person->name }}
                </a>
            </div>
            <div class="follow">
                @if (Auth::id() !== $person->id)
                    <follow-button class="ml-auto"
                        :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $person->name]) }}">
                    </follow-button>
                @endif
            </div>
        </div>
        <div class="card-body">
            {{ $person->introduction }}
            @if (Auth::id() === $person->id)
                @if (Auth::id() === 1)
                    <span>※ゲストユーザーは、ユーザー名とメールアドレスを編集できません。</span>
                @endif
            @endif
        </div>
        <div class="card-footer">
            <ul>
                <li>
                    <a href="{{ route('users.followings', ['name' => $person->name]) }}">
                        {{ $person->count_followings }} フォロー
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.followers', ['name' => $person->name]) }}">
                        {{ $person->count_followers }} フォロワー
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
