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
```

QR Cash Example
```php
use Sunsunza2009\Gbprimepay\Facade\QrCode;

$response = QrCode::setAmount(100.00)
                ->setRefNo("A001")
                ->setBackgroundUrl("http://www.test.example/webhook")
                ->qrCash();
dd($response);
```

QR Credit Example
```php
use Sunsunza2009\Gbprimepay\Facade\QrCode;

$response = QrCode::setAmount(100.00)
                ->setRefNo("A001")
                ->setBackgroundUrl("http://www.test.example/webhook")
                ->qrCredit();
dd($response);
```

Mobile Banking Example
```php
use Sunsunza2009\Gbprimepay\Facade\MobileBanking;

//004 = KPLUS , 014 = SCB EASY (Only open in mobile) , 025 = KMA (Krungsri), 002 = BBL (Only open in mobile), 006 = KTB (Krungthai)
$response = MobileBanking::setAmount(100.00)
                ->setRefNo("A001")
                ->setBackgroundUrl("http://www.test.example/webhook")
                ->setResponseUrl("http://www.test.example/order")
                ->setBankCode("004")
                ->send();
dd($response);
```