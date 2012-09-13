<?php foreach($topicsCollection as $topic): ?>
<a href="<?php echo url_for('room_topic_show', $topic) ?>">
  <p class=old><?php echo $topic->getTitle(); ?></p>
  <p class=date><?php echo $topic->getCreatedAt(); ?></p>
</a>
<?php endforeach; ?>