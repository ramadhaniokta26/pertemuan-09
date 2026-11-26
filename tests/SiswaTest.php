<?php

declare(strict_types=1);

namespace Tests;

use App\Exceptions\NilaiTidakValidException;
use App\Siswa;
use PHPUnit\Framework\TestCase;

class SiswaTest extends TestCase
{
    public function testSetNilaiValidBerhasil(): void
    {
        $siswa = new Siswa('Okta Ramadhani', 85);
        $siswa->setNilai(95);

        $this->assertSame(95, $siswa->getNilai());
    }

    public function testNilaiBatasBawahDanAtasBerhasil(): void
    {
        $siswa = new Siswa('Okta Ramadhani', 0);
        $this->assertSame(0, $siswa->getNilai());

        $siswa->setNilai(100);
        $this->assertSame(100, $siswa->getNilai());
    }

    public function testSetNilaiDiLuarBatasGagalMelemparException(): void
    {
        $siswa = new Siswa('Okta Ramadhani', 80);

        $this->expectException(NilaiTidakValidException::class);
        $siswa->setNilai(150);
    }
}
