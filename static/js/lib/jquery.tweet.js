(function ($) {

    var Tweet = function(el, opts) {
        $element = this.$element = $(el);

        this.opts = opts;
        this.init();
    }

    Tweet.prototype = {
        constructor: Tweet,
        init: function() {
            this.bind();
        },
        bind: function() {
            this.popup();
        },
        popup: function() {
            window.open(this.getURL(), this.opts.windowName, "width=" + this.opts.windowWidth + ",height=" + this.opts.windowWidth + ",scrollbars=no,resizable=no,toolbar=no");
        },
        getURL: function() {
            var _self = this,
                text = this.replaceAll("{RESULT}", _self.$element.attr("data-tweet-result"), this.opts.tweetText),
                url = this.replaceAll("{TEXT}", encodeURIComponent(text), this.opts.url);

            return url;
        },
        replaceAll: function(f, r, s) {
            var regex = new RegExp(f, 'g');
            return s.replace(regex, r);
        }
    }

    $.fn.tweet = function(option, param) {
        var opts;

        if (typeof option === 'object' && option) {
            opts = $.extend(true, {}, $.fn.tweet.defaults, option);
        } else {
            opts = $.extend(true, {}, $.fn.tweet.defaults);
        }
        return this.each(function() {
            var $this = $(this),
            // don't call again if already initialised on this object
            data = $this.data('tweet');
            if(!data){
                $this.data('tweet', data = new Tweet(this, opts));
            }
            // allow the calling of plugin methods on an instance by name, eg: $item.tweet('bind')
            if (typeof option === 'string') {
                data[option](param);
            }
        });
    };

    $.fn.tweet.defaults = {
        tweetText: 'The #randomiser helped me choose "{RESULT}". Try it yourself!',
        tweetAccount: "madebykind",
        windowName: "popup",
        windowWidth: 685,
        windowHeight: 500,
        url: "http://twitter.com/intent/tweet?url=http%3A%2F%2Frandomiser.mathayward.com&related=madebykind&text={TEXT}"
    };


    $(window).load( function() {
        $(document).on("click", "[data-tweet]", function(e) {
            e.preventDefault();
            $(this).tweet();
        });
    });


})(jQuery);


