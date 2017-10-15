<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent database model 'Helpdesk'
 *
 * @property integer            $id                 The unique identifier for the ticket.
 * @property integer            $author_id          The id from the user that created the ticket.
 * @property integer            $assignee_id        The id from the user that is assigned to the user.
 * @property integer            $category           The category for the ticket.
 * @property string             $subject            The subject from the ticket.
 * @property string             $description        The ticket description
 * @property \Carbon\Carbon     $created_at         The timestamp when the ticket has been created.
 * @property \Carbon\Carbon     $updated_at         The timestamp when thue tiàcket was last updated.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Categories[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[]       $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[]       $assignee
 */
class Helpdesk extends Model
{
    // TODO: Consider softDeletes for the helpdesk tickets.
    //       Because tickets can be delete so we need to store them in a timespan like example: 2 monts
    //       Before we hard delete them.

    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['author_id', 'assignee_id', 'category', 'subject', 'description'];

    /**
     * Data relation for the ticket category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category');
    }

    /**
     * Data relation for the ticket author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Data relation for the assigned user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id')
            ->withDefault(['name' => 'none']);
    }

    /**
     * @todo docblock
     */
    public function status()
    {
        // TODO: Build up the relation
    }

    /**
     * @todo docblock
     */
    public function priority()
    {
        // TODO: Build up the ralation
    }
}
