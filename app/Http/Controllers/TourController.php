<?php

namespace App\Http\Controllers;

use Exception;
use App\Tour;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    private function priceArray($tour) {
        return $tour['price'];
    }

    public function index (Request $request) {
        $tours = Tour::all();
        $tours_array = $tours->toArray();
        $prices = array_map('self::priceArray', $tours_array);
        $maxPrice = max($prices);
        if ($request->query()) {
            $typeId = $request->query('typeId');
            $people = $request->query('people');
            $stars = $request->query('stars');
            $amount = $request->query('amount');
            [$min, $max] = explode(" - ", $amount);

            $filteredTours = Tour::whereBetween('price', [$min, $max])->when($typeId, function($query) use ($typeId) {
                return $query->where('type_id', $typeId);
            })->when($people, function($query) use ($people) {
                return $query->where('people', $people);
            })->when($stars, function($query) use ($stars) {
                return $query->whereHas('hotel', function ($query) use ($stars) {
                    $query->where('stars', '=', $stars);
                });
            })->get();
            $tours = $filteredTours;
        }
        return view('tours', [
            'tours' => $tours,
            'max' => $maxPrice,
        ]);
    }

    public function card (Tour $tour) {
        return view('card', [
            'tour' => $tour
        ]);
    }

    public function update (Tour $tour) {
        $data = request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'duration' => 'required',
            'people' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'description' => 'required'
        ]);
        
        DB::transaction(function() use($tour, $data) {
            $tour->update($data);
        }, 2);

        return redirect("/tours/$tour->id");
    }

    public function destroy (Tour $tour) {
        DB::transaction(function() use($tour) {
            $tour->delete();
        }, 2);

        return redirect("/tours");
    }

    public function order (Tour $tour) {
        $user = Auth::user();

        return DB::transaction(function() use($tour, $user) {
            if ($user->blocked == "1") {
                throw new Exception("Your account has been blocked. You can not make an order");
            };

            if ($tour->amount < 1) {
                throw new Exception("No tour instances available");
            };

            $voucher = Voucher::where('tour_id', $tour->id)->where('user_id', $user->id)->first();

            if ($voucher != null) {
                throw new Exception("Tour has already been booked by this user");
            };

            $newVoucher = Voucher::create(['user_id' => $user->id, 'tour_id' => $tour->id, 'status_id' => 1]);

            if ($newVoucher) {
                $newAmount = $tour->amount - 1;
                $tour->update(['amount' => $newAmount]);
                return redirect("/account");
            };
        }, 2);
    }
}
