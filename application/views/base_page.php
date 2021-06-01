<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="This app for university project">
  <meta name="author" content="Housma">
  <title>Customers Book</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url();?>theme/fav.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>theme/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>theme/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" type="text/css">
  <link href="<?php echo base_url();?>theme/assets/vendor/toaster/toastr.min.css" rel="stylesheet">

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="" href="javascript:void(0)">
          <img src="<?php echo base_url();?>theme/customer_book_logo.png"  alt="..." style="width: 100px !important;max-width: 100px !important;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" id="dashboard" href="<?php echo base_url(); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <?php if($level == 1 ){ ?>
            <li class="nav-item">
              <a class="nav-link" id="users" href="<?php echo base_url(); ?>admin_loop/users">
                <i class="ni ni-circle-08 text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="logs" href="<?php echo base_url(); ?>admin_loop/logs">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Logs</span>
              </a>
            </li>
          <?php } ?>
          <?php if($level == 2 ){ ?>
            <li class="nav-item">
              <a class="nav-link" id="contacts" href="<?php echo base_url(); ?>user_loop/contacts">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">Contacts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="phones" href="<?php echo base_url(); ?>user_loop/phones">
                <i class="ni ni-mobile-button text-primary"></i>
                <span class="nav-link-text">Phones</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="addresses" href="<?php echo base_url(); ?>user_loop/addresses">
                <i class="ni ni-square-pin text-primary"></i>
                <span class="nav-link-text">Addresses</span>
              </a>
            </li>
          <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
   <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo base_url();?>theme/profile.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $name ;?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php  ?>
    <?php echo $content; ?>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url();?>theme/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>theme/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>theme/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url();?>theme/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url();?>theme/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url();?>theme/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url();?>theme/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url();?>theme/assets/js/argon.js?v=1.2.0"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Toastr -->
  <script src="<?php echo base_url();?>theme/assets/vendor/toaster/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#datatable').DataTable(
        {
"oLanguage": {
"oPaginate": {
"sFirst": "<<", // This is the link to the first page
"sPrevious": "<", // This is the link to the previous page
"sNext": ">", // This is the link to the next page
"sLast": ">>" // This is the link to the last page
}
}
});
  } );
    $(document).ready( function () {
      $('#datatable2').DataTable(
        {
"oLanguage": {
"oPaginate": {
"sFirst": "<<", // This is the link to the first page
"sPrevious": "<", // This is the link to the previous page
"sNext": ">", // This is the link to the next page
"sLast": ">>" // This is the link to the last page
}
}
});
  } );


  </script>

<?php if(isset($_GET['success'])) {?>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 5000
                };
                toastr.success( '<?php echo $_GET['success']; ?>', 'Customer App');

            }, 500);
        });
    </script>
<?php } ?>

<?php if(isset($_GET['error'])) {?>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 15000
                };
                toastr.error( '<?php echo $_GET['error']; ?>', 'Customer App');

            }, 500);
        });
    </script>
<?php } ?>
<script type="text/javascript">
  $("#<?php echo $tab_name; ?>").addClass('active');
</script>
</body>

</html>