<?php

namespace App\Enums;

enum PermissionEnum: string
{
    CASE MANAGE_USERS = "manage_users";
    CASE DELETE_PROJECTS = "delete_projects";
    CASE DELETE_CLIENTS = "delete_clients";
    CASE DELETE_TASKS = "delete_tasks";
}
