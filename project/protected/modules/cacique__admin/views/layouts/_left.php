<!-- Left Sidebar Start -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="clearfix"></div><br><br><br>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
              <a href="#" class="rounded-image profile-image"><img src="<?php echo Yii::app()->request->baseUrl."/images/users/".Yii::app()->user->getState('_image'); ?>"></a>
            </div>
            <div class="col-xs-8">
                <div class="profile-text">Bienvenido <b><?php echo Yii::app()->user->getState('_name') ?></b></div>
                <div class="profile-buttons">
                  <a href="javascript:;" title="Sign Out" class="md-trigger" data-modal="logout-modal"><i class="fa fa-power-off text-red-1"></i></a>
                </div>
            </div>
        </div>
        <!--- Divider -->
        <div class="clearfix"></div>
        <hr class="divider" />
        <div class="clearfix"></div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <?php $this->renderPartial('/layouts/_menu'); ?>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div><br><br><br>
    </div>
</div>
<!-- Left Sidebar End -->