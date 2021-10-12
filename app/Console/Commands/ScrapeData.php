<?php

namespace App\Console\Commands;

use App\Models\Film;
use App\Models\People;
use App\Models\Planet;
use App\Models\Specie;
use App\Models\Vehicle;
use App\Models\Starship;
use App\Models\PivotPeopleStarship;
use App\Models\PivotPeopleSpecie;
use App\Models\PivotPeopleFilm;
use App\Models\PivotFilmStarship;
use App\Models\PivotFilmSpecie;
use App\Models\PivotPeoplePlanet;
use App\Models\PivotFilmVehicle;
use App\Models\PivotPeopleVehicle;
use App\Models\PivotPlanetFilm;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ScrapeData extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'data:scrape';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Scrape the data from swapi';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): int
	{
		$endpoints = [
			"https://swapi.dev/api/planets/",
			"https://swapi.dev/api/vehicles/",
			"https://swapi.dev/api/people/",
			"https://swapi.dev/api/films/",
			"https://swapi.dev/api/starships/",
			"https://swapi.dev/api/species/"
		];

		/*foreach ($endpoints as $endpoint) {
			$i = 1;
			while ($i < 90) {
				$res = Http::get($endpoint . strval($i));
				$i++;
				if (isset($res['detail'])) {
					continue;
				}

				if ($endpoint == "https://swapi.dev/api/planets/") {

					$find_planet = Planet::where('name', $res['name'])->first();
					if (!$find_planet) {
						$planet = new Planet();
						$planet->id = ($i - 1);
						$planet->name = $res['name'];
						$planet->rotation_period = $res['rotation_period'];
						$planet->orbital_period = $res['orbital_period'];
						$planet->diameter = $res['diameter'];
						$planet->climate = $res['climate'];
						$planet->gravity = $res['gravity'];
						$planet->terrain = $res['terrain'];
						$planet->surface_water = $res['surface_water'];
						$planet->population = $res['population'];
						$planet->created_at = $res['created'];
						$planet->updated_at = $res['edited'];
						$planet->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/vehicles/") {
					$find = Vehicle::where('name', $res['name'])->first();
					if (!$find) {
						$vehicle = new Vehicle();
						$vehicle->id = ($i - 1);
						$vehicle->name = $res['name'];
						$vehicle->model = $res['model'];
						$vehicle->manufacturer = $res['manufacturer'];
						$vehicle->cost_in_credits = $res['cost_in_credits'];
						$vehicle->length = $res['length'];
						$vehicle->max_atmosphering_speed = $res['max_atmosphering_speed'];
						$vehicle->crew = $res['crew'];
						$vehicle->passengers = $res['passengers'];
						$vehicle->cargo_capacity = $res['cargo_capacity'];
						$vehicle->consumables = $res['consumables'];
						$vehicle->vehicle_class = $res['vehicle_class'];
						$vehicle->created_at = $res['created'];
						$vehicle->updated_at = $res['edited'];
						$vehicle->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/people/") {
					$find_people = People::where('name', $res['name'])->first();
					if (!$find_people) {
						$people = new People();
						$people->id = ($i - 1);
						$people->name = $res['name'];
						$people->height = $res['height'];
						$people->mass = $res['mass'];
						$people->hair_color = $res['hair_color'];
						$people->skin_color = $res['skin_color'];
						$people->eye_color = $res['eye_color'];
						$people->birth_year = $res['birth_year'];
						$people->gender = $res['gender'];
						$people->created_at = $res['created'];
						$people->updated_at = $res['edited'];
						$people->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/films/") {
					$find_film = Film::where('title', $res['title'])->first();
					if (!$find_film) {
						$film = new Film();
						$film->id = ($i - 1);
						$film->title = $res['title'];
						$film->episode_id = $res['episode_id'];
						$film->opening_crawl = $res['opening_crawl'];
						$film->director = $res['director'];
						$film->producer = $res['producer'];
						$film->release_date = $res['release_date'];
						$film->created_at = $res['created'];
						$film->updated_at = $res['edited'];
						$film->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/starships/") {

					$find_starship = Starship::where('name', $res['name'])->first();
					if (!$find_starship) {
						$starship = new Starship();
						$starship->id = ($i - 1);
						$starship->name = $res['name'];
						$starship->model = $res['model'];
						$starship->manufacturer = $res['manufacturer'];
						$starship->cost_in_credits = $res['cost_in_credits'];
						$starship->length = $res['length'];
						$starship->max_atmosphering_speed = $res['max_atmosphering_speed'];
						$starship->crew = $res['crew'];
						$starship->cargo_capacity = $res['cargo_capacity'];
						$starship->consumables = $res['consumables'];
						$starship->hyperdrive_rating = $res['hyperdrive_rating'];
						$starship->MGLT = $res['MGLT'];
						$starship->starship_class = $res['starship_class'];
						$starship->created_at = $res['created'];
						$starship->updated_at = $res['edited'];
						$starship->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/species/") {

					$find_specie = Specie::where('name', $res['name'])->first();
					if (!$find_specie) {
						$specie = new Specie();
						$specie->id = ($i - 1);
						$specie->name = $res['name'];
						$specie->classification = $res['classification'];
						$specie->designation = $res['designation'];
						$specie->average_height = $res['average_height'];
						$specie->skin_colors = $res['skin_colors'];
						$specie->hair_colors = $res['hair_colors'];
						$specie->eye_colors = $res['eye_colors'];
						$specie->average_lifespan = $res['average_lifespan'];
						$specie->language = $res['language'];
						$specie->created_at = $res['created'];
						$specie->updated_at = $res['edited'];
						$specie->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
			}
		}*/
		PivotPeoplePlanet::truncate();
		PivotPlanetFilm::truncate();
		PivotPeopleVehicle::truncate();
		PivotFilmVehicle::truncate();
		PivotPeopleStarship::truncate();
		PivotFilmStarship::truncate();
		PivotFilmSpecie::truncate();
		PivotPeopleFilm::truncate();
		PivotPeopleSpecie::truncate();

		foreach ($endpoints as $endpoint) {
			if ($endpoint == "https://swapi.dev/api/planets/") {
				$planets = Planet::all();

				foreach ($planets as $planet) {
					$res = Http::get($endpoint . strval($planet->id));
					foreach ($res['residents'] as $peopleUrl) {
						$pivotPlanetPeople = new PivotPeoplePlanet();
						$pivotPlanetPeople->planet_id = $planet->id;
						$pivotPlanetPeople->people_id = intval(preg_replace("/[^0-9]/", "", $peopleUrl));
						echo 'badaboom ' . $pivotPlanetPeople->people_id;
						$pivotPlanetPeople->save();
					}

					foreach ($res['films'] as $filmUrl) {
						$pivotPlanetFilm = new PivotPlanetFilm();
						$pivotPlanetFilm->planet_id = $planet->id;
						$pivotPlanetFilm->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
						echo 'badaboom ' . $pivotPlanetFilm->film_id;
						$pivotPlanetFilm->save();
					}
				}
			}


			if ($endpoint == "https://swapi.dev/api/vehicles/") {
				$vehicles = Vehicle::all();

				foreach ($vehicles as $vehicle) {
					$res = Http::get($endpoint . strval($vehicle->id));
					foreach ($res['pilots'] as $vehicleUrl) {
						$pivotPeopleVehicle = new PivotPeopleVehicle();
						$pivotPeopleVehicle->vehicle_id = $vehicle->id;
						$pivotPeopleVehicle->people_id = intval(preg_replace("/[^0-9]/", "", $vehicleUrl));
						echo 'badaboom ' . $pivotPeopleVehicle->people_id;
						$pivotPeopleVehicle->save();
					}

					foreach ($res['films'] as $filmUrl) {
						$pivotFilmVehicle = new PivotFilmVehicle();
						$pivotFilmVehicle->vehicle_id = $vehicle->id;
						$pivotFilmVehicle->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
						echo 'badaboom ' . $pivotFilmVehicle->film_id;
						$pivotFilmVehicle->save();
					}
				}
			}

			if ($endpoint == "https://swapi.dev/api/films/") {
				$films = Film::all();

				foreach ($films as $film) {
					$res = Http::get($endpoint . strval($film->id));
					foreach ($res['characters'] as $filmUrl) {
						$pivotPeopleFilm = new pivotPeopleFilm();
						$pivotPeopleFilm->film_id = $film->id;
						$pivotPeopleFilm->people_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
						echo 'badaboom ' . $pivotPeopleFilm->people_id;
						$pivotPeopleFilm->save();
					}
				}
			}

			if ($endpoint == "https://swapi.dev/api/starships/") {
				$starships = Starship::all();

				foreach ($starships as $starship) {
					$res = Http::get($endpoint . strval($starship->id));
					foreach ($res['pilots'] as $starshipUrl) {
						$pivotPeopleStarship = new pivotPeopleStarship();
						$pivotPeopleStarship->starship_id = $starship->id;
						$pivotPeopleStarship->people_id = intval(preg_replace("/[^0-9]/", "", $starshipUrl));
						echo 'badaboom ' . $pivotPeopleStarship->people_id;
						$pivotPeopleStarship->save();
					}

					foreach ($res['films'] as $filmUrl) {
						$pivotFilmStarship = new PivotFilmStarship();
						$pivotFilmStarship->starship_id = $starship->id;
						$pivotFilmStarship->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
						echo 'badaboom ' . $pivotFilmStarship->film_id;
						$pivotFilmStarship->save();
					}
				}
			}
			if ($endpoint == "https://swapi.dev/api/species/") {
				$species = Specie::all();

				foreach ($species as $specie) {
					$res = Http::get($endpoint . strval($specie->id));
					foreach ($res['people'] as $specieUrl) {
						$pivotPeopleSpecie = new pivotPeopleSpecie();
						$pivotPeopleSpecie->specie_id = $specie->id;
						$pivotPeopleSpecie->people_id = intval(preg_replace("/[^0-9]/", "", $specieUrl));
						echo 'badaboom ' . $pivotPeopleSpecie->people_id;
						$pivotPeopleSpecie->save();
					}

					foreach ($res['films'] as $filmUrl) {
						$pivotFilmSpecie = new pivotFilmSpecie();
						$pivotFilmSpecie->specie_id = $specie->id;
						$pivotFilmSpecie->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
						echo 'badaboom ' . $pivotFilmSpecie->film_id;
						$pivotFilmSpecie->save();
					}
				}
			}
		}

		return self::SUCCESS;
	}
}
