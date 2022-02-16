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
</ul>
