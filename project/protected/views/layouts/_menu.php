<?php
  $ruta = explode("/",Yii::app()->request->pathInfo);
  $page = strtolower($ruta[0]);
?>
<div class="menu">
  <nav>
    <ul class="row middle-xs">
      <li id="quienes" class="col-md quienes <?php echo ($page == 'quienes_somos')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/quienes_somos'); ?>">QUIENES </br>
          <p>SOMOS</p>
        </a>
      </li>
      <li id="proyectos" class="col-md proyectos <?php echo ($page == 'proyectos')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/proyectos'); ?>">PROYECTOS</a>
      </li>
      <li id="ficict" class="col-md ficict <?php echo ($page == 'ficict')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/ficict'); ?>">FICICT</a>
      </li>
      <li id="fsacct" class="col-md fsacct <?php echo ($page == 'fsacct')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/fsacct'); ?>">FSACCT</a>
      </li>
      <li id="donaciones" class="col-md donaciones <?php echo ($page == 'donaciones')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/donaciones'); ?>">DONACIONES</a>
      </li>
      <li id="contacto" class="col-md contacto <?php echo ($page == 'contacto')?'active':''; ?>">
        <a href="<?php echo $this->createUrl('/contacto'); ?>">CONTACTO </a>
      </li>
    </ul>
  </nav>
</div>