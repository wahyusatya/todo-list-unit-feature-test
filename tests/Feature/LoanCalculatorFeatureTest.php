<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoanCalculatorFeatureTest extends TestCase
{
    /** @test */
    public function it_returns_the_loan_view_with_calculated_values()
    {
        $response = $this->post('/calculate', [
            'principal' => 10000000,
            'interest' => 10,
            'years' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('loan');
        $response->assertViewHasAll([
            'principal',
            'interest',
            'years',
            'installment',
            'totalInterest',
            'totalPayment',
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post('/calculate', []);

        $response->assertSessionHasErrors(['principal', 'interest', 'years']);
    }

    /** @test */
    public function it_rejects_values_below_minimum()
    {
        $response = $this->post('/calculate', [
            'principal' => 500000, // too low
            'interest' => -5,      // invalid
            'years' => 0,          // invalid
        ]);

        $response->assertSessionHasErrors(['principal', 'interest', 'years']);
    }
}
