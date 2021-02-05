<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><span>{{ $title }}</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                @foreach($navbars as $navbar)

                    @if($loop->first)
                        <li class="nav-item active">
                            <a href="{{ $navbar['href'] }}" class="nav-link">{{ $navbar['label'] }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ $navbar['href'] }}" class="nav-link">{{ $navbar['label'] }}</a>
                        </li>
                    @endif

                @endforeach
            </ul>
        </div>
    </div>
</nav>
