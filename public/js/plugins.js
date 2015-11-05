/**
 * Load Colors List Plugin
 */
(function($) {
    $.fn.loadColors = function() {
        this.filter('[colors-list]').each(function() {
            services.colors.list('?view=colors-list', function (response) {
                populateColorsTable(response);
            });
        });
    }
})(jQuery);

/**
 * Serialize form to JSON
 */
// Serialize form to JSON
(function ($) {
    $.fn.serializeFormJSON = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || "");
            } else {
                o[this.name] = this.value || "";
            }
        });
        return o;
    };
})(jQuery);