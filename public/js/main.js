$(document).ready(function(){
    $(function() {
        var availableConfs = [
        "PHPNW",
        "PHPUK",
        "PBC11",

        ];
        $("#search-text").autocomplete({
            source: availableConfs
        });
    });
    
});