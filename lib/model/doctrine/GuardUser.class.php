<?php

class GuardUser extends BaseUser
{
  protected
    $_groups         = null,
    $_permissions    = null,
    $_allPermissions = null;
    

  public function setPassword($password)
  {
    if (!strlen($password))
      return;

    if (!$salt = $this->salt)
    {
      $salt = md5(rand(100000, 999999).$this->email);
      $this->salt=$salt;
    }
    
    $this->_set('password',sha1($salt.$password));
  }


  public function checkPassword($password)
  {
    return $this->password == sha1($this->salt.$password);
  }


  public function hasGroup($name)
  {
    $this->loadGroupsAndPermissions();
    return isset($this->_groups[$name]);
  }

  /**
   * Returns all related groups names.
   *
   * @return array
   */
  public function getGroupNames()
  {
    $this->loadGroupsAndPermissions();
    return array_keys($this->_groups);
  }

  /**
   * Returns whether or not the user has the given permission.
   *
   * @return boolean
   */
  public function hasPermission($name)
  {
    $this->loadGroupsAndPermissions();
    return isset($this->_allPermissions[$name]);
  }

  /**
   * Returns an array of all user's permissions names.
   *
   * @return array
   */
  public function getPermissionNames()
  {
    $this->loadGroupsAndPermissions();
    return array_keys($this->_allPermissions);
  }

  /**
   * Returns an array containing all permissions, including groups permissions
   * and single permissions.
   *
   * @return array
   */
  public function getAllPermissions()
  {
    if (!$this->_allPermissions)
    {
      $this->_allPermissions = array();
//      $permissions = $this->getPermissions();
//      foreach ($permissions as $permission)
//      {
//        $this->_allPermissions[$permission->getName()] = $permission;
//      }

      foreach ($this->groups as $group)
      {
        foreach ($group->getPermissions() as $permission)
        {
          $this->_allPermissions[$permission->getName()] = $permission;
        }
      }
    }

    return $this->_allPermissions;
  }

  /**
   * Returns an array of all permission names.
   *
   * @return array
   */
  public function getAllPermissionNames()
  {
    return array_keys($this->getAllPermissions());
  }

  /**
   * Loads the user's groups and permissions.
   *
   */
  public function loadGroupsAndPermissions()
  {
    $this->getAllPermissions();
    
//    if (!$this->_permissions)
//    {
//      $permissions = $this->getPermissions();
//      foreach ($permissions as $permission)
//      {
//        $this->_permissions[$permission->getName()] = $permission;
//      }
//    }
//    
    if (!$this->_groups)
    {
      foreach ($this->groups as $group)
      {
        $this->_groups[$group->getName()] = $group;
      }
    }
  }

  /**
   * Reloads the user's groups and permissions.
   */
  public function reloadGroupsAndPermissions()
  {
    $this->_groups         = null;
    $this->_permissions    = null;
    $this->_allPermissions = null;
  }
}