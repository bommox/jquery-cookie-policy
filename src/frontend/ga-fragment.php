<?php

?>

<!-- Google Analytics -->
<script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    var GA_LOCAL_STORAGE_KEY = "ga:clientId";
    if (window.localStorage) {
        ga('create', 'UA-XXXXX-Y', 'auto', {
            'storage': 'none',
            'clientId': localStorage.getItem(GA_LOCAL_STORAGE_KEY)
        });
        ga(function(tracker) {
            localStorage.setItem(GA_LOCAL_STORAGE_KEY, tracker.get('clientId'));
        });
    } else {
        ga('create', 'UA-XXXXX-Y', 'auto');
    }
    ga('send', 'pageview');
</script>