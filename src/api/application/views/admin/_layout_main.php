<?php $this->load->view('admin/components/page_head'); ?>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Guest Pass</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('admin/dashboard')?>">Home</a></li>
        <li><a href="<?php echo site_url('admin/user')?>">User</a></li>
        <li><a href="<?php echo site_url('admin/user/logout')?>">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container" role="main">

  <?php $this->load->view($subview); ?>

</div> <!-- /container -->

<?php $this->load->view('admin/components/page_tail'); ?>