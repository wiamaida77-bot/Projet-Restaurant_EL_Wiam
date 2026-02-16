<?php

if (!function_exists('formatPriceDh')) {
    /**
     * Format price in Moroccan Dirhams (DH)
     * 
     * @param float|int $price
     * @return string
     */
    function formatPriceDh($price)
    {
        // Convert to integer if it's a whole number
        if ($price == floor($price)) {
            return number_format($price, 0) . ' DH';
        }
        
        // Keep 2 decimal places if there are cents
        return number_format($price, 2) . ' DH';
    }
}
