<?php

use Anam\Dashboard\Models\Project;

function project()
{
    return Project::first();
}

function brandLogo()
{
    return asset('uploads/project-info/' . Project::first()->brand_logo);
}

function logoBadge()
{
    $arr = explode(' ', config('app.name'), 3);
    $badge = '';
    foreach ($arr as $key => $chunk) {
        $badge .= substr($chunk, 0, 1);
    }
    return '<b>' . $badge . '</b>';
}
