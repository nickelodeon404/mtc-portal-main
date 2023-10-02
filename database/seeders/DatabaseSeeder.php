<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Strand;
use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\SubjectLoad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        //Data for strands table.
        DB::table('strands')->insert([
            'name' => 'Accountancy Business & Management',
            'acronym' => 'ABM'
        ]);

        $GAS = Strand::factory('strands')->create([
            'name' => 'General Academic Strand',
            'acronym' => 'GAS'
        ]);

        DB::table('strands')->insert([
            'name' => 'Humanities & Social Sciences ',
            'acronym' => 'HUMSS'
        ]);

        $STEM = Strand::factory('strands')->create([
            'name' => 'Science, Technology, Engineering & Mathematics',
            'acronym' => 'STEM'
        ]);

        DB::table('strands')->insert([
            'name' => 'Information and Communications Technology',
            'acronym' => 'TVL-ICT'
        ]);

        DB::table('strands')->insert([
            'name' => 'Home Economics',
            'acronym' => 'TVL-HE'
        ]);

        DB::table('strands')->insert([
            'name' => 'Arts & Design',
            'acronym' => 'Arts & Design'
        ]);

        //Data for academic_record_documents
        DB::table('academic_record_documents')->insert([
            'name' => 'Form 137 (JHS)'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Form 138'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Good Moral'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Certificates of Grades'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Certificate of Enrollment'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Certified True Copy'
        ]);

        DB::table('academic_record_documents')->insert([
            'name' => 'Assessment Form'
        ]);
        $eng = Subject::factory()->create([
            'name' => 'English',
            'code' => 'E1',
        ]);
        $mat = Subject::factory()->create([
            'name' => 'Mathematics',
            'code' => 'M1',
        ]);
        $sci = Subject::factory()->create([
            'name' => 'Science',
            'code' => 'S1',
        ]);
        $fil = Subject::factory()->create([
            'name' => 'Filipino',
            'code' => 'F1',
        ]);

        $faculty = User::factory()->create([
            'name' => 'Faculty',
            'email' => 'faculty@example.com',
            'year_level' => 'not applicable',
            'strands_id' => $GAS->id,
            'password' => Hash::make('111'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Registrar',
            'email' => 'registrar@example.com',
            'year_level' => 'not applicable',
            'password' => Hash::make('111'),
            'strands_id' => $GAS->id,
            'role_id' => 2
        ]);
    
        $student = User::factory()->create([
            'name' => 'default',
            'email' => 'example@example.com',
            'year_level' => '11',
            'strands_id' => $GAS->id,
            'password' => Hash::make('do not login this account'),
            'role_id' => 3
        ]);
    /*
        User::factory()->create([
            'name' => 'default1',
            'email' => 'example1@example.com',
            'year_level' => '12',
            'strands_id' => $GAS->id,
            'password' => Hash::make('do not login this account'),
            'role_id' => 3
        ]);
        User::factory()->create([
            'name' => 'default2',
            'email' => 'example2@example.com',
            'year_level' => '11',
            'strands_id' => $STEM->id,
            'password' => Hash::make('do not login this account'),
            'role_id' => 3
        ]);
        User::factory()->create([
            'name' => 'default3',
            'email' => 'example3@example.com',
            'year_level' => '12',
            'strands_id' => $STEM->id,
            'password' => Hash::make('do not login this account'),
            'role_id' => 3
        ]);
    */
    
        $sl1 = SubjectLoad::factory()->create([
            'students_id' => $student->id,
            'faculties_id' => $faculty->id,
            'subjects_id' => $eng->id,
        ]);
        $sl2 = SubjectLoad::factory()->create([
            'students_id' => $student->id,
            'faculties_id' => $faculty->id,
            'subjects_id' => $mat->id,
        ]);
        $sl3 = SubjectLoad::factory()->create([
            'students_id' => $student->id,
            'faculties_id' => $faculty->id,
            'subjects_id' => $sci->id,
        ]);
        $sl4 = SubjectLoad::factory()->create([
            'students_id' => $student->id,
            'faculties_id' => $faculty->id,
            'subjects_id' => $fil->id,
        ]);

        Grade::factory()->create([
            'grade' => '95',
            'quarter' => '1',
            'subjectLoads_id' => $sl1
        ]);
        Grade::factory()->create([
            'grade' => '80',
            'quarter' => '1',
            'subjectLoads_id' => $sl2
        ]);
        Grade::factory()->create([
            'grade' => '85',
            'quarter' => '1',
            'subjectLoads_id' => $sl3
        ]);
        Grade::factory()->create([
            'grade' => '92',
            'quarter' => '1',
            'subjectLoads_id' => $sl4
        ]);

    }
}