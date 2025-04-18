<?php

function timeAgo($timestamp)
{
    $time = strtotime($timestamp);
    $time_diff = time() - $time;
    $seconds = $time_diff;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);

    if ($seconds <= 60) {
        return "Most";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "Egy perce";
        } else {
            return "$minutes perce";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "Egy órája";
        } else {
            return "$hours órája";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Tegnap";
        } else {
            return "$days napja";
        }
    } else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "Egy hete";
        } else {
            return "$weeks hete";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "Egy hónapja";
        } else {
            return "$months hónapja";
        }
    } else if ($years == 1) {
        return "Több mint egy éve";
    } else {
        return "$years éve";
    }
}
