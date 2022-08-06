setTimeout(function() {
    var _0x399bx1 = document['getElementById']('preloader');
    if (_0x399bx1) {
        _0x399bx1['classList']['add']('preloader-hide')
    }
}, 150);
document['addEventListener']('DOMContentLoaded', () => {
    'use strict';
    let _0x399bx2 = true;
    let _0x399bx3 = true;
    var _0x399bx4 = 'Sticky';
    var _0x399bx5 = 1;
    var _0x399bx6 = false;
    var _0x399bx7 = '';
    var _0x399bx8 = '';

    
    if ('scrollRestoration' in window['history']) {
        window['history']['scrollRestoration'] = 'manual'
    };

    const _0x399bx43 = document['getElementsByClassName']('card');
    
    function _0x399bx44() {
            var _0x399bx45, _0x399bx46, _0x399bx47;
            var _0x399bx47 = document['querySelectorAll']('.header:not(.header-transparent)')[0];
            var _0x399bx48 = document['querySelectorAll']('#footer-bar')[0];
            _0x399bx47 ? _0x399bx45 = document['querySelectorAll']('.header')[0]['offsetHeight'] : _0x399bx45 = 0;
            _0x399bx48 ? _0x399bx46 = document['querySelectorAll']('#footer-bar')[0]['offsetHeight'] : _0x399bx46 = 0;
            for (let _0x399bxa = 0; _0x399bxa < _0x399bx43['length']; _0x399bxa++) {
                if (_0x399bx43[_0x399bxa]['getAttribute']('data-card-height') === 'cover') {
                    if (window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                        var _0x399bx49 = window['outerHeight']
                    };
                    if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                        var _0x399bx49 = window['innerHeight']
                    };
                    var _0x399bx4a = _0x399bx49 + 'px'
                };
                if (_0x399bx43[_0x399bxa]['hasAttribute']('data-card-height')) {
                    var _0x399bx4b = _0x399bx43[_0x399bxa]['getAttribute']('data-card-height');
                    _0x399bx43[_0x399bxa]['style']['height'] = _0x399bx4b + 'px';
                    if (_0x399bx4b === 'cover') {
                        var _0x399bx4c = _0x399bx4b;
                        _0x399bx43[_0x399bxa]['style']['height'] = _0x399bx4a
                    }
                }
            }
        }
        if (_0x399bx43['length']) {
            _0x399bx44();
            window['addEventListener']('resize', _0x399bx44)
        };
    if (_0x399bx3 === true) {
        if (window['location']['protocol'] !== 'file:') {
            const _0x399bx134 = {
                containers: ['#page'],
                cache: false,
                animateHistoryBrowsing: false,
                plugins: [new SwupPreloadPlugin()],
                linkSelector: 'a:not(.external-link):not(.default-link):not([href^=\"https\"]):not([href^=\"http\"]):not([data-gallery])'
            };
            const _0x399bx135 = new Swup(_0x399bx134);
            document['addEventListener']('swup:pageView', (_0x399bxb) => {
                _0x399bx44()
            })
        }
    };
    _0x399bx44()
})