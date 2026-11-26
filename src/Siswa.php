<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\NilaiTidakValidException;

class Siswa
{
    private string $nama;
    private int $nilai;

    public function __construct(string $nama = 'Siswa', int $nilai = 0)
    {
        $this->nama = $nama;
        $this->setNilai($nilai);
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNilai(int $nilai): void
    {
        if ($nilai < 0 || $nilai > 100) {
            throw new NilaiTidakValidException("Nilai {$nilai} tidak valid. Nilai harus berada di antara 0 dan 100.");
        }

        $this->nilai = $nilai;
    }

    public function getNilai(): int
    {
        return $this->nilai;
    }
}
