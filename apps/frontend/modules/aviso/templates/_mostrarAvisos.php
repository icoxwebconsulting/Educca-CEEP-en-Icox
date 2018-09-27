
<div class="nombrescol">
    <table class="tablaavisos">
          <tr>
            <td class="td1">Fecha</td>
            <td class="td2">Notificaci&oacute;n</td>
          </tr>
    </table>
</div>
<div class="avisos">
    <table class="tablaavisos" cellspacing="0">
          <?php $i = 0; ?>
          <?php foreach($avisos as $aviso): ?>
              <?php $fondo1 = (($i % 2 == 0))? "id=\"filarayada\"" : ""; ?>
              <tr <?= $fondo1 ?>>
                <td class="td1h"><?php echo $aviso->getFecha("d/m/y") ?></td>
                <td class="td2h"><?php switch ($aviso->getTipo()) {
                                       case 1: echo "Ha pasado el plazo recomendado por el profesor para finalizar el tema \"".$aviso->getTema()->getNombre()."\""." del ".$aviso->getCurso()->getNombre() ; break;
                                       case 2: echo "Ha pasado el plazo recomendado por el profesor para finalizar el tema \"".$aviso->getTema()->getNombre()."\""." del ".$aviso->getCurso()->getNombre() ; break;
                                       case 3: echo "Le queda una semana para abonar la cuota del ".$aviso->getCurso()->getNombre(); break;
                                       default : break;
                                       } ?>
										</td>
              </tr>
              <?php $i++ ?>
          <?php endforeach; ?>
          <?php if ($i == 0) : ?>
            <tr>
                <td class="tdnoaviso"><?php echo image_tag('info.gif', 'Title=Info', 'class=imginfo') ?> <span class="txtinfo">No tiene ning&uacute;n aviso.</span></td>
            </tr>
          <?php endif; ?>
    </table>
</div>