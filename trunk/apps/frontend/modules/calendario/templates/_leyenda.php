<div>
<script languaje='javascript' src='/js/highslide.js'></script>

<?php echo link_to(image_tag('bot_leyenda.gif'), '#',array('onclick'=>"return hs.htmlExpand(this, { contentId: 'highslide-html' } )")) ?>

<div class="highslide-html-content" id="highslide-html">
	<div class="highslide-header">
		<ul>
			<li class="highslide-move">
				<a href="#" onclick="return false">Mover</a>
			</li>
			<li class="highslide-close">
				<a href="#" onclick="return hs.close(this)">X</a>
			</li>
		</ul>
	</div>
	<div class="highslide-body">
      <div style='padding-left:0px; text-align: left' id='tabla_leyenda'>
              <div align='left'><b> &nbsp;Leyenda:</b><br><br></div></td>
                      <table border='0' width='280' >
                      <?php $c = new Criteria();
                         $events = Tipo_eventoPeer::doSelect($c) ?>
                      <tr>
                          <td style="border-color: #000000; border-width:1px; border-style: solid; font-size:10px" class='s21 today'><div class='s21 today'>&nbsp;&nbsp;</div></td>
                          <td>&nbsp;</td>
                          <td align='left' style="font-size:10px">Hoy</td>
                          <td>&nbsp;</td>
                          <td style="border-color: #000000; border-width:1px; border-style: solid; font-size:10px" class='multiple'><div class='multiple'>&nbsp;&nbsp;</div></td>
                          <td>&nbsp;</td>
                          <td align='left' style="font-size:10px">Multiple</td>
                      <?php $i=2;?>
                      <?php foreach ($events as $evento ) :?>
                        <?php if ($i%3==0) :?>
                         <tr>
                        <?php else : ?>
                          <td>&nbsp;</td>
                        <?php endif;?>
                          <td style="border-color: #000000; border-width:1px; border-style: solid; font-size:10px" class='<?= $evento->getClase()?>'><div class='<?= $evento->getClase()?>'>&nbsp;&nbsp;</div></td>
                          <td>&nbsp;</td>
                          <td align='left' style="font-size:10px">
                                         <?php
                                               echo $evento->getDescripcion();
                                         ?>
                          </td>

                         <?php if ($i%3==2) :?>
                          </tr>
                        <?php endif;?>
                         <?php $i++;?>
                      <?php endforeach; ?>
                      </table>

        </div>
	</div>
    <div class="highslide-footer">
        <div>
            <span class="highslide-resize" title="Resize">
                <span></span>
            </span>
        </div>
    </div>
</div>
</div>