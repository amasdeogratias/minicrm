<?php

namespace App\Enums;

enum TaskStatus: string
{
    CASE OPEN = 'open';
    CASE IN_PROGRESS = "in progress";
    CASE PENDING = "pending";
    CASE WAITING_CLIENT = "waiting client";
    CASE BLOCKED = 'blocked';
    CASE CLOSED = 'closed';
}
