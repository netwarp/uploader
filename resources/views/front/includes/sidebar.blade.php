<ul>
    <?php
    $menu = Redis::get('menu');
    $menu = json_decode($menu);
    ?>

    @if(is_array($menu))
        <?php sort($menu); ?>
        @foreach($menu as $item)
            <li><a href="/tag/{{ $item }}">{{ $item }}</a></li>
        @endforeach
    @endif

</ul>