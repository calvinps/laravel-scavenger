<?php

declare(strict_types=1);

namespace ReliqArts\Scavenger\Concern;

/**
 * Timed trait.
 */
trait Timed
{
    /**
     * @var float
     */
    protected float $startTime = 0;

    /**
     * Get seconds since a "micro-time" start-time.
     *
     * @return string seconds since, to 2 decimal places
     */
    protected function elapsedTime(?float $startTime = null): string
    {
        $startTime = $startTime ?? $this->startTime;
        $duration = microtime(true) - $startTime;
        $hours = (int)($duration / 60 / 60);
        $minutes = (int)($duration / 60) - $hours * 60;
        $seconds = $duration - $hours * 60 * 60 - $minutes * 60;

        return number_format((float)$seconds, 2, '.', '') . 's';
    }

    protected function startTimer(): void
    {
        $this->startTime = microtime(true);
    }
}
