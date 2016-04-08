
;(function($) {

    var BTN_NO = 0x0;
    var BTN_YES = 0x1;
    var BTN_CANCEL = 0x2;
    var BTN_OK = 0x4;

    var icons = {
        'danger' : 'fa-exclamation-triangle',
        'warning' : 'fa-exclamation-circle',
        'info' : 'fa-info-circle',
        'primary' : 'fa-info',
        'question' : 'fa-question-circle',
        'default' : 'fa-info'
    };

    var template_alerte = '<div class="icon"></div><div class="title"></div><div class="text"></div><div class="toolbar"></div><div class="caption"></div>';
    var button = '<button class="btn btn-default btn-xs" data-type="%type%">%text%</button>';

    $.messageBox = function(element, options) {

        defaults = {
            autoClose : 0,                // autoclose. eq 0 = not autoclose
            showAutoClose : true,          // show autoclose counter
            modal:true,                    // afficle la dialogbox en mode modal
            css: 'css/messageBox.css',     // Css filename
            cbClose: false,                 // call when window is closed
		    cbReady: false,                // call this function when msgbox is ready
            locale:{
                    NO : 'Non',
                    YES : 'Oui',
                    CANCEL : 'Annuler',
                    OK : 'Ok',
                    textAutoClose: 'Fermeture automatique dans %d sec'
                }
		};

        var plugin = this;
        var $element = $(element);

        plugin.settings = {};

        plugin.init = function() {
            var ar = $.extend({}, defaults.locale, options.locale);
            plugin.settings = $.extend({}, defaults, options);
            plugin.settings.locale = ar;
            plugin.local_modal = plugin.settings.modal;

            $("head").append('<link rel="stylesheet" type="text/css" href="' + plugin.settings.css + '">');

            var template = '<div class="messageBox"></div>';

            plugin.dom_msg = $.parseHTML(template);
            $element.prepend(plugin.dom_msg);

            var modal = '<div class="messageBox-modal"></div>';
            plugin.modal = $.parseHTML(modal);
            $element.prepend(plugin.modal);

            $(plugin.dom_msg).on('click', 'button', function(){
                $(plugin.dom_msg).hide();
                if(plugin.local_modal){
                    $(plugin.modal).hide();
                }
                if( plugin.settings.cbClose ){
                    plugin.settings.cbClose($(this).attr("data-type"));
                }
            });

			if( plugin.settings.cbReady ){
				plugin.settings.cbReady();
			}
        };

        var doAutoClose = function(autoclose){
            if(autoclose > 0 ){
                plugin.delay = autoclose;
                if( plugin.settings.showAutoClose ){
                    $(plugin.dom_msg).find(".caption").show();
                }
                plugin.inter = setInterval(function(){
                    var s = plugin.settings.locale.textAutoClose.replace(/%d/, plugin.delay);
                    $(plugin.dom_msg).find(".caption").html(s);
                    plugin.delay --;
                    if( plugin.delay < 0){
                        clearInterval(plugin.inter);
                        $(plugin.dom_msg).hide();
                        if(plugin.settings.modal){
                            $(plugin.modal).hide();
                        }
                        if( plugin.settings.cbClose ){
                            plugin.settings.cbClose(-1);
                        }
                    }
                }, 1000);
            }

        };

        var showDialog = function(style, title, text, autoclose, modal) {
            if( typeof autoclose == "undefined" ){
                autoclose = plugin.settings.autoclose;
            }
            if( typeof modal == "undefined" ){
                modal = plugin.settings.modal;
            }
            $(plugin.dom_msg).html(template_alerte);
            $(plugin.dom_msg).find('.icon').html('<i class="fa '+icons[style]+'"></i>');
            $(plugin.dom_msg).find('.title').html(title);
            $(plugin.dom_msg).find('.text').html(text);
            $(plugin.dom_msg).find('.toolbar').html(createButton(BTN_OK));

            var bg_style = "";
            if( style == "question" || style == "default"){
                bg_style = " bg-white";
            }else{
                bg_style = " bg-" + style;
            }

            $(plugin.dom_msg).removeClass().addClass("messageBox" + bg_style+" text-"+style);

            centerWin();

            $(plugin.dom_msg).show();

            if(plugin.settings.modal){
                $(plugin.modal).show();
            }
            doAutoClose(autoclose);
        };

        var createButton = function(type, text){
            var s = '';
            if( type == BTN_NO ){
                s = button.replace(/%type%/g, type).replace(/%text%/g, plugin.settings.locale.NO);
            }else if( type == BTN_YES ){
                s = button.replace(/%type%/g, type).replace(/%text%/g, plugin.settings.locale.YES);
            }else if( type == BTN_CANCEL ){
                s = button.replace(/%type%/g, type).replace(/%text%/g, plugin.settings.locale.CANCEL);
            }else if( type == BTN_OK){
                s = button.replace(/%type%/g, type).replace(/%text%/g, plugin.settings.locale.OK);
            }else{
                s = button.replace(/%type%/g, type).replace(/%text%/g, text);
            }
            return s;
        };

        var createAllButtons = function(buttons){
            var s = '';
            buttons.forEach(function(elem){
                s += createButton(elem.return, elem.text) + "&nbsp;";
            });
            return s;
        };

        var centerWin = function(){
            $(plugin.dom_msg).css("top", ( jQuery(window).outerHeight() - $(plugin.dom_msg).outerHeight() ) / 2+jQuery(window).scrollTop() + "px")
                .css("left", ( jQuery(window).width() - $(plugin.dom_msg).outerWidth() ) / 2+jQuery(window).scrollLeft() + "px");
        };

        plugin.danger = function(title, text, autoclose, modal) {
            showDialog('danger', title, text, autoclose, modal);
        };

        plugin.warning = function(title, text, autoclose, modal) {
            showDialog('warning', title, text, autoclose, modal);
        };

        plugin.info = function(title, text, autoclose, modal) {
            showDialog('info', title, text, autoclose, modal);
        };

        plugin.default = function(title, text, autoclose, modal) {
            showDialog('default', title, text, autoclose, modal);
        };

        plugin.question = function(title, text, buttons, autoclose, modal) {
            showDialog('question', title, text, autoclose, modal);
            $(plugin.dom_msg).find('.toolbar').empty();
            var s = createAllButtons(buttons);
            $(plugin.dom_msg).find('.toolbar').html(s);
        };

        plugin.exclamation = function(title, text, buttons, autoclose, modal) {
            showDialog('default', title, text, autoclose, modal);
            $(plugin.dom_msg).find('.icon').html('<i class="fa ' + icons.danger + '"></i>');
            $(plugin.dom_msg).find('.toolbar').empty();
            var s = createAllButtons(buttons);
            $(plugin.dom_msg).find('.toolbar').html(s);
        };

        plugin.init();

    };

    $.fn.messageBox = function(options) {
        return this.each(function() {
            if (undefined === $(this).data('messageBox')) {
                var plugin = new $.messageBox(this, options);
                $(this).data('messageBox', plugin);
            }
        });
    };

})(jQuery);
