var account = {

  get: function(id, url)
  {
    if(!account.initBlocker(id))
      return false;
    
    $.post(
      url,
      function(data)
      {
        $('#'+id).html(data);
        account.removeBlocker(id);
      }
    );
    
  },

  change: function(id, url)
  {
    if(!account.initBlocker(id))
      return false;

    $form = $('#'+id+' form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        try {
          dataObject = jQuery.parseJSON(data);
          window.location = dataObject.redirect;
        } catch(e) {

          $('#'+id).html(data);
          account.removeBlocker(id);
        }
      }
    );
    
  },

  initBlocker: function(id)
  {
    if(!account.checkBlocker(id))
      return false;

    $('#'+id).addClass('blocked');
    return true;
  },

  checkBlocker: function(id)
  {
    if($('#'+id).hasClass('blocked'))
      return false;
    return true;
  },

  removeBlocker: function(id)
  {
    if($('#'+id).removeClass('blocked'))
    return true;
  },


  getTariff: function(url)
  {
    if(!account.initBlocker('tariff'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#tariff').html(data);
        account.removeBlocker('tariff');
      }
    );
  },

  getEmail: function(url)
  {
    if(!account.initBlocker('email'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#email').html(data);
        account.removeBlocker('email');
      }
    );
  },

  getLivePlace: function(url)
  {
    if(!account.initBlocker('live-place'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#live-place').html(data);
        account.removeBlocker('live-place');
      }
    );
  },

  getPhone: function(url)
  {
    if(!account.initBlocker('phone'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#phone').html(data);
        account.removeBlocker('phone');
      }
    );
  },

  getSkype: function(url)
  {
    if(!account.initBlocker('skype'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#skype').html(data);
        account.removeBlocker('skype');
      }
    );
  },

  getSite: function(url)
  {
    if(!account.initBlocker('site'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#site').html(data);
        account.removeBlocker('site');
      }
    );
  },
  
  getPassword: function(url)
  {
    if(!account.initBlocker('password'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#password').html(data);
        account.removeBlocker('password');
      }
    );
  },

  getFirstName: function(url)
  {
    if(!account.initBlocker('first-name'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#first-name').html(data);
        account.removeBlocker('first-name');
      }
    );
  },

  getLastName: function(url)
  {
    if(!account.initBlocker('last-name'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#last-name').html(data);
        account.removeBlocker('last-name');
      }
    );
  },
  
  getResumeText: function(url)
  {
    if(!account.initBlocker('changeResume'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#changeResume').replaceWith(data);
        account.removeBlocker('changeResume');
      }
    );
  },

  getAvatar: function(url)
  {
    if(!account.initBlocker('changeAvatar'))
      return false;
    $.post(
      url,
      function(data)
      {
        $('#changeAvatar').replaceWith(data);
        account.removeBlocker('changeAvatar');
      }
    );
  },

  changeTariff: function(url)
  {
    if(!account.initBlocker('tariff'))
      return false;
    
    $form = $('#tariff form');
    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#tariff').html(data);
        account.removeBlocker('tariff');
      }
    );
  },

  changeEmail: function(url)
  {
    if(!account.initBlocker('email'))
      return false;
    
    $form = $('#email td.center form');

    $values = $form.serialize();
    
    $.post(
      url,
      $values,
      function(data)
      {
        $('#email').html(data);
        account.removeBlocker('email');
      }
    );
  },

    changeContactEmail: function(url)
    {
        if(!account.initBlocker('contactemail'))
            return false;

        $form = $('#contactemail td.center form');

        $values = $form.serialize();

        $.post(
            url,
            $values,
            function(data)
            {
                $('#contactemail').html(data);
                account.removeBlocker('contactemail');
            }
        );
    },
  
  changeLivePlace: function(url)
  {
    if(!account.initBlocker('live-place'))
      return false;
    $form = $('#live-place td.center form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#live-place').html(data);
        account.removeBlocker('live-place');
      }
    );
  },

  changeFirstName: function(url)
  {
    if(!account.initBlocker('first-name'))
      return false;
    
    $form = $('#first-name td.center form');

    $values = $form.serialize();
    $.post(
      url,
      $values,
      function(data)
      {
        $('#first-name').html(data);
        account.removeBlocker('first-name');
      }
    );
  },

  changeLastName: function(url)
  {
    if(!account.initBlocker('last-name'))
      return false;
    
    $form = $('#last-name td.center form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#last-name').html(data);
        account.removeBlocker('last-name');
      }
    );
  },
  changePassword: function(url)
  {
    if(!account.initBlocker('password'))
      return false;
    
    $form = $('#password td.center form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {

        try {
          dataObject = jQuery.parseJSON(data);
          window.location = dataObject.redirect;
        } catch(e) {
          
          $('#password').html(data);
          account.removeBlocker('password');
        }

        
      },
      'html'
    );
  },

  changeResumeText: function(url)
  {
    if(!account.initBlocker('changeResume'))
      return false;

    $form = $('#changeResume  form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#changeResume').replaceWith(data);
        account.removeBlocker('changeResume');
      }
    );
  },

  changePhone: function(url)
  {
    if(!account.initBlocker('phone'))
      return false;
    $form = $('#phone  form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#phone').html(data);
        account.removeBlocker('phone');
      }
    );
  },

  changeSkype: function(url)
  {
    if(!account.initBlocker('skype'))
      return false;
    $form = $('#skype  form');

    $values = $form.serialize();
    
    $.post(
      url,
      $values,
      function(data)
      {
        $('#skype').html(data);
        account.removeBlocker('skype');
      }
    );
  },

  changeSite: function(url)
  {
    if(!account.initBlocker('site'))
      return false;
    $form = $('#site  form');

    $values = $form.serialize();

    $.post(
      url,
      $values,
      function(data)
      {
        $('#site').html(data);
        account.removeBlocker('site');
      }
    );
  }

}

