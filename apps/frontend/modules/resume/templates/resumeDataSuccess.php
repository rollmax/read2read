<?php
$data = array(
  'login'       => $user->getLogin(),
  'avatar'      => $user->getAvatarFullPath(),
  'firstName'   => $user->getFirstName(),
  'lastName'    => $user->getLastName(),
  'place'       => $user->getLivePlace(),
  'email'       => $user->getContactEmail(),
  'skype'       => $user->getSkype(),
  'phone'       => $user->getPhone(),
  'site'        => $user->getSite(),
  'tariff'      => $user->getTariffString(),
  'resumeText'  => $user->getResumeText(),
  'translates'  => url_for('user_p_resume_translates',$user)
);
echo json_encode($data);
?>