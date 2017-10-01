<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent database model 'Helpdesk'
 *
 * @property integer            $id
 * @property integer            $category
 * @property string             $subject
 * @property string             $description
 * @property \Carbon\Carbon     $created_at
 * @property \Carbon\Carbon     $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Categories[] $categories
 */
class Helpdesk extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['category', 'subject', 'description'];

    /**
     * Data relation for the ticket category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category');
    }
}
