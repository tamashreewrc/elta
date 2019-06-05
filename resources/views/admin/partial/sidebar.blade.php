<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="{{ url('storage/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p>{{Auth::guard('admin')->user()->name}}</p>

        </div>

      </div>



      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>



        <li class="has-sub {{ (Request::is('admin/dashboard') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>



        <li class="has-sub {{ (Request::is('admin/banner') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/banner"><i class="fa fa-image"></i> <span>Banner</span></a></li>





        <li class="treeview">

        <!-- <li class="treeview">

          <a href="#">

            <i class="fa fa-edit"></i> <span>Forms</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>

            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>

            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>

          </ul>

        </li> -->

        <li class="has-sub {{ (Request::is('admin/elta') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/elta"><i class="fa fa-folder-open"></i> <span>ELTA</span></a></li>

        <li class="has-sub {{ (Request::is('admin/team_members') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/team_members"><i class="fa fa-users"></i> <span>Team Members</span></a></li>

        <li class="has-sub {{ (Request::is('admin/service_categories') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/service_categories"><i class="fa fa-list"></i> <span>Service Categories</span></a></li>

        <li class="has-sub {{ (Request::is('admin/testimonial') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/testimonial"><i class="fa fa-quote-left"></i> <span>Testimonial</span></a></li>

        <li class="has-sub {{ (Request::is('admin/teachers') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/teachers"><i class="fa fa-male"></i> <span>Teachers</span></a></li>

        <!--<li class="has-sub {{ (Request::is('admin/features') ? 'active' : '') }}"><a href="/admin/features"><i class="fa fa-tasks"></i> <span>Featured Program & Workshop</span></a></li>-->

         <li class="has-sub {{ (Request::is('admin/client') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/client"><i class="fa fa-user"></i> <span>Client</span></a></li>

         <li class="treeview {{ (Request::is('admin/cms/home') ? 'active' : '') }} {{ (Request::is('admin/cms/about_us') ? 'active' : '') }} {{ (Request::is('admin/cms/resource') ? 'active' : '') }} {{ (Request::is('admin/cms/contact_us') ? 'active' : '') }}">

          <a href="#">

            <i class="fa fa-edit"></i> <span>CMS</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li class="{{ (Request::is('admin/cms/home') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/cms/home"><i class="fa fa-circle-o"></i> <span>Home</span></a></li>

            <li class="{{ (Request::is('admin/cms/about_us') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/cms/about_us"><i class="fa fa-circle-o"></i> <span>About Us</span></a></li>

            <li class="{{ (Request::is('admin/cms/resource') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/cms/resource"><i class="fa fa-circle-o"></i> <span>Resource</span></a></li>

            <li class="{{ (Request::is('admin/cms/contact_us') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/cms/contact_us"><i class="fa fa-circle-o"></i> <span>Contact Us</span></a></li>

          </ul>

        </li>

        <li class="has-sub {{ (Request::is('admin/settings') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/settings"><i class="fa fa-cog"></i> <span>Settings</span></a></li>

        <li class="has-sub {{ (Request::is('admin/download') ? 'active' : '') }}"><a href="{{ url('/') }}/admin/download"><i class="fa fa-download"></i> <span>Resource Download</span></a></li>

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>

