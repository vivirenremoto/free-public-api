<?php

// https://twitter.com/uservzk80/status/1251935366208249857

$proxies = array(
    'https://siiam.es/plugins/QuickWebProxy/miniProxy.php?',
    'https://jeekrs.com/sites/proxy.php?',
    'http://mail.ebert.in/webapps/joshdick-miniProxy/miniProxy.php?',
    'http://www.getvpn.us/index.php?',
    'http://198.199.74.234/miniProxy.php/',
    'https://siiam.es/plugins/QuickWebProxy/miniProxy.php?',
    'http://treetree.dynu.com/pro1/index.php?',
    'https://seorankingsolution.com/seodashboard/plugins/QuickWebProxy/miniProxy.php?',
    'http://jashliao.eu/tools/miniProxy_19810502/index.php/',
    'http://mygoodstream.pw/proxy.php?',
    'https://paginadevendas.com/wp-content/plugins/clonador-de-paginas/panel/proxy.php?',
    'http://media.mailadam.com/proxy/index.php?',
);

shuffle($proxies);

header('Location: ' . $proxies[0] . $value);
