<?php use_helper('Javascript', 'Validation') ?>
<?php use_helper('SexyButton') ?>

<div class="tit_box_calendario"><h2 class="titbox">Buscar <?echo $rol?></h2></div>
<div class="cont_box_grande" style="padding-left: 15px;">

<?php if ($rol == 'profesor'):?>
  <?php echo form_tag('admin/profesores') ?>
<?php endif;?>
<?php if ($rol == 'alumno'):?>
  <?php $ismodificar=$modificar_ejericicio?'?edita-ejercicio=1':'' ?>
  <?php echo form_tag('admin/alumnos'.$ismodificar) ?>
<?php endif;?>
<?php if ($rol == 'superusuario'):?>
  <?php echo form_tag('admin/usuarios?superUsuario=1') ?>
<?php endif;?>
<?php if ($rol == 'usuario'):?>
  <?php echo form_tag('admin/usuarios') ?>
<?php endif;?>
<?php if ($rol == 'moroso'):?>
  <?php echo form_tag('admin/morosos') ?>
<?php endif;?>
    

    <table class="tabla_show_perfil">
    <tbody>


    <tr>
      <th>USUARIO:</th>
      <td><?php echo input_tag('usuario', '','class=inputperfil') ?></td>
    </tr>
    <tr>
      <th>DNI:</th>
      <td><?php echo input_tag('dni', '','class=inputperfil') ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo input_tag('nombre', '','class=inputperfil') ?></td>
    </tr>
    <tr>
      <th>Apellidos:</th>
      <td><?php echo input_tag('apellidos', '','class=inputperfil') ?></td>
    </tr>
    <tr>
      <th>E-mail:</th>
      <td><?php echo input_tag('email', '','class=inputperfil')?></td>
    </tr>
    <tr>
      <th>Criterio busqueda</th>
      <td>
        <?php echo radiobutton_tag('tipo', 'And', false) ?>Todos
	      &nbsp;&nbsp;&nbsp;
		    <?php echo radiobutton_tag('tipo', 'Or', true) ?>Cualquiera
	    </td>
  	</tr>
    <tr>
      <td>&nbsp;</td>
      <td><br><?php echo sexy_submit_tag('Buscar'); ?></td>
    </tr>
  </table>
  </form>

    <!-- Capas AJAX -->
    <div id="buscar"></div>
    <br><?php use_helper('volver');  echo volver(); ?>
</div>
    <div id="trans" class="trans" style="background-color:#000000;color:#CCCC00;position:absolute;text-align:center;top:150px;left:350px;padding:65px;font-size:25px;font-weight:bold;width:350px;height:50px;z-index:0;filter:alpha(opacity=50);float:left;-moz-opacity:.50;opacity:.50;display: none">
    <p></p>
   </div>
<div class="cierre_box_grande"></div>
