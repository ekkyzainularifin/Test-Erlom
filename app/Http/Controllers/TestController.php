<?php

namespace App\Http\Controllers;

use App\UserTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = UserTest::all();
        return view('index',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $CekId = UserTest::latest('created_at')->first(); /* $CekId di gunakan untuk mengambil row terakhir pada table */

        $data = new UserTest();

        if (!$CekId) /* Melakukan pengecekan table apakah sudah memiliki isi atau belum */
        {
            $data->id = 0; /* jika belum maka mulai id dari 0 */
        } else {
            $data->id = $CekId->id+1; /* jika suda maka id terakhir di tambah 1 */
        }
        $data->name = $request->input('name');

        if ($data->save()) {
            $setParity = UserTest::find($data->id); /* $setParity digunakan untuk mengambil data id yang barusaja di input */
            if( ($data->id % 2) == 1) /* Melakukan pengecekan ganjil genap */
            {
                $setParity->parity = 'Odd'; /* Jika Ganjil maka Odd */
            } else {
                $setParity->parity = 'Even';/* Jika genap maka Even */
            }
            $setParity->update();
        }

        return redirect()->route('index');
    }

}
