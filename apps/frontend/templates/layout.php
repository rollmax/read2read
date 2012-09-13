<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php include_slot('title_page', __('Read2Read.ru')) ?></title>
    <meta name="keywords" content="<?php include_slot('page_keywords', __('Read2Read, переводы')) ?>" />
    <meta name="description" content="<?php include_slot('page_description', __('Read2Read переводы текстов')) ?>" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
      <script type="text/javascript">
          var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
          document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
  </head>
<body>


<div id="f">
<div id="main">
<table id=hat cellpadding="0" cellspacing="1px">
    <tr>
        <td class=logo>
          <?php if($sf_user->isAnonymous()): ?>
           <a href="<?php echo url_for('@homepage') ?>" title="<?php echo __('Home') ?>">
          <?php else: ?>
           <a href="<?php echo url_for('@logout') ?>" title="<?php echo __('LogOut') ?>">
          <?php endif; ?>
           <img src="/images/read2read.png" border="0"></a>
		</td>
		  
        <td class=ban></td>
		
        <td class=date>
            <p>
            <script type="text/javascript" language="JavaScript" src="/js/date.js">
            </script>
			</p>
        </td>		
	</tr>
		</table>

		<table id=bof cellpadding="0" cellspacing="0px">
	<tr>
              <td class=fl><img src="/images/eng-fl.png" border="0">
</td>
      <td class=h><div><p><?php include_slot('title_page', 'Home - Главная') ?></p></div></td>
        <td class=fl><img src="/images/rus-fl.png" border="0">
</td>
    </tr>
	</table>

  <?php include_component('auth', 'userMenu') ?>


<?php echo $sf_content ?>

</div><!--          f     end                 -->

<?php if(get_slot('currentPage') == 'homepage'): ?>
<table id=req>
	<tr> 
			<td class=td><h3>Text</h3><p class=r2e>English</p><p class=trns>Translation</p></td>
            <td class=center>
			<a class=contacts href="<?php echo url_for('contact'); ?>">Контакты</a>
			</td>	
            <td class=td><h2>Текст</h2><p class=tr_r>Перевод</p><p class=e2r>С Английского</p></td>
	</tr>
</table>
<?php endif; ?>

</div><!--          main  end                 -->


<script type="text/javascript">
    try{
        var pageTracker = _gat._getTracker("<?php echo Setting::getValueByName('googleAnalytics') ?>");
        pageTracker._trackPageview();
    } catch(err) {}
</script>
</body>
</html>