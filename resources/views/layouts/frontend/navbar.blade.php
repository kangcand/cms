<header id="header" id="home">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/frontend/img/logo.png')}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li class="menu-has-children">
                        <a href="{{ url('blog') }}">Blog</a>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="menu-has-children"><a href="">Dropdown</a>
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="product-details.html">Product Details</a></li>
                            <li class="menu-has-children"><a href="">Level 2</a>
                                <ul>
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
