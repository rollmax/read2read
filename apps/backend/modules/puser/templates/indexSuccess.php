<?php use_helper('I18N', 'Date') ?>
<?php include_partial('puser/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Переводчики', array(), 'messages') ?></h1>

  <?php include_partial('puser/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('puser/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('puser/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('user_puser_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('puser/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'dataArray' => $dataArray)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('puser/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('puser/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('puser/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
