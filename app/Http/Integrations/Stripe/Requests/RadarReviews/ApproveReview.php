<?php

namespace App\Http\Integrations\Stripe\Requests\RadarReviews;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Approve a review
 */
class ApproveReview extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/reviews/{$this->review}/approve";
    }

    public function __construct(
        protected string $review,
    ) {
    }
}
