<?php

declare(strict_types=1);

namespace Tests;

use App\Exceptions\SaldoTidakCukupException;
use App\Rekening;
use PHPUnit\Framework\TestCase;

class RekeningTest extends TestCase
{
    public function testTarikSaldoCukupBerhasil(): void
    {
        $rekening = new Rekening(100000);
        $rekening->tarik(40000);

        $this->assertSame(60000.0, $rekening->getSaldo());
    }

    public function testTarikMelebihiSaldoGagalMelemparException(): void
    {
        $rekening = new Rekening(100000);

        $this->expectException(SaldoTidakCukupException::class);
        $rekening->tarik(150000);
    }
}
