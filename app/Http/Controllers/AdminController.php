<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Status;
use App\User;
use App\Hotel;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function vouchers() {
        $vouchers = Voucher::all();
        return view('vouchers', [
            'vouchers' => $vouchers
        ]);
    }

    public function setStatus(Voucher $voucher, Status $status) {
        return DB::transaction(function() use ($voucher, $status) {
            $voucher->update(['status_id' => $status->id]);
            return redirect("/admin/vouchers");
        });
    }

    public function users() {
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
    }

    public function ban(User $user) {
        return DB::transaction(function() use ($user) {
            $user->update(['blocked' => !$user->blocked]);
            return redirect("/admin/users");
        });
    }

    public function showTourForm() {
        $hotels = Hotel::all();
        return view('addTour', [
            'hotels' => $hotels
        ]);
    }

    public function addTour() {
        $data = request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'people' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'hotel_id' => 'required',
            'amount' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = basename(request('image')->store('tours', 'public_uploads'));

        return DB::transaction(function() use ($data, $imageName) {
            Tour::create([
                'name' => $data['name'],
                'type_id' => $data['type_id'],
                'people' => $data['people'],
                'price' => $data['price'],
                'start_date' => $data['start_date'],
                'duration' => $data['duration'],
                'description' => $data['description'],
                'hotel_id' => $data['hotel_id'],
                'amount' => $data['amount'],
                'image' => $imageName,
            ]);
            return redirect("/tours");
        });
    }

    public function showHotelForm() {
        return view('addHotel');
    }

    public function addHotel() {
        $data = request()->validate([
            'name' => 'required',
            'stars' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = basename(request('image')->store('hotels', 'public_uploads'));

        return DB::transaction(function() use ($data, $imageName) {
            Hotel::create([
                'name' => $data['name'],
                'stars' => $data['stars'],
                'image' => $imageName,
            ]);
            return redirect("/tours");
        });
    }
}
