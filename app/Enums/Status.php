<?php

namespace App\Enums;

abstract class Status
{

    const CATEGORY_STATUS = [
        1 => '<span class="badge bg-success">Active</span>',
        0 => '<span class="badge bg-dark">Inactive</span>',
    ];
}
