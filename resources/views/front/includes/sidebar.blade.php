<ul>
    <?php
    $menu = Redis::get('menu');
    $menu = json_decode($menu);
    ?>

    @foreach($menu as $item)
        <li><a href="/tag/{{ $item }}">{{ $item }}</a></li>
    @endforeach
</ul>