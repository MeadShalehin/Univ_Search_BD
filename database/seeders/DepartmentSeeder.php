<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define an array of department names
        $departments = [
            "Accounting (B)",
            "Anthropology (B)",
            "Applied Chemistry (B)",
            "Biochemistry (B)",
            "Bangla (B)",
            "Business (B)",
            "Computer Science (B)",
            "Economics (B)",
            "English (B)",
            "History (B)",
            "Islamic Studies (B)",
            "Law (B)",
            "Mathematics (B)",
            "Philosophy (B)",
            "Physics (B)",
            "Political Science (B)",
            "Psychology (B)",
            "Sociology (B)",
            "Accounting (M)",
            "Anthropology (M)",
            "Applied Chemistry (M)",
            "Biochemistry (M)",
            "Bangla (M)",
            "Business (M)",
            "Computer Science (M)",
            "Economics (M)",
            "English (M)",
            "History (M)",
            "Islamic Studies (M)",
            "Law (M)",
            "Mathematics (M)",
            "Philosophy (M)",
            "Physics (M)",
            "Political Science (M)",
            "Psychology (M)",
            "Sociology (M)",
            "Civil Engineering (B)",
            "CSE (B)",
            "EEE (B)",
            "IPE (B)",
            "Mech Eng (B)",
            "Textile Eng (B)",
            "Civil Engineering (M)",
            "CSE (M)",
            "EEE (M)",
            "IPE (M)",
            "Mech Eng (M)",
            "Textile Eng (M)",
            "Agri Economics (B)",
            "Agri Extension (B)",
            "Agri Education (B)",
            "Agri Eng (B)",
            "Animal Science (B)",
            "Env Science (B)",
            "Finance (B)",
            "Int Relations (B)",
            "Management (B)",
            "Marketing (B)",
            "Agri Economics (M)",
            "Agri Extension (M)",
            "Agri Education (M)",
            "Agri Eng (M)",
            "Animal Science (M)",
            "Env Science (M)",
            "Finance (M)",
            "Int Relations (M)",
            "Management (M)",
            "Marketing (M)",
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
            ]);
        }
    }
}
