<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="{{ url('/dashio') }}/profile.html"><img src="{{ url('/dashio') }}/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
      <h5 class="centered">Sam Soffes</h5>
      <li class="mt">
        <a class="active" href="{{ url('/dashio') }}/index.html">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub-menu">
          <a href="{{ url('/dashio') }}/javascript:;">
            <i class="fa fa-desktop"></i>
            <span>Users</span>
            </a>
          <ul class="sub">
            <li><a href="{{ url('/dashio') }}/general.html">Create</a></li>
            <li><a href="{{ url('/dashio') }}/buttons.html">List</a></li>
          </ul>
        </li>
      <li class="sub-menu">
        <a href="{{ url('/dashio') }}/javascript:;">
          <i class="fa fa-desktop"></i>
          <span>Permission management</span>
          </a>
        <ul class="sub">
          <li><a href="{{ url('/dashio') }}/general.html">General</a></li>
          <li><a href="{{ url('/dashio') }}/buttons.html">Buttons</a></li>
          <li><a href="{{ url('/dashio') }}/panels.html">Panels</a></li>
          <li><a href="{{ url('/dashio') }}/font_awesome.html">Font Awesome</a></li>
        </ul>
      </li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->