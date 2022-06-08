<?php

namespace Database\Seeders;

use App\Enum\CategoryEnum;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperMarketKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SUPERMARKET
        Keyword::create( [
            'keywords' => ['aldi', 'tesco store', 'morrisons store', 'lidl', 'sainsbury\'s', 'morrisons stockton gbr', 'morrisons stockton'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::SUPERMARKET->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['amazon', 'amznmktplace amazon', 'amznmktplace'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::AMAZON->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['petrol', 'tesco petrol', 'morrisons petrol'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::FUEL->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['o2', 'giffgaff'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::MOBILE_PHONE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['boots'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::BOOTS->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['ultimate grooming'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::HAIRCUT->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['xsolla roblox cyp', 'xsolla', 'roblox', '_roblox'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::ROBLOX->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['sports direct', 'next', 'marks&spencer plc internet vis', 'marks&spencer', 'marks&spencer plc teesside', 'marks & spencer'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::CLOTHES->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['voucherstoreuk hemel hempste gbr', 'voucherstoreuk'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::ARGOS_VOUCHER->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['multi media creati', 'multi media', 'johnson matthey em cr'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::SALARY->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['webloyalty interna', 'webloyalty', 'cashback'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::MY_CASHBACK->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['waterstones'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::BOOKS->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['loveadmin', 'loveadmin dd'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::LOVE_ADMIN->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['british gas dd', 'british gas'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::ENERGY->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['inspire beauty yarm vis', 'inspire beauty'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::INSPIRE_BEAUTY->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['ee limited dd', 'ee limited'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::INTERNET->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['northumbrian water dd', 'northumbrian water'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::WATER->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['vue cinema darlington', 'vue cinema', 'cinema', 'vue entertainment ltd chiswick, lon gbr', 'vue entertainment', 'showcase teesside w internet gbr', 'showcase teesside', 'showcase'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::LEISURE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['rust l t old 3 newsam rent so', 'rust l'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::MORTGAGE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['unite the union dd', 'unite the union', 'the union'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::UNITE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['hsbc plc loans dd', 'hsbc plc loans', 'plc loans'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::CAR_LOAN->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['netflix.com los gatos vis', 'netflix.com', 'tv licence mbp dd', 'tv licence', 'disney plus london gbr', 'disney plus'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::TV->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['tax free childcare', 'childcare'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::CHILDCARE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['df coaching', 'eb *mini messis ag', '*mini messis', 'messis'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::FOOTBALL->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['mcdonalds uk stockton on t vis', 'mcdonalds', 'kfc - darlington d darlington', 'kfc', 'pollo', 'pollotogo', 'pollotogo stokesley snd'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::JUNK_FOOD->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['tees active limit dd', 'tees active'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::TEES_ACTIVE->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['sbc council tax dd', 'council tax'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::COUNCIL_TAX->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['k kourou- paradeli 32 home stick bp', 'kourou- paradeli', 'paradeli', 'kourou', 'kourou-', 'candice dean banana set bp', 'candice dean'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::BODYSHOP->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['protyre co uk winchester gbr', 'protyre', 'dvla vehicle tax 0300 1234321 gbr', 'dvla', 'dvla vehicle tax'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::CARS->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['wly*completesave.c'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::SUBSCRIPTION->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['paypal *kesafitnes 35314369001 vis', '*kesafitnes'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::FITNESS->value)->first()->id,
        ]);

        Keyword::create( [
            'keywords' => ['schoolgatewa*durha stocktonontee vis', 'schoolgatewa*durha'],
            'category_id' => Category::query()->where('name', 'LIKE', CategoryEnum::SCHOOL_CLUBS->value)->first()->id,
        ]);

    }
}
