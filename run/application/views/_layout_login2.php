<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/arrow.ico">
  <link rel="icon" href="<?php echo base_url();?>assets/arrow.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $app_info->app_name;?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/font-awesome.min.css">
  <link href="<?php echo base_url();?>assets/dist/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="off-canvas-sidebar">
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?php echo base_url();?>assets/dist/img/photo4.jpg'); background-size: cover; background-position: top center;">
      <!--  data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <?php echo form_open('');?>
          <?php echo validation_errors();?>
          <?php echo !empty($this->session->flashdata('error'))?$this->session->flashdata('error').'<br><br>':'';?>
            <form class="form" method="" action="#">
              <div class="card card-login card-hidden">
                <div class="card card-profile card-hidden">
                  <div class="card-avatar">
                      <img class="img" src="<?php echo base_url();?>uploads/Untitled_20181127094604.png" />
                  </div>
                  <!-- <div class="card-body" >
                    <h6 class="card-category text-gray">Run App</h6>
                  </div> -->
                </div>
                <div class="card-body">
                  <!-- <p class="card-description text-center">-- Login --</p> -->
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input id="idusername" class="form-control ganti" type="text" name="username" required="true" placeholder="Username..."/>
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" class="form-control" required="true" name="password" placeholder="Password...">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-info btn-link btn-lg">Play</button>
                </div>
              </div>
            </form>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, create by <i class="material-icons">favorite</i>
            <a href="https://run.bcsidoarjo.com/" target="_blank">PDAD</a> Sidoarjo
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/dist/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/dist/js/core/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/dist/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url();?>assets/dist/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- this tag in your head or just before your close body tag. -->
  <script async defer src="<?php echo base_url();?>assets/dist/js/buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url();?>assets/dist/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>assets/dist/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>assets/dist/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript"></script>  
  <script src="<?php echo base_url();?>assets/dist/js/pages/jquery.sharrre.js"></script>
  
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);

        $('.ganti').focusout(function () {
          var uname = $("#idusername").val().trim();
          //alert("<?php echo base_url(); ?>" + "index.php/ajax_post_controller/user_data_submit");
          if(uname != ''){
             $.ajax({
                type: "POST",
                url: "http://127.0.0.1/run/" + "auth/logo_user",
                //contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: {
                    'username':uname
                  },
                success: function(response){
                  alert(response.name);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                //alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
                }
             });
          }
        });
    });
  </script>
</body>

</html>