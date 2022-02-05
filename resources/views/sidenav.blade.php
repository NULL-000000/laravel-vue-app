<div class="ranking"><i class="fas fa-tags mr-2"></i>タグランキング</div>
<div class="f-container">
    @foreach ($tags_ranking as $tag)
        <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
            <div class="f-item">
                {{ $tag->hashtag }}
                <span>{{ $tag->articles_count }}</span>件
            </div>
        </a>
    @endforeach
</div>
<div class="ranking"><i class="fas fa-tags mr-2"></i>達成ランキング</div>
<div class="f-container">
    @foreach ($users_ranking as $user)
        <a href="{{ route('users.show', ['name' => $user->name]) }}">
            <div class="f-item">
                {{ $user->name }}
                <span>{{ $user->articles_count }}</span>件
            </div>
        </a>
    @endforeach
</div>
