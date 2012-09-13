<?php
class validatorUnique extends sfValidatorDoctrineUnique
{
  public function doClean($values)
  {
    try
    {
      parent::doClean($values);
    }
    catch(sfValidatorErrorSchema $e)
    {
      $error = new sfValidatorError($this, 'invalid', array('column' => implode(', ', $this->getOption('column'))));
      throw new sfValidatorErrorSchema($this, array($error));
    }
  }
}