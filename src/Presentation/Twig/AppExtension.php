<?php

namespace App\Presentation\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('formatViews', [$this, 'formatViews']),
        ];
    }

    public function formatViews(int $views): string
    {
        if ($views >= 1000000) {
            return round($views / 1000000, 1) . 'M'; // 1.5M, 2M и т.д.
        } elseif ($views >= 1000) {
            return round($views / 1000, 1) . 'K'; // 1.5K, 2K и т.д.
        }

        return (string) $views; // Для значений меньше 1000
    }
}
