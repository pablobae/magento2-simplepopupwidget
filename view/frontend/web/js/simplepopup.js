define([
        "jquery",
        "jquery/jquery.cookie"
    ], function ($) {
        "use strict";
        return function (config, element) {
            let options = {
                cookieName: 'simplepopup'
            };

            function hidePopup() {
                $('.simplepopup').hide();
            }

            function showPopup() {
                $('.simplepopup').show();
            }

            function createCookie(cookieName) {
                $.cookie(cookieName, 'dontShow', {expires: 15, path: '/'});
            }

            function removeCookie(cookieName) {
                $.cookie(cookieName, 'dontShow', {expires: -1, path: '/'});
            }

            function initPopup() {
                let dontShowCookie = $.cookie(options.cookieName);

                if (! dontShowCookie) {
                    $('.simplepopup .close').on('click', hidePopup);
                    $('#dontShow').change(function () {
                        if (this.checked) {
                            createCookie(options.cookieName);
                        } else {
                            removeCookie(options.cookieName);
                        }
                    })

                    setTimeout(showPopup, config.popupInitTime * 1000)
                }
            }

            initPopup();
        }
    }
)
