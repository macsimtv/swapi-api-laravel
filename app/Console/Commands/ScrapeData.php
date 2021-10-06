<?php

namespace App\Console\Commands;

use App\Models\Planet;
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
				}
				if ($endpoint == "https://swapi.dev/api/species/") {
				}
			}
		}

		return self::SUCCESS;
	}
}
