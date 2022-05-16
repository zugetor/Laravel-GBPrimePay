# Laravel - GB Prime Pay

[![Total Downloads](https://poser.pugx.org/sunsunza2009/gbprimepay/downloads)](https://packagist.org/packages/sunsunza2009/gbprimepay) [![Monthly Downloads](https://poser.pugx.org/sunsunza2009/gbprimepay/d/monthly)](https://packagist.org/packages/sunsunza2009/gbprimepay) [![Daily Downloads](https://poser.pugx.org/sunsunza2009/gbprimepay/d/daily)](https://packagist.org/packages/sunsunza2009/gbprimepay)

[Document](https://doc.gbprimepay.com)  

Install via composer
```
composer require sunsunza2009/gbprimepay
```

Publish config
```
php artisan vendor:publish --tag=config
```

Add config to .env
```
GB_TOKEN=
GB_PUBLIC_KEY=
GB_SECRET_KEY=
GB_BG_URL= //Webhook URL
```

QR Cash Example
```
$response = qrcash::create(10, "A001");
dd($response);
```

QR Credit Example
```
$response = qrcredit::create(10, "A001");
dd($response);
```
