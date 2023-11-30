<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Timeline;

class TimelineControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_timeline()
    {
        $data = [
            'recruiter_name' => 'Paris',
            'recruiter_surname' => 'Doze',
            'candidate_name' => 'Mike',
            'candidate_surname' => 'Walhe',
        ];

        // Αναμονή για τη δημιουργία του timeline
        $response = $this->post('/timelines/create', $data);

        // Έλεγχος αν η απάντηση είναι επιτυχής
        $response->assertSuccessful();

        // Έλεγχος αν το timeline δημιουργήθηκε
        $this->assertCount(1, Timeline::all());

        // Έλεγχος για τα αναμενόμενα δεδομένα του timeline
        $timeline = Timeline::first();
        $this->assertEquals($data['recruiter_name'], $timeline->recruiter_name);
        $this->assertEquals($data['recruiter_surname'], $timeline->recruiter_surname);
        $this->assertEquals($data['candidate_name'], $timeline->candidate_name);
        $this->assertEquals($data['candidate_surname'], $timeline->candidate_surname);
    }
}
