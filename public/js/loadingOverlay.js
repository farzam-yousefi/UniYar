const LoadingOverlay = {

    show: function (message = 'لطفاً صبر کنید...') {

        $('#loadingMessage').text(message);

        $('#loadingOverlay').css('display', 'flex');
    },

    hide: function () {

        $('#loadingOverlay').hide();
    },

    isVisible: function () {

        return $('#loadingOverlay').is(':visible');
    }
};