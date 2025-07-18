<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
 
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }  

    public function index()
    {
        $bookings = Booking::with('user', 'ruangan')->latest()->get();

        return view('admin.dashboard', [
            'bookings' => $bookings,
            'totalBooking' => $bookings->count(),
            'totalAccepted' => $bookings->where('status', 'approved')->count(),
            'totalPending' => $bookings->where('status', 'pending')->count()
        ]);
    }

}