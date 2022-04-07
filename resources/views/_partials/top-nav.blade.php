<link href="{{asset('css/top-nav.css')}}" rel="stylesheet" />
<nav class="navbar navbar-light">
                    <div class="container" style="display: flex; flex-direction:row;" >
                    <a href="/all-books"><img style="width: 8rem; height:8rem;" src="{{ asset('storage/logo/TF0h8gge0pSXSheThQkF1AKY5NSMd1q4GtIuk60P.png')}}"></a>
                    </div>
                    @if(Auth::check())   
                 <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Hello,{{Auth::user()->name}}
                </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                </div>
                @else
                <div class="row mx-md-n5">
                    <div class="col px-md-2"><a class="btn btn-primary " href="/login">Login</a></div>
                    <div class="col px-md-2"><a class="btn btn-success" href="/register">Register</a></div>
                </div>
                @endif
                </nav>