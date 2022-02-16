<ul class="nav nav-tabs nav-justified">
    @foreach (config('consts.articles.status_type') as $status_type)
        <li class="nav-item">
            <a class="nav-link {{ $status === $status_type['status_value'] ? 'active default-color text-white' : '' }}"
                href="{{ route('articles.index', ['status=' . $status_type['status_value']]) }}">
                {{ $status_type['status_text'] }}
                <?php echo $status_type['status_icon']; ?>
            </a>
        </li>
    @endforeach
</ul>
