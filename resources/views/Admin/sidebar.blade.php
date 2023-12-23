<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="user-profile">
    <div class="user-image">
      <img src="/template/admin/images/logo.png">
    </div>
    <div class="user-name">
        TRANLAM
    </div>
    <div class="user-designation">
        Library
    </div>
  </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/admin">
        <i class="icon-clipboard menu-icon"></i>
        <span class="menu-title">Statistics</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#cate" aria-expanded="false" aria-controls="cate">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="cate">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/menus/add">Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/menus/list">List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#author" aria-expanded="false" aria-controls="author">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Author</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="author">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/author/add">Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/author/list">List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/users/add">Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/users/list_librarian">Librarian</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/users/list_readers">Readers</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-file menu-icon"></i>
        <span class="menu-title">Book</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/books/add">Add</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/books/list">List</a></li>
        </ul>
      </div>
    <li class="nav-item">
      <a class="nav-link" href="/admin/callCards/list">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">CallCard</span>
      </a>
    </li></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="icon-video menu-icon"></i>
        <span class="menu-title">Videos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <i class="icon-image menu-icon"></i>
        <span class="menu-title">Images</span>
      </a>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link" href="pages/icons/feather-icons.html">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="docs/documentation.html">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li> --}}
  </ul>
</nav>