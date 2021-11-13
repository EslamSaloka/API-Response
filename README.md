# BUGaia API Response

# Install
``````````````
composer require bugaia/api:dev-master
``````````````
# Used
```````````````
for used API
(new API)
    ->isOk(__('lists'))->build();
for set data
    ->setData($lists)
for add attribute
    ->addAttribute('paginate',api_model_set_paginate($lists))
---------
for used validation used  

use BUGaia\BUGaiaAPI\Helper\JsonFormRequest;

````````````````