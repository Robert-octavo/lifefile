<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(User $user)
    {
        $records = Record::where('user_id', $user->id)->get();

        $data = [
            'title' => 'History of ' . $user->name . ' ' . $user->last_name,
            'date' => date('m/d/Y'),
            'user' => $user,
            'records' => $records,
        ];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('history_' . $user->name . '_' . $user->last_name . '.pdf');
    }
}
