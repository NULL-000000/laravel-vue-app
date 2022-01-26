<ul class="nav nav-tabs nav-justified mt-3">
    @foreach (config('consts.articles.status_type') as $status_type)
        <li class="nav-item">
            <a class="nav-link text-muted {{ $status === $status_type['status_value'] ? 'active dusty-grass-gradient' : '' }}"
                href="{{ route('articles.search', ['sort='.$sort, 'keyword='.$keyword, 'status='.$status_type['status_value']]) }}">
                {{ $status_type['status_text'] }}
            </a>
        </li>
    @endforeach
</ul>
