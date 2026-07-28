<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StockDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ticker' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9.\-]+$/'],
            'segment' => ['required', 'string', Rule::in($this->allowedSegments())],
            'interval' => ['required', 'integer', Rule::in($this->allowedIntervals())],
            'limit' => [
                Rule::requiredIf($this->routeIs('cryptocurrency.stocks')),
                'nullable',
                'integer',
                'min:1',
                'max:2000',
            ],
        ];
    }

    private function allowedSegments(): array
    {
        return match (true) {
            $this->routeIs('moscow.stocks') => ['day', 'week', 'month', 'year'],
            $this->routeIs('foreign.stocks') => ['intraday', 'daily_adjusted', 'weekly'],
            $this->routeIs('cryptocurrency.stocks') => ['histohour', 'histoday'],
            default => [],
        };
    }

    private function allowedIntervals(): array
    {
        return match (true) {
            $this->routeIs('moscow.stocks') => [7, 10, 24, 60],
            $this->routeIs('foreign.stocks') => [30, 60],
            $this->routeIs('cryptocurrency.stocks') => [1, 4, 7],
            default => [],
        };
    }
}
