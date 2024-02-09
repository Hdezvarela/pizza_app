jQuery(document).ready(function(){
    jQuery.fn.fullpage({
        verticalCentered: true,
        resize : true,
        anchors: ['delipizza', 'menu', 'nosotros'],
        scrollingSpeed: 700,
        easing: 'easeInQuart',
        menu: false,
        navigation: false,
        navigationPosition: 'right',
        loopBottom: false,
        loopTop: false,
        autoScrolling: true,
        css3: false,
        paddingTop: 0,
        paddingBottom: 0,
    });
});