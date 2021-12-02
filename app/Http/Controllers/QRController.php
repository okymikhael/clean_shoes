<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function student($id)
    {
        $siswa = Siswa::findorfail($id);
        return view("qr")->with(['data' => $siswa->nisn]);
    }

    public function teacher($id)
    {
        $guru = Guru::findorfail($id);
        return view("qr")->with(['data' => $guru->nip]);
    }

    public function book($id)
    {
        $book = Book::findorfail($id);
        return view("qr")->with(['data' => $book->judul]);
    }

}
