 This is a magento 2 rest APi module for getting configurble product detail by Simple/Child Product Id
 
# Magento2 REST API How to get parent product(configurable) by child product using 

**Get configurable product details by Child Id:**

**Request Type**: `GET`

  `/V1/devbera-configurable/:childId`

Replace `:childId` by your child Product Id.

**Get configurable product details by Child Sku:**

**Request Type**: `GET`

  `/V1/devbera-configurable/child-sku/:childSku`

Replace `:childSku` by your child Product Sku.

**Require files:**

1. app/code/Devbera/Configurable/etc/webapi.xml

2. app/code/Devbera/Configurable/etc/di.xml

3. app/code/Devbera/Configurable/Api/ConfigurableManagementInterface.php

4. app/code/Devbera/Configurable/Api/ConfigurableManagementInterface.php

** EXAMPLE***

```
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.example.com/rest/V1/devbera-configurable/53",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer w747xkw1taogwzrnjccdotur1kyoia7i",
    "Content-Type: application/json",
    "Postman-Token: 6bfedc88-eca1-46f6-89fe-65343b846534",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```
