<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailSiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->username,
            'nama' => $this->nama,
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'tempat_tgl_lahir' => $this->tempat_tgl_lahir,
            'alamat' => $this->alamat,
            'jurusan' => $this->jurusan,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans()
        ];
    }
}
