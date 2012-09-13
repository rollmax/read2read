<?php
class UserVoteForm extends BaseVoteForm
{
  public function configure()
  {
    $this->validatorSchema['position']->setOption('required', false);
    $this->validatorSchema['weight']->setOption('required', false);
    $this->validatorSchema['joins']->setOption('required', false);

    $this->useFields(array('price'));
  }

}