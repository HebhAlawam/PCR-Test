<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=1;
        while ($i<=5){
            DB::table('centers')->insert([ 
                'name' => 'center' . $i , 'image' => 'seed/logo hos.jpg' ,'city' => 'city' . $i ,'cost' => rand(100,300)]);
            $i++;    
        }
    //diseases
    $i=1;
        $diseases = ['Anemia', 'Arthritis', 'Gout', 'Epilepsy Seizures', 'Heart Attack','Thyroid Problems',
        'High Blood Pressure', 'Cancer', 'Heart Disease', 'Digestive Problems','Hepatitis'];
        while ($i < count($diseases)){
            DB::table('diseases')->insert([ 'name' => $diseases[$i]]); $i++;    
        }

    //symptoms
        DB::table('symptoms')->insert([ 'name' => 'High fever']);    
        DB::table('symptoms')->insert([ 'name' => 'Cough']);    
        DB::table('symptoms')->insert([ 'name' => 'Difficulty in breathing']);    
        DB::table('symptoms')->insert([ 'name' => 'Persistent pain or pressure in the chest']);    
        DB::table('symptoms')->insert([ 'name' => 'Body aches']);    
        DB::table('symptoms')->insert([ 'name' => 'Nasal congestion']);    
        DB::table('symptoms')->insert([ 'name' => 'Runny nose']);    
        DB::table('symptoms')->insert([ 'name' => 'Sore throat']);    
        DB::table('symptoms')->insert([ 'name' => 'Diarrhea']);    
        DB::table('symptoms')->insert([ 'name' => 'None']);    



        

    }
}
