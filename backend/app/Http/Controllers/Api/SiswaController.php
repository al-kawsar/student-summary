<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailSiswaResource;
use App\Http\Resources\SiswaResource;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function getData(Request $request)
    {
        $query = Siswa::query();

        $query->when($request->has('q') && $request->q !== null, function (Builder $q) use ($request) {
            $q->where('username', 'like', '%' . $request->q . '%')
                ->orWhere('nama', 'like', '%' . $request->q . '%');
        });

        $query->when($request->has('jurusan') && $request->jurusan !== null, function ($q) use ($request) {
            $q->where('jurusan', $request->jurusan);
        });

        $query->when(true, function ($q) use ($request) {
            if ($request->has('sort') && $request->sort === 'nama') {
                $q->orderBy('nama', 'asc');
            } else {
                $q->orderBy('created_at', 'desc');
            }
        });

        $limit = $request->limit ?? 10;
        $data = $query->paginate($limit)->withQueryString();

        return SiswaResource::collection($data);
    }

    public function getDetailSiswa(Siswa $siswa)
    {
        return new DetailSiswaResource($siswa);
    }
}
