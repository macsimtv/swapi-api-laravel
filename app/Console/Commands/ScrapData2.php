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
use Mockery\Undefined;
use SebastianBergmann\Environment\Console;

class ScrapData2 extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'data:scrap-two';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Scrap data of swapi';

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
	public function handle()
	{
		$endpoints = [
			"planets",
			"vehicles",
			"people",
			"films",
			"starships",
			"species"
		];

		$url = "https://swapi.dev/api/";

		// Insert all in DB
		foreach ($endpoints as $endpoint) {
			$i = 1;
			$active = true;
			while ($active || $i == 1) {
				$results = Http::get($url . $endpoint . "/?page=" . $i);
				foreach ($results['results'] as $res) {
					$result_id =  (int)str_replace("/", "", str_replace($url . $endpoint . "/", "", $res['url']));
					switch ($endpoint) {
						case "planets":
							$find_planet = Planet::find($result_id);
							if (!$find_planet) {
								$planet = new Planet();
								$planet->id = $result_id;
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
								echo "Planet n° " . $result_id . " (" . $res['name'] . ") \n";
							}
							break;
						case "vehicles":
							$find_vehicle = Vehicle::find($result_id);
							if (!$find_vehicle) {
								$vehicle = new Vehicle();
								$vehicle->id = $result_id;
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
								echo "Vehicle n° " . $result_id . " (" . $res['name'] . ") \n";
							}
							break;
						case "people":
							$find_people = People::find($result_id);
							if (!$find_people) {
								$people = new People();
								$people->id = $result_id;
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
								echo "People n° " . $result_id . " (" . $res['name'] . ") \n";
							}
							break;
						case "films":
							$find_film = Film::find($result_id);
							if (!$find_film) {
								$film = new Film();
								$film->id = $result_id;
								$film->title = $res['title'];
								$film->episode_id = $res['episode_id'];
								$film->opening_crawl = $res['opening_crawl'];
								$film->director = $res['director'];
								$film->producer = $res['producer'];
								$film->release_date = $res['release_date'];
								$film->created_at = $res['created'];
								$film->updated_at = $res['edited'];
								$film->save();
								echo "Film n° " . $result_id . " (" . $res['title'] . ") \n";
							}
							break;
						case "starships":
							$find_starship = Starship::find($result_id);
							if (!$find_starship) {
								$starship = new Starship();
								$starship->id = $result_id;
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
								echo "Starship n° " . $result_id . " (" . $res['name'] . ") \n";
							}
							break;
						case "species":
							$find_specie = Specie::find($result_id);
							if (!$find_specie) {
								$specie = new Specie();
								$specie->id = $result_id;
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
								echo "Specie n° " . $result_id . " (" . $res['name'] . ") \n";
							}
							break;
					}
				}
				if ($results['next'] == null) {
					$active = false;
				}
				$i++;
			}
		}

		// Destroy existant relations
		PivotPeoplePlanet::truncate();
		PivotPeopleSpecie::truncate();
		PivotPlanetFilm::truncate();
		PivotPeopleVehicle::truncate();
		PivotFilmVehicle::truncate();
		PivotPeopleStarship::truncate();
		PivotFilmStarship::truncate();
		PivotFilmSpecie::truncate();
		PivotPeopleFilm::truncate();
		PivotPeopleSpecie::truncate();

		// Relations
		foreach ($endpoints as $endpoint) {
			switch ($endpoint) {
				case "planets":
					// Get all planets
					$planets = Planet::all();
					foreach ($planets as $planet) {
						$res = Http::get($url . $endpoint . "/" . strval($planet->id));
						foreach ($res['residents'] as $peopleUrl) {
							$pivotPlanetPeople = new PivotPeoplePlanet();
							$pivotPlanetPeople->planet_id = $planet->id;
							$pivotPlanetPeople->people_id = intval(preg_replace("/[^0-9]/", "", $peopleUrl));
							echo 'Relation People Planet: ' . $pivotPlanetPeople->people_id . "\n";
							$pivotPlanetPeople->save();
						}
						foreach ($res['films'] as $filmUrl) {
							$pivotPlanetFilm = new PivotPlanetFilm();
							$pivotPlanetFilm->planet_id = $planet->id;
							$pivotPlanetFilm->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
							echo 'Relation Film Planet: ' . $pivotPlanetFilm->film_id . "\n";
							$pivotPlanetFilm->save();
						}
					}
					break;
				case "vehicles":
					$vehicles = Vehicle::all();
					foreach ($vehicles as $vehicle) {
						$res = Http::get($url . $endpoint . "/" . strval($vehicle->id));
						foreach ($res['pilots'] as $vehicleUrl) {
							$pivotPeopleVehicle = new PivotPeopleVehicle();
							$pivotPeopleVehicle->vehicle_id = $vehicle->id;
							$pivotPeopleVehicle->people_id = intval(preg_replace("/[^0-9]/", "", $vehicleUrl));
							echo 'Relation People Vehicle: ' . $pivotPeopleVehicle->people_id . "\n";
							$pivotPeopleVehicle->save();
						}

						foreach ($res['films'] as $filmUrl) {
							$pivotFilmVehicle = new PivotFilmVehicle();
							$pivotFilmVehicle->vehicle_id = $vehicle->id;
							$pivotFilmVehicle->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
							echo 'Relation Film Vehicle: ' . $pivotFilmVehicle->film_id . "\n";
							$pivotFilmVehicle->save();
						}
					}
					break;
				case "films":
					$films = Film::all();
					foreach ($films as $film) {
						$res = Http::get($url . $endpoint . "/" . strval($film->id));
						foreach ($res['characters'] as $filmUrl) {
							$pivotPeopleFilm = new pivotPeopleFilm();
							$pivotPeopleFilm->film_id = $film->id;
							$pivotPeopleFilm->people_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
							echo 'Relation People Film: ' . $pivotPeopleFilm->people_id . "\n";
							$pivotPeopleFilm->save();
						}
					}
					break;
				case "starships":
					$starships = Starship::all();
					foreach ($starships as $starship) {
						$res = Http::get($url . $endpoint . "/" . strval($starship->id));
						foreach ($res['pilots'] as $starshipUrl) {
							$pivotPeopleStarship = new pivotPeopleStarship();
							$pivotPeopleStarship->starship_id = $starship->id;
							$pivotPeopleStarship->people_id = intval(preg_replace("/[^0-9]/", "", $starshipUrl));
							echo 'Relation People Starship: ' . $pivotPeopleStarship->people_id . "\n";
							$pivotPeopleStarship->save();
						}
						foreach ($res['films'] as $filmUrl) {
							$pivotFilmStarship = new PivotFilmStarship();
							$pivotFilmStarship->starship_id = $starship->id;
							$pivotFilmStarship->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
							echo 'Relation Film Starship: ' . $pivotFilmStarship->film_id . "\n";
							$pivotFilmStarship->save();
						}
					}
					break;
				case "species":
					$species = Specie::all();
					foreach ($species as $specie) {
						$res = Http::get($url . $endpoint . "/" . strval($specie->id));
						foreach ($res['people'] as $specieUrl) {
							$pivotPeopleSpecie = new pivotPeopleSpecie();
							$pivotPeopleSpecie->specie_id = $specie->id;
							$pivotPeopleSpecie->people_id = intval(preg_replace("/[^0-9]/", "", $specieUrl));
							echo 'Relation People Specie: ' . $pivotPeopleSpecie->people_id . "\n";
							$pivotPeopleSpecie->save();
						}
						foreach ($res['films'] as $filmUrl) {
							$pivotFilmSpecie = new pivotFilmSpecie();
							$pivotFilmSpecie->specie_id = $specie->id;
							$pivotFilmSpecie->film_id = intval(preg_replace("/[^0-9]/", "", $filmUrl));
							echo 'Relation Film Specie: ' . $pivotFilmSpecie->film_id . "\n";
							$pivotFilmSpecie->save();
						}
					}
					break;
			}
		}
		return 0;
	}
}
