<?php
class UserResumeForm extends UserForm
{
  public function configure()
  {
    $this->useFields(array('resume_text'));
  }

}