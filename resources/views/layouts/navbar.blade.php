<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Sorae<small>Restaurant</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('items') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ url('blogs') }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                <li class="nav-item cart"><a href="{{ url('carts') }}" class="nav-link"><span
                            class="icon icon-shopping_cart"></span><span
                            class="bag d-flex justify-content-center align-items-center"><small class="increase-number-of-item">{{ get_total_cart_items() }}</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
