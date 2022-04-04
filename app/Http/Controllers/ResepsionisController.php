<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resepsionis;

class ResepsionisController extends Controller
{
    public function destroy($id)
    {
        Reservasi::where('id',$id)->delete();
        return redirect('/resepsionis')->withToastSuccess('Chekin Data successfully');
    }
}
