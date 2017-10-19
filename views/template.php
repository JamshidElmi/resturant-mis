<!doctype html>
<html>
    <head>
        <title><?php echo $this->template->title->default("سیستم مدیریت رستورانت"); ?></title>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="<?php echo $this->template->description; ?>">
        <meta name="author" content="Jamshid Elmi">
        <?php echo $this->template->meta; ?>

        <!-- Exretnal Links -->
        <?php $styles = array(
              'bootstrap'       => 'assets/css/bootstrap-theme.css',
              'normalize'       => 'assets/css/rtl.css',
              'datepicker'      => 'assets/css/persian-datepicker-0.4.5.min',
              'font-awesome'    => 'components/font-awesome/css/font-awesome.min.css',
              'ionicons'        => 'components/Ionicons/css/ionicons.min.css',
              'AdminLTE'        => 'assets/css/AdminLTE.css',
              'skins'           => 'assets/css/skins/_all-skins.min.css',
              'morris'          => 'components/morris.js/morris.css',
              'jvectormap'      => 'components/jvectormap/jquery-jvectormap.css',
              'daterangepicker' => 'components/bootstrap-daterangepicker/daterangepicker.css',
              'wysihtml5'       => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'

        ); ?>
        <!-- Exretnal Scripts -->
        <?php $scripts = array(
            // 'jquery' => 'assets/plugins/jQuery/jquery-2.2.3.min.js' ,

         ); ?>

        <?php echo $this->template->stylesheet->add($styles); ?>

        <?php //echo $this->template->javascript->add($scripts); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

          <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        <?php
            // This is an example to show that you can load stuff from inside the template file
            /* Header Layout */
            echo $this->template->widget("header");
            /* Right Sidebar Layout */
            echo $this->template->widget("sidebar");
        ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <?=$this->template->title; ?>
                        <small><?=$this->template->description; ?></small>
                    </h1>
                </section>
                <section class="content">
                    <!-- This is the main content partial -->
                    <?php echo $this->template->content; ?>
                </section>
                <!-- /.content -->
            </div>
        <?php
            /* Footer Layout */
            echo $this->template->widget("footer");
            /* Left Control Panel Layout */
            echo $this->template->widget("controlsidebar");
        ?>
            <div class="control-sidebar-bg"></div>
        </div> <!-- wrapper -->

        <!-- Exretnal Scripts -->
        <?php
            $script = array(
                'jquery' => 'components/jquery/dist/jquery.min.js' ,
                'jquery-ui' => 'components/jquery-ui/jquery-ui.min.js' ,
                'bootstrap' => 'components/bootstrap/dist/js/bootstrap.min.js' ,
                'raphael' => 'components/raphael/raphael.min.js' ,
                'morris' => 'components/morris.js/morris.min.js' ,
                'sparkline' => 'components/jquery-sparkline/dist/jquery.sparkline.min.js' ,
                'vectormap-1' => 'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ,
                'jvectormap-world' => 'plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ,
                'jquery.knob' => 'components/jquery-knob/dist/jquery.knob.min.js' ,
                'moment.min' => 'components/moment/min/moment.min.js' ,
                'daterangepicker' => 'components/bootstrap-daterangepicker/daterangepicker.js' ,
                'bootstrap-datepicker' => 'components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ,
                'bootstrap3-wysihtml5' => 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ,
                'jquery.slimscroll' => 'components/jquery-slimscroll/jquery.slimscroll.min.js' ,
                'fastclick' => 'components/fastclick/lib/fastclick.js' ,
                'adminlte' => 'assets/js/adminlte.min.js' ,
                'dashboard' => 'assets/js/pages/dashboard.js' ,
                'demo' => 'assets/js/demo.js'


            );
         ?>
        <?php echo $this->template->javascript->add($script); ?>
        <!-- Public Custom Scripts -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
    </body>
</html>