define([
    "jquery",
    "jquery/jquery.cookie"
], function ($) {
    "use strict";
    return function (config, element) {
        let options = {
            blockId: config.blockId,
            cookieName: 'simplepopupblock' + config.blockId,
            popupInitTime: config.popupInitTime
        };

        function hidePopup() {
            $('.simplepopup.' + options.blockId).hide();
        }

        function showPopup() {
            $('.simplepopup.' + options.blockId).show();
        }

        function createCookie(cookieName) {
            $.cookie(cookieName, 'dontShow', {expires: 15, path: '/'});
        }

        function removeCookie(cookieName) {
            $.cookie(cookieName, 'dontShow', {expires: -1, path: '/'});
        }

        function initPopup() {
            let dontShowCookie = $.cookie(options.cookieName);

            if (!dontShowCookie) {
                $('.simplepopup.' + options.blockId + ' .close').on('click', hidePopup);
                $('#dontShow').change(function () {
                    if (this.checked) {
                        createCookie(options.cookieName);
                    } else {
                        removeCookie(options.cookieName);
                    }
                })

                setTimeout(showPopup, options.popupInitTime * 1000)
            }
        }

        initPopup();
    }
})
