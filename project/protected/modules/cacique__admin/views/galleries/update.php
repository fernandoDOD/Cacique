<div class="page-heading">
	<h1>
		<?php if($model->save == 0){ ?>
			Nueva Galeria
		<?php } else { ?>
			Editar Galeria - <small><?php echo $model->name; ?></small>
		<?php } ?>
	</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>