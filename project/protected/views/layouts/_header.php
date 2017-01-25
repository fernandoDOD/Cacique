<?php $facebook = GeneralValue::model()->findByPk(3); ?>
<?php $twitter = GeneralValue::model()->findByPk(4); ?>
<?php $youtube = GeneralValue::model()->findByPk(5); ?>
<section class="header-content center-xs">
  <header class="row center-xs middle-xs limiter__container">
    <a href="<?php echo $this->createUrl('/index'); ?>" class="col-md-2">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-white.svg" alt="" class="to-svg logo"/>
    </a>
      <div class="btn-menu">
        <div id="hamburger" class="hamburglar is-close">
          <div class="burger-icon">
            <div class="burger-container"><span class="burger-bun-top"></span><span class="burger-filling"></span><span class="burger-bun-bot"></span></div>
          </div>
          <!-- svg ring containter-->
          <div class="burger-ring">
            <svg class="svg-ring">
              <path fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" class="path"></path>
            </svg>
          </div>
          <!-- the masked path that animates the fill to the ring-->
          <svg width="0" height="0">
            <mask id="mask">
              <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4"></path>
            </mask>
          </svg>
          <div class="path-burger">
            <div class="animate-path">
              <div class="path-rotation"></div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->renderPartial('//layouts/_menu'); ?>
      <div class="col-md center-xs row middle-xs icons-menu">
        <a href="<?php echo $facebook->value; ?>" target="_blank">
          <img id="facebook" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/facebook.svg" alt="facebook" class="to-svg"/>
        </a>
        <a href="<?php echo $twitter->value; ?>" target="_blank">
          <img id="twitter" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/twitter.svg" alt="twitter" class="to-svg"/>
        </a>
        <a href="<?php echo $youtube->value; ?>" target="_blank">
          <img id="youtube" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/youtube.svg" alt="youtube" class="to-svg"/>
        </a>
      </div>
  </header>
</section>