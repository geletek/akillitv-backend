<?php

namespace App\Events\Backend\Video\Category;

use Illuminate\Queue\SerializesModels;

/**
 * Class CategoryReactivated.
 */
class CategoryReactivated
{
    use SerializesModels;

    /**
     * @var
     */
    public $category;

    /**
     * @param $category
     */
    public function __construct($category)
    {
        $this->category = $category;
    }
}