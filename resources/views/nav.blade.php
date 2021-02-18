<!-- <nav class="navbar navbar-expand">

  <a class="navbar-brand" href="{{route('articles.index')}}><i class="far fa-sticky-note mr-1"></i>BookTree</a>

  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" href="{{route('articles.index')}}">みんなの投稿</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('books.index')}}">Mylibrary</a>
    </li>

    <li class="nav-item">
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
        <button form="logout-button" type="submit">
        ログアウト
        </button>
      </form>
    </li>

    @auth
    <!-- Dropdown -->
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  <!-- </ul>

</nav> --> 

