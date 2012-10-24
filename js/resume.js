var resume = {
    /**
     * Content to paste in html
     */
    content:undefined,
    /**
     * Data recieved from the server
     */
    data:undefined,
    /**
     * Translates recieved from the server
     */
    translates:undefined,

    /**
     * A temp variable to save the url for article closing
     */
    articleCloseUrl:undefined,

    /**
     * Article content container
     */
    article:undefined,

    /**
     * Make request to the server for data in json format
     */
    getData:function (url) {
        $.ajaxSetup({async:false});
        $.post(
            url,
            function (data) {
                resume.data = data;
            },
            'json'
        );
    },
    /**
     * Make request to the server for translates in json format
     */
    getTranslates: function () {

        if (resume.data.translates === undefined)
            return;

        $.ajaxSetup({async:false});
        $.post(
            resume.data.translates,
            function (data) {
                resume.translates = data;
            },
            'json'
        );
    },

    checkVal: function ($val) {
        if ($val != null && $val.length > 0) {
            return true;
        } else {
            return false;
        }
    },

    /**
     * Returns Data content
     */
    buildDataContent: function () {
        var html = '';
        html += (resume.checkVal(resume.data.firstName)) ? '<p>Имя</p><p class=p>' + resume.data.firstName + '</p>' : '';
        html += (resume.checkVal(resume.data.lastName)) ? '<p>Фамилия</p><p class=p>' + resume.data.lastName + '</p>' : '';
        html += (resume.checkVal(resume.data.place)) ? '<p>Место жительства</p><p class=p>' + resume.data.place + '</p>' : '';
        html += (resume.checkVal(resume.data.email)) ? '<p>e-mail</p><p class=p>' + resume.data.email + '</p>' : '';
        html += (resume.checkVal(resume.data.skype)) ? '<p>skype</p><p class=p>' + resume.data.skype + '</p>' : '';
        html += (resume.checkVal(resume.data.phone)) ? '<p>тел</p><p class=p>' + resume.data.phone + '</p>' : '';
        html += (resume.checkVal(resume.data.site)) ? '<p>сайт</p><p><a target="_blank" href="' + resume.data.site + '">' + resume.data.site + '</a></p>' : '';
        html += (resume.checkVal(resume.data.resumeText)) ? '<div id="text"><p class="txt">' + resume.data.resumeText + '</p></div>' : '';
        html += (resume.checkVal(resume.data.tariff)) ? '<p>Тарифный план</p><p class="p">' + resume.data.tariff + '</p>' : '';
        return html;
    },

    /**
     * Returns Translates content
     */
    buildTranslatesContent: function () {
        var html = '<p class=wh>Работы на <span class=blue>Read</span>2<span class=red>Read</span></p>';
        for (var i in resume.translates) {
            html += '<a class=w href="" onclick="resume.showArticle(\'' + resume.translates[i].url + '\');return false;">';
            html += '<p class="left">' + resume.translates[i].titleEn + '</p>';
            html += '<p class="right">' + resume.translates[i].titleRu + '</p>';
            html += '</a>';
        }

        return html;
    },

    /**
     * Builds the content string and writes to content parameter
     */
    buildContent:function () {
        resume.content = '<div id="mdl2">';
        resume.content += '<div id=resh><p class=login>' + resume.data.login + '</p></div>';
        resume.content += '<table id="resume_data"  cellpadding="0" cellspacing="0"><tr class="w">';
        resume.content += (resume.data.avatar.length > 0) ? '<td class="foto"><img src="' + resume.data.avatar + '" alt=""></td>' : '';
        resume.content += '<td>';
        resume.content += resume.buildDataContent();
        resume.content += resume.buildTranslatesContent();
        resume.content += '</td></tr></table>';
        resume.content += '</div>';
    },

    /**
     * Opens resume
     */
    openResume:function (url) {
        if (resume.data === undefined)
            resume.getData(url);
        if (resume.translates === undefined)
            resume.getTranslates();
        if (resume.content === undefined)
            resume.buildContent();

        //  setting up the close button


        if ($('#close a').hasClass('cls_btn') && $('#close a').hasClass('na')) {
            $('#close a').removeClass('na').addClass('a');
            $('#close').css('display', 'block');
        }
        $('#close a').attr('onclick', 'resume.closeResume();return false;');

        // showing the resume
        $('#nav').after(resume.content);
    },
    /**
     * Executes closing action
     */
    closeResume:function () {
        // close button setups
        $('#close a').removeAttr('onclick');
        $('#close a.cls_btn').removeClass('a').addClass('na');
        if ($('#close a').hasClass('cls_btn')) {
            resume.data = undefined;
            resume.content = undefined;
            $('#close').css('display', 'none');
        }

        // removing window
        $('#mdl2').remove();
    },

    /**
     * Requests to the server for the article content
     *
     * @param <string> url
     * @return <void>
     */
    getArticle:function (url) {
        $.ajaxSetup({async:false});
        $.post(
            url,
            function (data) {
                resume.article = data;
            }
        );
    },

    /**
     * Shows article from resume
     *
     * @param <string> url
     * @return <void>
     */
    showArticle:function (url) {
        resume.getArticle(url);

        $('#close a').attr('onclick', 'resume.closeArticle(); return false;');

        // removing window
        $('#mdl2').remove();

        $('body').append('<div id="over"><div id="f"></div></div>')
        $('div#over div#f').append(resume.article);
    },

    /**
     * Close article from resume
     */
    closeArticle:function () {
        $('#over').remove();
        $('#close a').attr('onclick', 'resume.closeResume(); return false;');
        resume.openResume();
    }
}
