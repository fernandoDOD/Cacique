<?php $path = explode("/",Yii::app()->request->pathInfo); ?>
<li>
	<a href='<?php echo $this->createUrl('index/') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'index')?'active':''):'active'; ?>">
		<i class='icon-home-3'></i>
		<span>Dashboard</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('pages/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'pages')?'active':''):''; ?>">
		<i class='icon-map'></i>
		<span>Contenidos</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('news/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'news')?'active':''):''; ?>">
		<i class='icon-newspaper-1'></i>
		<span>Noticias</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('inscriptions/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'inscriptions')?'active':''):''; ?>">
		<i class='icon-edit-alt'></i>
		<span>Inscripciones</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('convocations/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'convocations')?'active':''):''; ?>">
		<i class='icon-chat-2'></i>
		<span>Convocatorias</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('team/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'team')?'active':''):''; ?>">
		<i class='icon-users-1'></i>
		<span>Equipo</span>
	</a>
</li>
<li>
	<a href='<?php echo $this->createUrl('gallery/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'gallery')?'active':''):''; ?>">
		<i class='icon-picture-1'></i>
		<span>Galeria</span>
	</a>
</li>
<li class='has_sub'>
	<a href='#'>
		<i class='icon-picture-2'></i>
		<span>Multimedia</span>
		<span class="pull-right">
			<i class="fa fa-angle-down"></i>
		</span>
	</a>
	<ul>
		<li>
			<a href='<?php echo $this->createUrl('galleries/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'galleries')?'active':''):''; ?>">
				<span>Galerias</span>
			</a>
		</li>
		<li>
			<a href='<?php echo $this->createUrl('imagesbank/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'imagesbank')?'active':''):''; ?>">
				<span>Banco de Imagenes</span>
			</a>
		</li>
	</ul>
</li>
