<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StudentSection;
use App\Models\User;
use App\Models\Grade;
use App\Models\Strand;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Admission;
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
            'acronym' => 'ARTS & DESIGN'
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
            'email' => 'Faculty',
            'password' => Hash::make('111'),
            'role_id' => 1,
            'emailaddress' => 'faculty@example.com',
            'address' => 'facultyAddress',
            'mobile_number' => '+63123456789',
        ]);

        DB::table('users')->insert([
            'name' => 'Registrar',
            'email' => 'Registrar',
            'password' => Hash::make('111'),
            'role_id' => 2,
            'emailaddress' => 'registrar@gmail.com',
            'address' => 'RegistrarAddress',
            'mobile_number' => '+63123456789',
        ]);
    
        $student = User::factory()->create([
            'name' => 'default',
            'email' => 'default@example.com',
            'password' => Hash::make('111'),
            'role_id' => 3,
            'emailaddress' => 'default@gmail.com',
            'address' => 'defaultAddress',
            'mobile_number' => '+63123456789',
        ]);
    
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

        Admission::factory()->create([
            'users_id' => $student->id,
            'lrn' => '19006581235',
            'email' => 'default@example.com',
            'first_name' => 'Student_first_name',
            'middle_name' => 'Student_middle_name',
            'last_name' => 'Student_last_name',
            'birthday' => '2023-10-02',
            'age' => '23',
            'barangay' => 'Bagumbayan',
            'city_municipality' => 'Baao',
            'province' => 'Camarines Sur',
            'mobile_number' => '+639123456789',
            'junior_high' => 'Baao National High School',
            'year_graduated' => '2016',
            'strand' => 'STEM',
            'graduation_type' => 'public',
        ]);
//GRADE 11 SECTION
        $A = Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '11',
            'name' => "C"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '11',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '11',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '11',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '11',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '11',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '11',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '11',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '11',
            'name' => "C"
        ]);

//GRADE 12 SECTION
        Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 1,
            'year_level' => '12',
            'name' => "C"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 2,
            'year_level' => '12',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 3,
            'year_level' => '12',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 4,
            'year_level' => '12',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 5,
            'year_level' => '12',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 6,
            'year_level' => '12',
            'name' => "C"
        ]);

        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '12',
            'name' => "A"
        ]);
        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '12',
            'name' => "B"
        ]);
        Section::factory()->create([
            'strand_id' => 7,
            'year_level' => '12',
            'name' => "C"
        ]);
        
        StudentSection::factory()->create([
            'section_id' => $A->id,
            'student_id' => $student->id
        ]);

    }
}