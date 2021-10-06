<?php

namespace App\Console\Commands;

use App\Models\Planet;
use App\Models\Starship;
use App\Models\Specie;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

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

		foreach ($endpoints as $endpoint) {
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
				}
				if ($endpoint == "https://swapi.dev/api/people/") {
				}
				if ($endpoint == "https://swapi.dev/api/films/") {
				}
				if ($endpoint == "https://swapi.dev/api/starships/") {

					$find_specie = Specie::where('name', $res['name'])->first();
					if (!$find_specie) {
						$specie = new Specie();
						$specie->name = $res['name'];
						$specie->classification = $res['classification'];
						$specie->designation = $res['designation'];
						$specie->average_height = $res['average_height'];
						$specie->skin_colors = $res['skin_colors'];
						$specie->hair_colors = $res['hair_colors'];
						$specie->eye_colors = $res['eye_colors'];
						$specie->average_lifespan = $res['average_lifespan'];
						$specie->homeworld = $res['homeworld'];
						$specie->language = $res['language'];
						$specie->created_at = $res['created'];
						$specie->updated_at = $res['edited'];
						$specie->save();
						echo $i . "boom \n";
					} else {
						echo $i . "pas boom \n";
					}
				}
				if ($endpoint == "https://swapi.dev/api/species/") {

					$find_starship = Starship::where('name', $res['name'])->first();
					if (!$find_starship) {
						$starship = new Starship();
						$starship->name = $res['name'];
						$starship->model = $res['model'];
						$starship->manufacturer = $res['manufacturer'];
						$starship->cost_in_credits = $res['cost_in_credits'];
						$starship->length = $res['length'];
						$starship->max_atmosphering_speed = $res['max_atmosphering_speed'];
						$starship->crew = $res['crew'];
						$starship->passengers = $res['passengers'];
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
			}
		}

		return self::SUCCESS;
	}
}
