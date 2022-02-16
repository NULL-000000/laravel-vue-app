<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
        <a class="nav-link {{ $hasArticles ? 'active default-color text-white' : '' }}"
            href="{{ route('users.show', ['name' => $user->name]) }}">
            記事
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $hasLikes ? 'active default-color text-white' : '' }}"
            href="{{ route('users.likes', ['name' => $user->name]) }}">
            いいね
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $hasFollowings ? 'active default-color text-white' : '' }}"
            href="{{ route('users.followings', ['name' => $user->name]) }}">
            フォロー
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $hasFollowers ? 'active default-color text-white' : '' }}"
            href="{{ route('users.followers', ['name' => $user->name]) }}">
            フォロワー
        </a>
    </li>
</ul>


{{-- <li>
    <a href="{{ route('users.followings', ['name' => $user->name]) }}">
        {{ $user->count_followings }} フォロー
    </a>
</li>
<li>
    <a href="{{ route('users.followers', ['name' => $user->name]) }}">
        {{ $user->count_followers }} フォロワー
    </a>
</li> --}}
