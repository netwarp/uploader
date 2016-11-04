<div class="list-group">
    <?php
    $menu = Redis::get('menu');
    $menu = json_decode($menu);
    ?>

    @if(is_array($menu))
        <?php sort($menu); ?>
        @foreach($menu as $item)
            <a href="/tag/{{ $item }}" class="list-group-item small">{{ $item }}</a>
        @endforeach
    @endif

</div>