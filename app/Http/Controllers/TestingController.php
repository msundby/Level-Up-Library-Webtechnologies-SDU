<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class TestingController extends Controller
{
    public function showReviewByAuthenticatedUser()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $reviews = Review::where('user_id', $userId)->get();

            if ($reviews->isEmpty()) {
                return response('No reviews found for the authenticated user', 404);
            }


            return response()->json($reviews);
        }

        return response('Unauthorized', 401);
    }


}
