<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ Locales::getFlag() }}"> {{ Locales::getName() }}
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach(Locales::get() as $locale)
                    <li>
                        <a href="{{ route('dashboard.language.update', $locale->code) }}">
                            <img src="{{ $locale->flag }}"> &nbsp; {{ $locale->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
