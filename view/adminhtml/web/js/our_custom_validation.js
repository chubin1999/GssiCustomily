require(
    [
    'Magento_Ui/js/lib/validation/validator',
    'jquery',
    'mage/translate'
    ], function(validator, $){

        validator.addRule(
            'custom-validation',
            function (value) {
                    //return true or false based on your logic
                    $.validator.messages = $.extend($.validator.messages, {
                        min: $.validator.format($.value.__('Please enter a value greater than or equal to {0}.'))
                    });
                }
                ,$.mage.__('Custom Validation message.')
                );
    });