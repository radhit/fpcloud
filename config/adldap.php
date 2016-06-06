<?php

// Example adldap.php file.
return [
    'account_suffix' => "@domain.local",

    'domain_controllers' => array("dc1.domain.local", "dc2.domain.local"), // An array of domains may be provided for load balancing.

    'base_dn' => 'DC=domain,DC=local',

    'admin_username' => 'user',

    'admin_password' => 'password',

    'real_primary_group' => true, // Returns the primary group (an educated guess).

    'use_ssl' => true, // If TLS is true this MUST be false.

    'use_tls' => false, // If SSL is true this MUST be false.

    'recursive_groups' => true,
];

?>