<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CorrectFields implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  array  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $correctFields = [
            'name', 'date_from', 'date_to', 'description'
        ];

        foreach ($value as $item) {
            foreach ($item as $key=>$item2) {
                if (!in_array($key, $correctFields)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid array places.';
    }
}
