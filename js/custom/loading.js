$(function() {
    var $spinner = $('<div>').addClass('loading-spinner').appendTo('body');
    $(document)
        .ajaxStart(function() { $spinner.fadeIn('fast'); })
        .ajaxStop(function() { $spinner.fadeOut('fast'); });
});
