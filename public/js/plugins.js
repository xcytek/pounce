(function($) {
    $.fn.loadColors = function() {
        this.filter('[colors-list]').each(function() {
            services.colors.list('?view=colors-list', function (response) {
                populateColorsTable(response);
            });
        });
    }
})(jQuery);
