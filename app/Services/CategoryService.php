<?php

namespace App\Services;

class CategoryService
{
    public function displayCategories($categories, $level = 0)
    {
        $output = '<ul>';
        foreach ($categories as $category) {
            $output .= '<li>' . $category['category_name'];
            if (!empty($category['child'])) {
                $output .= $this->displayCategories($category['child']);
            }
            $output .= '</li>';
        }
        $output .= '</ul>';
        return $output;
    }
}
