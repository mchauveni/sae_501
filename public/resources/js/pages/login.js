'use strict';
(function(){
    const PasswordVisibilitySwitch = {
        DOM: { switch: $('.input_container .password_visibility'), input: $('.input_container input.password_havetoggle') },
        eventHandler: function () {
            PasswordVisibilitySwitch.DOM.switch.addEventListener('click', PasswordVisibilitySwitch.toggleSwitch);
        },
        toggleSwitch: function () {
            this.classList.toggle('visible');
            let input = PasswordVisibilitySwitch.DOM.input;
            input.type = input.type == 'text' ? 'password' : 'text';
        }
    }

    document.addEventListener('DOMContentLoaded', PasswordVisibilitySwitch.eventHandler);
})();