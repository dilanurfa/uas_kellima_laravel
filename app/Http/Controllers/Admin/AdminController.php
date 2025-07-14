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
            'totalAccepted' => $bookings->where('status', 'diterima')->count(),
            'totalPending' => $bookings->where('status', 'menunggu')->count()
        ]);
    }

    public function reports()
    {
        return view('admin.reports', [
            'totalBooking' => Booking::count(),
            'totalUser' => User::count(),
            'monthlyBooking' => Booking::whereMonth('created_at', now()->month)->count(),
        ]);
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->get(); // asumsi model ContactMessage
        return view('admin.messages', compact('messages'));
    }




}