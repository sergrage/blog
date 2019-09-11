<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
  <li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-dashboard"></i>
      <p>
        Главное меню
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/administrator" class="nav-link {{ request()->is('administrator') ? 'active' : '' }}">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Начальная страница</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.index')}}" class="nav-link {{ request()->is('administrator/users') ? 'active' : '' }} {{ request()->is('administrator/users/*') ? 'active' : '' }}">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Пользователи</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('posts.index') }}" class="nav-link {{ request()->is('administrator/posts') ? 'active' : '' }} {{ request()->is('administrator/posts/*') ? 'active' : '' }}">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Статьи</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Отзывы</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Вопрос/Ответ</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.contacts') }}" class="nav-link {{ request()->is('administrator/contacts') ? 'active' : '' }} {{ request()->is('administrator/adress') ? 'active' : '' }}">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Записаться на прием</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-th"></i>
      <p>
        Simple Link
        <span class="right badge badge-danger">New</span>
      </p>
    </a>
  </li>
</ul>