@include('admin.includes.header')
@include('admin.includes.nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    
        @include('admin.includes.message')
        @include('admin.includes.content')
  </section>
  </div>
  <!-- /.content-wrapper -->

@include('admin.includes.footer')
