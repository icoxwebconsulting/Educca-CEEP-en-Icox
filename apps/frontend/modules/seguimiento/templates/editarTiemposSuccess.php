<?php use_helper('Javascript') ?>
<?php use_helper('informacion') ?>
<?php use_helper('SexyButton') ?>

<div class="capa_principal" id="ejercicios">
  <div class="titulo_principal"><h2 class="titbox"><?php echo $curso->getNombre() ?></h2></div>
  <div class="contenido_principal">

    <?php if($sf_user->hasAttribute('notice')): ?>
    <?php
        echoNotaInformativaCorta($sf_user->getAttribute('notice'),'');
        $sf_user->getAttributeHolder()->remove('notice');
    ?>
    <?php endif; ?>
    <div class="herramientas_general">
      <br>
        <div>
            <?php echo form_tag('/seguimiento/editarTiempos?idcurso='.$curso->getId().'&iduser='.$usuario->getId().'&idmateria='.$curso->getMateriaId(),array('method'=>'post')); ?>
            <table style="text-align: left;">
                  <tr>
                    <td><strong>Nombre del alumno: &nbsp;&nbsp;&nbsp;</strong></td>
                    <td><strong><?php echo $usuario->getNombre().', '.$usuario->getApellidos() ?></strong></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width: 46%">Curso: &nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $materia->getNombre();?></td>
                  </tr>
            </table>
            <?php if($rel): ?>
            <br/>
            <table style="text-align: left;">
                  <tr>
                      <td><b>Tiempo teor&iacute;a</b></td>
                  </tr>
                  <tr>
                      <td style="height: 10px;  "></td>
                  </tr>
                  <tr>
                      <td style="width: 45%">Tiempo de sesion: </td>
                      <td><input type="text" name="rel_session" value="<?php echo traducir_de_fecha_scorm12($rel->getSessionTime()) ?>"/></td>
                  </tr>
                  <tr>
                      <td style="height: 10px;  "></td>
                  </tr>
                  <tr>
                      <td style="width: 45%">Tiempo Total participado: </td>
                      <td><input type="text" name="rel_total_time" value="<?php echo traducir_de_fecha_scorm12($rel->getTotalTime()) ?>"/></td>
                  </tr>
            </table>
            <?php endif; ?>
            
            <br/>
            <table style="text-align: left;">
                  <tr>
                      <td><b>Tiempo ejercicios</b></td>
                  </tr>
                  <tr>
                      <td style="height: 10px;  "></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <fieldset style="width: 145%">
                          <table style="text-align: left; width: 100%" >
                              <tr>
                                  <td style="height: 10px;  "></td>
                              </tr>
                              <tr>
                                  <td>Ejercicios por curso:</td>
                                  <td>
                                      <select id="filtro" name="idcurso" class="select_general" >
                                            <option value="0">--Seleccionar ejercicios--</option>
                                            <?php foreach($ejercicios_array as $k=>$v):?>
                                                <option value="<?php echo $k; ?>" ><?php echo $v['titulo']; ?></option>
                                            <?php endforeach;?>
                                      </select>
                                  </td>
                                  <td>
                                      <?php echo sexy_submit_tag('Relacionar con Alumno'); ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="height: 10px;  "></td>
                              </tr>
                          </table>
                        </fieldset>
                      </td>
                  </tr>
                  
                  <tr>
                      <td>
                          
                      </td>
                  </tr>
                  <?php if($array_tiempo_ejercicios): ?>
                    <?php foreach ($array_tiempo_ejercicios as $k=>$v): ?>
                      <tr>
                          <td style="height: 10px;  "></td>
                      </tr>
                      <tr>
                          <td style="width: 37%"><?php echo $v['ejercicio'] ?>: </td>
                          <td><input type="text" name="ejercicio[<?php echo $k?>]" value="<?php echo $v['tiempo'] ?>"/></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
             </table> 
             <br/>
             <table>
                      <tr>
                          <td style="height: 10px;  "></td>
                      </tr>
                      <tr>
                          <td style="width: 45%"></td>
                          <td><?php echo sexy_submit_tag('Actualizar'); ?></td>
                      </tr>
             </table>
        </form>
        <br clear="all"/>
        </div>
    </div>
      <div id='capa_volver' align="left">
       <?php echo link_to(image_tag('bot_volver.gif', array('title' => 'Atr&aacute;s', 'alt' => 'Atr&aacute;s')), "/seguimiento/seguimientoTiempos?idcurso=".$curso->getId()); ?>
   </div>
    
  </div>
  <div class="cierre_principal"></div>
</div>