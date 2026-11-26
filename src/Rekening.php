<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\SaldoTidakCukupException;

class Rekening
{
    private float $saldo;

    public function __construct(float $saldo = 0.0)
    {
        $this->saldo = $saldo;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function setor(float $jumlah): void
    {
        if ($jumlah <= 0) {
            throw new SaldoTidakCukupException('Jumlah setor harus lebih dari 0.');
        }

        $this->saldo += $jumlah;
    }

    public function tarik(float $jumlah): void
    {
        if ($jumlah <= 0) {
            throw new SaldoTidakCukupException('Jumlah tarik harus lebih dari 0.');
        }

        if ($jumlah > $this->saldo) {
            throw new SaldoTidakCukupException(
                "Saldo tidak cukup untuk menarik {$jumlah}. Saldo saat ini: {$this->saldo}."
            );
        }

        $this->saldo -= $jumlah;
    }
}
