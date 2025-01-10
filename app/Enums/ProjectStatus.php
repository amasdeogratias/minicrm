<?php

namespace App\Enums;

enum ProjectStatus: string
{
    CASE OPEN = 'open';
    CASE IN_PROGRESS = 'in progress';
    CASE BLOCKED = 'blocked';
    CASE CANCELLED = 'cancelled';
    CASE COMPLETED = 'completed';
}
