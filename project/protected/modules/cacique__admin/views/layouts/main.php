<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin-variables.js"></script>

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>

    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
        
    <!-- Modal Logout -->
    <div class="md-modal md-just-me" id="logout-modal">
        <div class="md-content">
            <h3><strong>Logout</strong> Confirmación</h3>
            <div>
                <p class="text-center">¿Seguro quieres salir del sistema de administracion de Cacique Tundama?</p>
                <p class="text-center">
                <button class="btn btn-danger md-close">No!</button>
                <a href="<?php echo Yii::app()->createUrl('cacique__admin/logout') ?>" class="btn btn-success md-close">Si, quiero salir</a>
                </p>
            </div>
        </div>
    </div>        <!-- Modal End -->
    <!-- Modal Message -->
    <div class="md-modal md-fade-in-scale-up" id="modal-message">
        <div class="md-content">
            <h3></h3>
            <div>
                <div class="message-content"></div>
                <p>
                    <button class="btn btn-danger md-close">Cerrar</button>
                    <a href="#" class="btn btn-success md-redirect">Aceptar</a>
                </p>
            </div>
        </div><!-- End div .md-content -->
    </div><!-- End div .md-modal .md-fade-in-scale-up -->
    <!-- Activate Modal Message -->
        <button data-modal="modal-message" class="btn btn-success btn-block v-none md-trigger" id="md-active-message"></button>
    <!-- End Activate -->
    <!-- Begin page -->
    <div id="wrapper">

        <?php $this->renderPartial('/layouts/_header'); ?>

        <?php $this->renderPartial('/layouts/_left'); ?>



        <!-- Start right content -->
        <div class="content-page">
            <!-- ============================================================== -->
            <!-- Start Content here -->
            <!-- ============================================================== -->
            <div class="content">

                <?php echo $content; ?>

                <!-- Footer Start -->
                <footer>
                    DoD MediaGroup 2017
                    <div class="footer-links pull-right">
                        <a href="#" target="_blank">About</a>
                        <a href="#" target="_blank">Contact Us</a>
                    </div>
                </footer>
                <!-- Footer End -->         
            </div>
            <!-- ============================================================== -->
            <!-- End content here -->
            <!-- ============================================================== -->
        </div>
        <!-- End right content -->



    </div>
    <!-- End of page -->


    <!-- the overlay modal element -->
    <div class="md-overlay"></div>
    <!-- End of eoverlay modal -->
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-detectmobile/detect.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/ios7-switch/ios7.switch.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/fastclick/fastclick.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-blockui/jquery.blockUI.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-bootbox/bootbox.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/nifty-modal/js/classie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/nifty-modal/js/modalEffects.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/sortable/sortable.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-select2/select2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/pace/pace.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-icheck/icheck.min.js"></script>

    <!-- Demo Specific JS Libraries -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/prettify/prettify.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/init.js"></script>


    </body>
</html>