<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <!-- Archives -->
    <div class="sidebar-module">
        <h4>Archives</h4>

        <ol class="list-unstyled">

            @foreach ($archives as $status)

                <li>
                    <a href="/?month={{ $status['month'] }}&year={{ $status['year'] }}">{{ $status['month'] . ' ' . $status['year']}}</a>
                </li>

            @endforeach

        </ol>
    </div>


    <!-- Tags -->
    <div class="sidebar-module">
        <h4>Archives</h4>

        <ol class="list-unstyled">

            @foreach ($tags as $tag)

                <li>
                    <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
                </li>

            @endforeach

        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->