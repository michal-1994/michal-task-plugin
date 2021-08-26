(function() {
    // SETTINGS
    const form = document.getElementById('mtp-form');
    
    if(form) {
        // INPUT EVENTS
        form.elements['mtp-title'].addEventListener('input', function() {
            removeHtmlTag(this);
        });

        form.elements['mtp-content'].addEventListener('input', function() {
            removeHtmlTag(this);
        });

        // JS VALIDATION
        function removeHtmlTag(el) {
            el.value = [...(el.value.replace(/<[^>]*>/, ''))].join('');
        }  

        // REFRESH PHP
        if (window.history.replaceState)
            window.history.replaceState(null, null, window.location.href);
    }
}());
