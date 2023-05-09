<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark " style="width:100%; height:90vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Blog App</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="{{route('users.index')}}" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Users
        </a>
      </li>
      <li>
        <a href="{{route('posts.index')}}" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Posts
        </a>
      </li>


    </ul>

  </div>
