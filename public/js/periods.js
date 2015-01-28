(function($) {
    'use strict';

    $(function() {
        $('table').stupidtable({
            date: function(a, b) {
                var a_moment = moment(a);
                var b_moment = moment(b);
                return a_moment < b_moment;
            }
        });
    });
})(window.jQuery);
