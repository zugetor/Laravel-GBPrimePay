<?php

namespace Zugetor\Gbprimepay;

use Illuminate\Support\Facades\Http;

class QrCode {

	protected static string $url;
	protected static string $token;
	protected static string $public_key;
	protected static string $secret_key;
	protected float $amount;
	protected ?string $reference_no = null;
	protected ?string $background_url = null;

	public function __construct() {
		self::$url = config('gbprimepay.url');
		self::$token = config('gbprimepay.token');
		self::$public_key = config('gbprimepay.public_key');
		self::$secret_key = config('gbprimepay.secret_key');
	}

	public function setAmount(float $amt): QrCode {
		$this->amount = $amt;
		return $this;
	}

	public function setRefNo(string $ref): QrCode {
		$this->reference_no = $ref;
		return $this;
	}

	public function setBackgroundUrl(string $bgUrl): QrCode {
		$this->background_url = $bgUrl;
		return $this;
	}

	public function qrCash(): array {
		$data = [
			'token' => self::$token,
			'amount' => $this->amount,
			'referenceNo' => $this->reference_no,
		];

		if ($this->background_url !== null) {
			$data["backgroundUrl"] = $this->background_url;
		}

		$response = Http::asForm()->post(self::$url . '/v3/qrcode/text', $data);
		return $response->json();
	}

	public function qrCredit(): array {
		$data = [
			'token' => self::$token,
			'amount' => $this->amount,
			'referenceNo' => $this->reference_no,
		];

		if ($this->background_url !== null) {
			$data["backgroundUrl"] = $this->background_url;
		}

		$response = Http::asForm()->post(self::$url . '/v3/qrcredit/text', $data);
		return $response->json();
	}
}