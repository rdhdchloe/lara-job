<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Listing::factory(30)->create();

        // Listing::create([
        //     'title'=>'Laravel developer',
        //     'tags'=>'laravel,javascript',
        //     'company'=>'Acme corp',
        //     'description'=>'this is the company description text',
        //     'url'=>'https://www.google.com',
        //     'location'=> 'Tokyo'
        // ]);

        $appId = env('YAHOO_API_KEY');
        $results = 1000;

        $response = Http::get('https://job.yahooapis.jp/v1/furusato/jobinfo/', [
            'appid' => $appId,
            'results' => $results,
        ]);
        // dd($response);

        if($response->successful()){
            $response = $response->json();
            $jobData = $response['results'];
            foreach ($jobData as $job) {
                if (isset($job['occupationCode']) && $job['occupationCode'] === '104') {
                    Listing::create([
                        'title' => $job['title'],
                        'description' => $job['description'],
                        'company' => $job['cpName'],
                        'position' => $job['occupationName'] ? $job['occupationName'] : 'webエンジニア',
                        'url' => $job['receptionUrl'] ? $job['receptionUrl'] : 'メールもしくは電話応募',
                        'salary' => ($job['salaryMin'] && $job['salaryMax']) ? $job['salaryMin'] . ' 〜 ' . $job['salaryMax'] : '保有されるスキル・経験・能力により決定 (その他)',
                        'location' => $job['workLocationPrefecture'],
                        'user_id' => 1
                    ]);
                };
            }
        }
    }
}
