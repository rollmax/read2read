$(document).ready(function(){
    article.checkPic();
});

var article = {

    checkPic: function()
    {
        var v = $('.paragraphRow').length;
        if (0 == v)
        {
            $('.add_picture').hide();
            $('#add_text_a').removeClass('add_text').addClass('add_text_1');
        }
        else
        {
            $('.add_picture').show();
            $('#add_text_a').removeClass('add_text_1').addClass('add_text');
        }

    },
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
                    $element = $('#add_paragraph_before').before(data);
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
                    article.checkPic();
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
                {
                    alert('Not deleted');
                }
                else
                {
                    $('#'+id).remove();
                    article.checkPic();
                }
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
    },

    editAuthor: function(url)
    {
        $.ajaxSetup({async:false});
        $.post(
            url,
            function(html)
            {
                $('#author_field').replaceWith(html);
            }
        );
        return;
    },

    updateAuthor: function(url)
    {
        $.ajaxSetup({async:false});
        var ff = $('#author_form');
        vals = ff.serialize();
        $.post(
            url,
            vals,
            function(html)
            {
                $('#author_field').replaceWith(html);
            }
        );
        return;

    },

    savePicParagraph: function(id, url)
    {

        $.ajaxSetup({async:false});

        var $form = $('#'+id);
        $form.ajaxSubmit({
            success: function(html){
                $('#paragraph-'+id).replaceWith(html);
                article.checkPic();
            }
        });
//        $values = $form.serialize();
//        $.post
//            (
//                url,
//                $values,
//               function(html)
//                {
//                    $('#paragraph-'+id).replaceWith(html);
//                    article.checkPic();
//                },
//                'html'
//            );
        return;
    }

};

function clearClosestTa(o)
{
    var oSel = $(o).closest('td').find('textarea').val('');
}

function enableChngBlock(o)
{
    var oSel = $(o).closest('tr.work_area');
    $('.chng_block', oSel).hide();
    $('.chng_text', oSel).show();
    oSel.find('textarea').attr('readonly', 'readonly');

    var oTd = $(o).closest('td');
    $(o).hide();
    oTd.find('.chng_block').show();
    oTd.find('textarea').removeAttr('readonly');
}

function saveTaField(o)
{
    var oTr = $(o).closest('tr.work_area');
    var oTd = $(o).closest('td');
    oTr.find('textarea').attr('readonly', 'readonly');
    oTd.find('.chng_block').hide();
    oTd.find('.chng_text').show();
}