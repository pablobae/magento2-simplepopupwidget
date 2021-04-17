define([
        "jquery"
    ], function ($) {
        "use strict";
        return function (config, element) {

            function hidePopup() {
                $('.simplepopup').hide();
            }

            function showPopup() {
                $('.simplepopup').show();
            }

            function initPopup() {
                showPopup();
            }

            $('.simplepopup .close').on('click', hidePopup);

            setTimeout(initPopup, config.popupInitTime * 1000)
        }
    }
)
