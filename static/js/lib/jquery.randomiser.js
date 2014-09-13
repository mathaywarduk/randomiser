(function ($) {

    var Randomiser = function(el, opts) {
        $element = this.$element = $(el);
        $resultContainer = this.$resultContainer = $("[data-randomiser-result]")
        randomising = this.randomising = false;
        result = this.result;

        this.opts = opts;
        this.init();
    }

    Randomiser.prototype = {
        constructor: Randomiser,
        init: function() {
            this.bind();
        },
        bind: function() {
            var _self = this;
            this.$element.click( function(e) {
                e.preventDefault();
                _self.randomise();
            });
        },
        randomise: function() {
            if (!this.randomising) {
                this.randomising = true;
                this.showLoader();
            }
        },
        showLoader: function() {
            var _self = this;
            this.$resultContainer.fadeOut(250, function() {
                _self.$resultContainer.html('<h2><b class="icon__spinner"></b>Randomising...</h2>').fadeIn();
                _self.getResults();
            });
        },
        getResults: function() {
            this.showResults();
            var choices = $("[data-randomiser-input]").val().split(",");
            this.result = this.trimResult(this.getRandomResult(choices));
        },
        showResults: function() {
            var _self = this;
            this.$resultContainer.fadeOut(250, function() {
                _self.$resultContainer.html('<h2>The randomiser has chose:</h2><h1>' + _self.result + '</h1>').fadeIn();
                _self.randomising = false;
            });
        },
        getRandomResult: function(a) {
            return a[Math.floor(Math.random() * a.length)];
        },
        trimResult: function(str) {
            return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
        }
    }

    $.fn.randomiser = function(option, param) {
        var opts;

        if (typeof option === 'object' && option) {
            opts = $.extend(true, {}, $.fn.randomiser.defaults, option);
        } else {
            opts = $.extend(true, {}, $.fn.randomiser.defaults);
        }
        return this.each(function() {
            var $this = $(this),
            // don't call again if already initialised on this object
            data = $this.data('randomiser');
            if(!data){
                $this.data('randomiser', data = new Randomiser(this, opts));
            }
            // allow the calling of plugin methods on an instance by name, eg: $item.randomiser('bind')
            if (typeof option === 'string') {
                data[option](param);
            }
        });
    };

    $.fn.randomiser.defaults = {
        
    };


    $(window).load( function() {
        $("[data-randomiser]").each( function() {
            $(this).randomiser();
        });
    });


})(jQuery);
