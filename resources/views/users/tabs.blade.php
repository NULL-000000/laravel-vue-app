<ul class="nav nav-tabs nav-justified">
    @foreach (config('consts.users.tabs_type') as $tabs_type)
        <li class="nav-item">
            <a class="nav-link {{ $tabs_status === $tabs_type['tabs_value'] ? 'active default-color text-white' : '' }}"
                href="{{ route('users.' . $tabs_type['tabs_value'], ['name' => $user->name,'tabs_status=' . $tabs_type['tabs_value']]) }}">
                {{ $tabs_type['tabs_text'] }}
                <?php echo $tabs_type['tabs_icon']; ?>
            </a>
        </li>
    @endforeach
</ul>
