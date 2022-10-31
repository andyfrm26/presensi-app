<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;
use App\Models\PresensiUser;

class PageController extends Controller
{
    public function index(){ 
        return redirect('login'); 
    }

    public function showLoginPage(){
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function showHomePage(){
        $user = Auth::user();
        $activePresensi = Presensi::where('end_time', '>', date('Y/m/d h:i:s'))->where('is_active', true)->get();
        $finishedPresensi = PresensiUser::where('user_id', $user->id)->get();
        
        $id = $finishedPresensi->toArray();

        $finishedId = array();
        foreach($id as $i){
            $finishedId[] = $i['presensi_id'];
        }
        
        return view('home', [
            'title' => 'Homepage',
            'user' => $user,
            'presensis' => $activePresensi,
            'finishedPresensi' => $finishedPresensi,
            'finishedId' => $finishedId,
        ]);
    }

    public function showDashboardPage(){
        return view('admin.index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
        ]);
    }
}
