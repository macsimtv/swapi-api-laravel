<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index($id): JsonResponse {
		$people = People::find($id)->first();

		if($people != null) {
			return response()->json($people);
		}

		return response()->json([
			'detail' => 'Not found'
		]);
	}

}
