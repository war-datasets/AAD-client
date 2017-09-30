<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * An eloquent model: 'Contact'
 *
 * @property integer        $id             The primary key.
 * @property string         $title          The title from the message.
 * @property string         $message        The contact message (body).
 * @property \Carbon\Carbon $created_at     The date when the message has been created.
 * @property \Carbon\Carbon $updated_at     The date when the message is last updated.
 */
class Contact extends Model
{
    /**
     * Mass-assign fields for the database table. 
     *
     * @return array 
     */ 
    protected $fillable = [];
}
