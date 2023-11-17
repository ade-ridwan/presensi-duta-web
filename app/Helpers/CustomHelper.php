<?php

function getDayID($kode_hari)
{
    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    return $hari[$kode_hari] ?? "";
}
