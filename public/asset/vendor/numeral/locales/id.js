// numeral.js locale configuration
// locale : Indonesia (id) – generally useful in Indonesia
// author : Marco Krage : https://github.com/sinky

(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        define(['../numeral'], factory);
    } else if (typeof module === 'object' && module.exports) {
        factory(require('../numeral'));
    } else {
        factory(global.numeral);
    }
}(this, function (numeral) {
    numeral.register('locale', 'id', {
        delimiters: {
            thousands: '.',
            decimal: ','
        },
        abbreviations: {
            thousand: 'r',
            million: 'j',
            billion: 'm',
            trillion: 'b'
        },
        ordinal: function (number) {
            return '.';
        },
        currency: {
            symbol: 'x'
        }
    });
}));
