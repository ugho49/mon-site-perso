// Start document ready
$(document).ready(function(){
    // Detect touch screen and enable scrollbar if necessary
    function is_touch_device() {
        try {
            document.createEvent("TouchEvent");
            return true;
        } catch (e) {
            return false;
        }
    }
    
    // Navbar for movile
    if (is_touch_device()) {
        $('#nav-mobile').css({ overflow: 'auto'});
    }
    
    // Set checkbox on forms.html to indeterminate
    var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
    if (indeterminateCheckbox !== null) {
        indeterminateCheckbox.indeterminate = true;
    }
    
    // Plugin initialization
    $('.slider').slider({full_width: true});
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.scrollspy').scrollSpy();
    $('.button-collapse').sideNav({'edge': 'left'});
    $('.datepicker').pickadate({selectYears: 20});
    $('select').not('.disabled').material_select();
}); // end of jQuery name space
