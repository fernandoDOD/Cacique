<section class="content">
  <div id="pop_background"></div>
  <div id="pop_inscription" class="row center-xs middle-xs">
    <div class="content-inscription"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-color-tx-white.svg" alt="logotipo" class="to-svg"/>
      <h3>REALIZASTE TU ISNCRIPCIÓN CORRECTAMENTE</h3>
      <p>Próximamente nos estaremos comunicando para ofrecerles la información del Festival.</p><a href="<?php echo $this->createUrl('/ficict'); ?>">VOLVER A LA PÁGINA          </a>
    </div>
  </div>
  <div class="black-bk margin-inscription">
    <div class="row center-xs middle-xs title-inscription limiter__container">
      <h3>FORMULARIO DE INSCRIPCIÓN</h3>
    </div>
    <form id="form__inscription" action="<?php echo $this->createUrl('/send_inscription'); ?>" class="inscription form limiter__container">
      <div class="form__group row">
        <div class="col-md-8 col-sm-7 col-xs-12">
          <label class="form__label label__super">Nombre del Proyecto</label>
          <input type="text" name="InscripcionesProyectos[nombre]" required="required" class="form__input"/>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12">
          <label class="form__label">Número de realizadores</label>
          <input id="InscripcionesProyectos_integrantes" type="number" min="1" value="1" class="form__input"/>
        </div>
      </div>
      <div class="form__ins__integrantes form__reference form__group row">
        <div class="col-md-8 col-sm-7 col-xs-12">
          <label class="form__label">Nombre Integrante No  <span>1</span></label>
          <input type="text" name="InscripcionesIntegrantes[nombre][]" required="required" class="form__input"/>
        </div>
        <div class="form__group col-md-4 col-sm-5 col-xs-12">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="form__label">ID</label>
              <select name="InscripcionesIntegrantes[tipo_identificacion][]" required="required" class="form__input">
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                <option value="PT">PT</option>
              </select>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <label class="form__label">NÚMERO</label>
              <input type="number" name="InscripcionesIntegrantes[identificacion][]" required="required" class="form__input"/>
            </div>
          </div>
        </div>
      </div>
      <div class="form__group row">
        <div class="col-md-8 col-sm-7 col-xs-12">
          <label class="form__label">Correo Electrónico de Contacto</label>
          <input type="email" name="InscripcionesProyectos[email]" required="required" class="form__input"/>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12">
          <label class="form__label">Número Telefónico de Contacto</label>
          <input type="number" name="InscripcionesProyectos[telefono]" required="required" class="form__input"/>
        </div>
      </div>
      <div class="form__group row">
        <div class="col-sm-6 col-xs-12">
          <p class="form__label label__super">Tipo de Proyecto</p>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[tipo]" value="Documental" class="form__radio"/>Documental
          </label>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[tipo]" value="Cortometraje" class="form__radio"/>Cortometraje
          </label>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[tipo]" value="Largometraje" class="form__radio"/>Largometraje
          </label>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[tipo]" value="Video Clips" class="form__radio"/>Video Clips
          </label>
        </div>
        <div class="col-sm-6 col-xs-12">
          <p class="form__label label__super">Categoría</p>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[categoria]" value="Aficionado" class="form__radio"/>Aficionado
          </label>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[categoria]" value="Profesional" class="form__radio"/>Profesional
          </label>
          <label class="form__label">
            <input type="radio" name="InscripcionesProyectos[categoria]" value="Estudiante" class="form__radio"/>Estudiante
          </label>
        </div>
      </div>
      <div class="form__group row">
        <div class="col-xs-12">
          <label class="form__label label__super">Lugar de Residencia</label>
          <input id="location__autocomplete" type="text" class="form__input"/>
        </div>
        <div class="col-xs-12">
          <div class="form__group">
            <div class="row center-xs">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <label class="form__label">Pais</label>
                <input id="InscripcionesProyectos_pais" type="text" name="InscripcionesProyectos[pais]" required="required" for="#location__autocomplete" class="form__input"/>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <label class="form__label">Departamento</label>
                <input id="InscripcionesProyectos_departamento" type="text" name="InscripcionesProyectos[departamento]" required="required" for="#location__autocomplete" class="form__input"/>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <label class="form__label">Ciudad</label>
                <input id="InscripcionesProyectos_ciudad" type="text" name="InscripcionesProyectos[ciudad]" required="required" for="#location__autocomplete" class="form__input"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form__group row">
        <div class="col-xs-12">
          <p style="font-weight: 300;" class="form__label">Por favor realiza una decripción del proyecto con el cual participarás en el festival ( Máx. 200 palabras )</p>
          <textarea style="height: 300px;" name="InscripcionesProyectos[descripcion]" required="required" class="form__input"></textarea>
        </div>
      </div>
      <div class="form__group row center-xs">
        <button id="myPopup" type="submit" class="col-xs-4">ENVIAR FORMULARIO</button>
      </div>
    </form>
    <div class="row center-xs middle-xs limiter__container"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-color-tx-white.svg" alt="logotipo" class="image-inscription to-svg"/></div>
  </div>
</section>