<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<?php
$this->load->helper('string'); 
$tampung = random_string('alnum', 260);
$this->session->m_acak;
$this->session->set_userdata('m_pct', $tampung); 
//echo 'apa'.$this->session->userdata('m_acak');
$ma=$this->session->userdata('m_pct');
//echo "<script>console.log( 'sukses' );</script>";

  //print readfile('./uploads/Untitled_20181127094604.png');
  $path='./uploads/'.$user_info->image_admin;
  $im = file_get_contents($path);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $modules_title.' | '.$app_info->app_name;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url();?>assets/arrow.ico" type="image/x-icon">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.css">
  
  <style>
    ul.nav li.selected {
     background-color:aqua;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- pace -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/pace.css"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- notifikasi ulang tahun -->
<?php
$query =  $this->db->query("SELECT name_admin FROM ap_admin WHERE SUBSTR(nip_admin,5,2)=MONTH(CURDATE()) AND SUBSTR(nip_admin,7,2)=DAY(CURDATE()) AND id_pegawai_aktif=1");
if($query->num_rows() > 0 && isset($_SESSION['milad']) == NULL){ ?>
  <div class="modal modal-info fade in" id="modal-info" style="display: block;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Selamat ulang tahun kepada : </h4>
              </div>
              <div class="modal-body">
                <p>
                <?php
                    foreach ($query->result() as $row){
                      echo $row->name_admin . "<br />\n";
                    }
                  ?>
                </P>               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>                
              </div>
            </div>
            <!-- /.modal-content -->
          <!-- /.modal --></div>
          <!-- /.modal-dialog -->
   </div>
<?php $this->session->milad;
      $this->session->set_userdata('milad', 'yes'); ?>
<?php } ?>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $app_info->logo_mini;?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $app_info->logo;?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if(count($notifikasi)!=0){?><span class="label label-warning"><?php echo count($notifikasi);?></span><?php }?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo count($notifikasi);?> notifications</li>
              <li>
                <ul class="menu">
                  <?php foreach($notifikasi as $valuex):?>
                  <li>
                    <a href="<?php echo base_url('notifikasi?id='.$valuex->id_notification_rules.'&link='.$valuex->link_notification);?>">
                      <i class="fa fa-star text-aqua"></i> <?php echo $valuex->content_notification.' | '.date('d M Y', strtotime($valuex->date_notification));?>
                    </a>
                  </li>
                <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('notifikasi')?>"><?php echo $lang_view_all;?></a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          	<i class="fa fa-language"></i> <?php echo ucfirst($this->session->userdata['mylang']);?>
          </a>
          	<ul class="dropdown-menu">
          	  <li class="user-footer">
                <div>
                  <a href="<?php echo base_url('bahasa/indonesian');?>" class="btn btn-default btn-flat btn-block"><i class="flag-icon flag-icon-id"></i> Indonesian </a>
                </div>
                <div>
                  <a href="<?php echo base_url('bahasa/english');?>" class="btn btn-default btn-flat btn-block"><i class="flag-icon flag-icon-gb"></i> English</a>
                </div>
              </li>
          	</ul>
          </li>
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
              echo "<img src='data:image/jpg;base64,".base64_encode($im)."' class='user-image' alt='User Image'>";
            ?>
              <span class="hidden-xs"><?php echo $user_info->name_admin;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
                echo "<img src='data:image/jpg;base64,".base64_encode($im)."' class='img-circle' alt='User Image'>";
                ?>
                
                <p>
                  <?php echo $user_info->name_admin;?> - <?php echo $user_info->username_admin;?>
                  <?php if($user_info->id_penempatan != NULL){?>
                  <small>
                  <?php
$sql = "SELECT * FROM ap_penempatan WHERE id_penempatan=?";
$query = $this->db->query($sql,array($user_info->id_penempatan));
$row = $query->row();
if (isset($row))
{
    echo $row->uraian_penempatan;
}?></small>
          <?php }?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profile');?>" class="btn btn-default btn-flat"><?php echo $lang_profile;?></a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout');?>" class="btn btn-default btn-flat"><?php echo $lang_logout;?></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar" title="<?php echo $lang_setting;?>"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
          echo "<img src='data:image/jpg;base64,".base64_encode($im)."' class='img-circle' alt='User Image'>";
          ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $user_info->name_admin;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php
        $treeview = 'class="treeview"';
        $treeview_active = 'class="treeview active"';
        $active = 'class="active"';
      ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo strtoupper($lang_main_menu);?></li>
        <li <?php echo $main_menu_active=='dashboard'?$active:'';?>>
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span><?php echo $lang_dashboard;?></span>
          </a>
        </li>
        <!-- dropdown -->

        <?php
        foreach ($main_menu as $val):
        if ($val->link=='#') {
        ?>
        <li <?php echo $main_menu_open==$val->id?$treeview_active:$treeview;?>>
          <a href="#">
            <i class="<?php echo $val->icon;?>"></i> <span><?php echo $val->$mylanguages_field;?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php
          foreach ($main_menu_tree as $value):
          if ($value->parent_modules_id==$val->modules_id){
          ?>
          <li <?php echo $main_menu_active==$value->link?$active:'';?>><a href="<?php echo base_url($value->link);?>"><i class="<?php echo $value->icon;?>"></i><?php echo $value->$mylanguages_field;?></a></li>
          <?php
          }
          endforeach;
          ?>
          </ul>
        </li>
        <?php
        } else {
        ?>
        <li <?php echo $main_menu_active==$val->link?$active:'';?>>
          <a href="<?php echo base_url($val->link);?>">
            <i class="<?php echo $val->icon;?>"></i> <span><?php echo $val->$mylanguages_field;?></span>
          </a>
        </li>
        <?php
        }
        endforeach;
        ?>
        <li class="header"><?php echo strtoupper($lang_main_menu);?></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $modules_title;?>
        <small><?php echo $app_info->app_name;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> <?php echo $lang_home;?></a></li>
        <li class="active"><?php echo $modules_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<?php $this->load->view($subview);?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo $app_info->app_ver;?>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="<?php echo $app_info->copy_right_link;?>"><?php echo $app_info->copy_right;?></a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- pace -->
<script src="<?php echo base_url();?>assets/dist/js/pace.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery.number.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery.chained.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
$('#modal-info').modal('show');
});

$(function () {
	$('.angka').number( true, 0 );
	$('.angka2').number( true, 2 );
});

</script>
<?php $this->load->view($jscript);?>

</body>
</html>
