<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Ruangan;

 
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }  

    public function index()
    {
        $totalUser    = User::count();
        $totalRuangan = Ruangan::count();
        $totalBooking = Booking::whereNotIn('status', ['selesai', 'lunas'])->count();
        $totalAccepted = Booking::where('status', 'approved')->count();
        $totalPending = Booking::where('status', 'pending')->count();
        $bookings = Booking::whereNotIn('status', ['selesai', 'lunas'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalRuangan',
            'totalBooking',
            'totalAccepted',
            'totalPending',
            'bookings'
        ));
    }


}