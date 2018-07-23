<div role="document" data-spy="scroll" data-target="#sampleScrollSpy" data-offset="160" id="top">
    <div id="sampleScrollSpy">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        めし日和
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ url('/calendar') }}">
                        めし日和
                    </a>
                    @endguest
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                         <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
    </div>
</div>