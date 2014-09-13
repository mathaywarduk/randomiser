(function ($) {

    var Toggler = function(el, opts) {
        $element = this.$element = $(el);
        targetId = this.targetId = $(el).attr('data-toggle-target');

        this.opts = opts;
        this.init();
    }

    Toggler.prototype = {
        constructor: Toggler,
        init: function() {
            this.bind();
        },
        bind: function() {
            var _self = this;
            this.$element.click( function(e) {
                e.preventDefault();
                _self.toggle();
            });
        },
        toggle: function() {
            this.$element.toggleClass("is--open");
            $("#" + this.targetId).fadeToggle();
        },
    }

    $.fn.toggler = function(option, param) {
        var opts;

        if (typeof option === 'object' && option) {
            opts = $.extend(true, {}, $.fn.toggler.defaults, option);
        } else {
            opts = $.extend(true, {}, $.fn.toggler.defaults);
        }
        return this.each(function() {
            var $this = $(this),
            // don't call again if already initialised on this object
            data = $this.data('toggler');
            if(!data){
                $this.data('toggler', data = new Toggler(this, opts));
            }
            // allow the calling of plugin methods on an instance by name, eg: $item.toggler('bind')
            if (typeof option === 'string') {
                data[option](param);
            }
        });
    };

    $.fn.toggler.defaults = {

    };


    $(window).load( function() {
        $("[data-toggle]").each( function() {
            $(this).toggler();
        });
    });


})(jQuery);
