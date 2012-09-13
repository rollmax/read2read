<?php use_helper('I18N'); ?>
<table id=nav cellpadding="0" cellspacing="2px">
    <tr>
        <td class=po>
            <p>In English</p>
        </td>        
        
       
        <td class=act>

            <p class=ok>Регистрация</p>
       <td class=but>

            <a href=""><p>Правила</p></a>
        </td>
        
       
    	
        <td class=po>

            <p>По-русски</p>
        </td>
    </tr>
</table>




<div id=mdl3>

 


        <div id=regh><p>Регистрация&nbsp;читателя</p></div>
        
<?php echo form_tag_for($form, '@registration'); ?>
<?php echo $form->renderHiddenFields(); ?>
<table id=reg cellpadding="0" cellspacing="1">
  <tr>
    <td colspan="2"><?php echo $form->renderGlobalErrors() ?></td>
  </tr>

                <tr class=w>
                    <td class=left>
                        <p><?php echo $form['login']->renderLabel() ?></p>
                    </td>
                    <td class=right>
                      <?php echo $form['login']->renderError(); ?>
                      <?php echo $form['login']->render(); ?>
                    </td>
        
                </tr>
                
                <tr class=b>
                    <td class=left>
                        <p><?php echo $form['email']->renderLabel(); ?></p>
                    </td>
        			<td class=right>
                <?php echo $form['email']->renderError(); ?>
                <?php echo $form['email']->render(); ?>
					</td>
          </tr>
				
               
	
</table>
<div id=regb>
               <input type=submit value="Далее">
                    </div>


</div>
</form>

<!--              mdl3 end       -->