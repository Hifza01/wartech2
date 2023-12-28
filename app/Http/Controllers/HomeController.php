<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function connect() {
        $firebase = (new Factory)
                    ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
                    ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));
                    
        return $firebase->createDatabase();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $surat_count = 0;
        $laporan_count = 0;
        $users_count = 0;
    
        $suratSnapshot = $this->connect()->getReference('surat')->getSnapshot();
            if ($suratSnapshot->exists()) {
            $surat_count = 0;
            $suratData = $suratSnapshot->getValue();
                foreach ($suratData as $user) {
                $surat_count += count($user);
                }
            } else {
            echo "No surat found.";
            }
   
            $laporan_count = 0;
            $suratSnapshot = $this->connect()->getReference('surat')->getSnapshot();
                if ($suratSnapshot->exists()) {
                $suratData = $suratSnapshot->getValue();
                    foreach ($suratData as $user) {
                        if (is_array($user)) {
                            foreach ($user as $key => $value) {
                                if (is_array($value) && isset($value['jenisSurat']) && $value['jenisSurat'] === 'Pelaporan') {
                                $laporan_count++;
                                }
                            }
                        }
                    }
                    echo "Number of laporan in surat: " . $laporan_count;
                    } else {
                    echo "No surat found.";
                    }

                    $usersSnapshot = $this->connect()->getReference('users')->getSnapshot();
                        if ($usersSnapshot->exists()) {
                        $users_count = count($usersSnapshot->getValue());
                        }

            return view('home')->with([
                'surat_count' => $surat_count,
                'laporan_count' => $laporan_count,
                'users_count' => $users_count
            ]);
    }    
}
