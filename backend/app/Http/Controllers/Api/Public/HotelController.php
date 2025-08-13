<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
//     index(Request $request)
// Logic:
// 1.Start a query for the Hotel model: Hotel::query().
// 2.Only include active hotels: ->where('status', 'active').
// 3.Check for filters:
// 4.If request('city') exists, add ->where('address->city', request('city')).
// 5.If request('rating') exists, add ->where('star_rating', '>=', request('rating')).
// 6.Eager-load the primary image for each hotel: ->with('images').
// 7.Execute the query with pagination: ->paginate(15).
// 8.Return the paginated results as a JSON response.



//      show(Hotel $hotel)
// Logic:
// 1.Laravel's route-model binding automatically fetches the Hotel by its slug.
// 2.Eager-load all necessary relationships for the detail page: $hotel->load('images', 'amenities', 'roomTypes.amenities').
// 3.Return the fully loaded $hotel object as a JSON response.
}
