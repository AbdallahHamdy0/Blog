<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('style')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    
      
    }
  </style>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    
    <header class="d-flex flex-wrap justify-content-center py-3 mb-2 border-bottom bg-dark " style="border-color: #aaa; ">
        <a href="{{route('admin')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4 text-light">Admin Panel</span>
        </a>
  
        <ul class="nav nav-pills">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
        </ul>
      </header>

      <div class="row">
        <main class="col-sm-3 " style="width:300px;">
          <div class="flex-shrink-0 p-3 bg-white rounded m-0" style="width: 280px; border-right:1px solid #ddd; height: 650px;">
              <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-5 fw-semibold">Dashboard</span>
              </a>
              <ul class="list-unstyled ps-0">
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Users
                  </button>
                  <div class="collapse show" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="{{route('user.index')}} " class="link-dark rounded">All Users</a></li>
                      <li><a href="{{route('user.create')}} " class="link-dark rounded">Create User</a></li>
                    </ul>
                  </div>
                </li>
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Posts
                  </button>
                  <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="{{route('post.index')}}" class="link-dark rounded">All Posts</a></li>
                      <li><a href="{{route('post.create')}}" class="link-dark rounded">Create Post</a></li>
                      <li><a href="{{route('comments.index')}}" class="link-dark rounded">All Comments</a></li>

                    </ul>
                  </div>
                </li>
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Categories
                  </button>
                  <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="{{route('category.index')}}" class="link-dark rounded">All  Category</a></li>
        
                    </ul>
                  </div>
                </li>
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Media
                  </button>
                  <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="{{route('media.index')}}" class="link-dark rounded">All  Media</a></li>
                      <li><a href="{{route('media.create')}}" class="link-dark rounded">Upload  Media</a></li>
                    </ul>
                  </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                  </button>
                  <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="#" class="link-dark rounded">Profile</a></li>
                      <li><a href="#" class="link-dark rounded">Settings</a></li>
                      <li>
                       
                          <a class="link-dark rounded" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        
                      
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
        </main>
        
          <div class="col-sm-9 p-5 " style="background-color: #eff8fa;" >
            <div class="container">
                @yield('Contnet')
          </div>
        </div>
      </div>

    
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="{{asset('js/script.js')}}"></script>
      @yield('script')

</body>
</html>