<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">                                                         
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <?php echo $__env->make('admin.includes.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>         
      
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(url('Design/LTE')); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(admin()->user()->name); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> </li>
        <li class="treeview">
          <a href="<?php echo e(adminUrl('')); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo e(trans('admin.dashboard')); ?></span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

        <li class="treeview"  <?php echo e(activeMenu('admin')[0]); ?>>
          <a href="#">
            <i class="fa fa-users"></i> <span><?php echo e(trans('admin.adminAccount')); ?></span>
            <span class="pull-right-container"></span>
          </a>
          <ul class="treeview-menu" style="<?php echo e(activeMenu('admin')[1]); ?>">
            <li class="active"><a href="<?php echo e(adminUrl('admin')); ?>"><i class="fa fa-users"></i><?php echo e(trans('admin.adminAccount')); ?></a></li>
            
          </ul>
        </li>

        <li class="treeview" <?php echo e(activeMenu('users')[0]); ?>>
          <a href="#">
            <i class="fa fa-users"></i> <span><?php echo e(trans('admin.usersAccount')); ?></span>
            <span class="pull-right-container"></span>
          </a>
          <ul class="treeview-menu" style="<?php echo e(activeMenu('users ')[1]); ?>">
            <li class="active"><a href="<?php echo e(adminUrl('users')); ?>"><i class="fa fa-users"></i><?php echo e(trans('admin.usersAccount')); ?></a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside> 