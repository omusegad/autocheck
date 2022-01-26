jQuery(function($) {
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 160,
                "density": {
                    "enable": false
                }
            },
            "color": {
                "value": ["#ed4433", '#bfbfbf']
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "speed": 4,
                    "size_min": 0.3
                }
            },
            // "shape": {
            //     "type": ["circle", "polygon", "triangle", "hexagon"]
            // },
            "line_linked": {
                "enable": false
            },
            "move": {
                "random": true,
                "speed": 1,
                "direction": "top",
                "out_mode": "out"
            }
        },
        "interactivity": {
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "bubble"
                },
                "onclick": {
                    "enable": true,
                    "mode": "repulse"
                }
            },
            "modes": {
                "bubble": {
                    "distance": 250,
                    "duration": 2,
                    "size": 0,
                    "opacity": 0
                },
                "repulse": {
                    "distance": 400,
                    "duration": 4
                }
            }
        }
    });
});

$(function() {
    jQuery(function($) {
        var owl = $('.landing-banner-slider');
        owl.owlCarousel({
            loop: true,
            margin: 5,
            autoplayTimeout: 8000,
            nav: false,
            touchDrag: false,
            mouseDrag: false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

    });


});

window.addEventListener('load', function() {
    document.querySelector('.pre-loader').classList.add('is-loaded');
});
