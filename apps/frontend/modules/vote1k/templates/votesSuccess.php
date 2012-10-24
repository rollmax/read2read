<?php slot('currentPage', 'profile_p_vote1k') ?>
<?php include_partial('profilep/profMenu') ?>
<table id=vote_data cellpadding="0" cellspacing="1">
    <tr>
        <td class=h colspan=6><p>Все голосования</p></td>
    </tr>
    <tr class=y>
        <td class=nm><p>Пользователь</p></td>
        <td><p>Предложение</p></td>
        <td><p>Вес голоса</p></td>
        <td><p>Присоединилось</p></td>
        <td><p>Общий вес &quot;ЗА&quot;</p></td>
        <?php if ($user->hasVote()->count() == 0): ?>
        <td><p>
            <?php if (!$voted): ?>Присоединиться
            <?php else: ?>Я присоединился
            <?php endif; ?>
        </p></td>
        <?php endif; ?>
    </tr>
    <?php foreach ($period->getVotes() as $i => $vote): ?>
    <tr class="<?php echo ($i % 2 == 0) ? 'b' : 'w'; ?>">
        <td class=nmb><p><?php echo $vote->getUser()->getLogin(); ?></p></td>
        <td><p><?php echo $vote->getPrice(); ?></p></td>
        <td><p><?php echo $vote->getUser()->getWeight(); ?>%</p></td>
        <td><p><?php echo $vote->getJoins(); ?></p></td>
        <td><p><?php echo $vote->getWeight(); ?></p></td>
        <?php if ($user->hasVote()->count() == 0): ?>
        <td class="<?php echo (!$voted) ? 'za' : ''; ?>">
            <?php if (!$voted): ?>
            <a href="<?php echo url_for('profile_p_vote1k_add', $vote); ?>"><p>За</p></a>
            <?php elseif ($voted == $vote->getId()): ?>
            <p class="za">За</p>
            <?php endif; ?>
        </td>
        <?php endif; ?>
    </tr>

        <?php foreach ($vote->getVoters() as $j => $voter): ?>
        <tr class="b">
            <td class="nmb"><p style="padding-left: 20%;"><?php echo $voter->getUser()->getLogin() ?></p></td>
            <td><p>&nbsp;</p></td>
            <td><p><?php echo $voter->getUser()->getWeight() ?>%</p></td>
            <td><p>&nbsp;</p></td>
            <td><p>&nbsp;</p></td>
        </tr>
        <?php endforeach ?>

    <?php endforeach; ?>
</table>
