var article = {
  // paragraph actions
  /**
   * Add paragraph action
   * 
   */
  addParagraph: function(url)
  {
    $.ajaxSetup({async:false});
    $.post
    (
      url,
      function(data)
      {
        $element = $('.add_paragraph').parent().before(data);
        
      }
    );
    return;
  },

  /**
   * edit paragraph action
   * 
   */
  editParagraph: function(id, url)
  {
    article.checkOpenedForms(id);
    
    $.ajaxSetup({async:false});
    
    $.post(
      url,
      function(html)
      {
//        alert(html);
        $element = $('#'+id).replaceWith(html);
      },
      'html'
    );
    return;
  },

  /**
   * Save paragraph action
   */
  saveParagraph: function(id, url)
  {

    $.ajaxSetup({async:false});
    
    var $form = $('#'+id);
    $values = $form.serialize();
    $.post
    (
      url,
      $values,
      function(html)
      {
        $('#paragraph-'+id).replaceWith(html);
      },
      'html'
    );
    return;
  },

  /**
   * Delete paragraph action
   */
  deleteParagraph: function(id, url)
  {
    $.ajaxSetup({async:false});
    
    $.post(
      url,
      function(data)
      {
        if(data.success == 0)
          alert('Not deleted');
        else
          $('#'+id).remove();
      },
      'json'
      
    );
    return;
  },

  // comments actions

  /**
   * add comment action
   */
  addComment: function(id, url)
  {
    article.checkOpenedForms(id);

    $.ajaxSetup({async:false});
    $.post
    (
      url,
      function(html)
      {
        $('#'+id+' td.center table').append(html);
      }
    );
    return;
  },

  /**
   * Edit comment action
   */
  editComment: function(id, url)
  {
    article.checkOpenedForms(id);
    
    $paragraphHandlers = $('tr.paragraphRow');
    $paragraph = $('#'+id).closest($paragraphHandlers);
    
    var paragraphId = $paragraph.attr('id');
    article.checkOpenedForms(paragraphId);


    $.ajaxSetup({async:false});
    $.post(
      url,
      function(html)
      {
        $('#'+id).replaceWith(html);
      }
    );
    return;
  },
  /**
   * Save comment action
   */
  saveComment: function(id, url)
  {
    $.ajaxSetup({async:false});
    var $form = $('#'+id);
    $values = $form.serialize();
    $replaceElement = $('#'+id).parent();
    $.post
    (
      url,
      $values,
      function(html)
      {
        $replaceElement.parent().replaceWith(html);
      }
    );
    return;
  },

  /**
   * Delete comment action
   */
  deleteComment: function(id, url)
  {
    $.ajaxSetup({async:false});
    $.post(
      url,
      function(data)
      {
        if(data.success == 0)
          alert('Not deleted');
        else
          $('#'+id).remove();
      },
      'json'

    );
    return;
  },

  checkOpenedForms: function(id)
  {
    if(id !== undefined)
    {
      // paragraph
      if ($('#'+id+' form').attr('id'))
        $('#'+id+' a.save').click();

      // comment opened
      if ($('#'+id+' td.center form').attr('id'))
        $('#'+id+' td.center a.saveCmt').click();
    }
    return;
  }
};
