<?php

namespace App\Helpers;

use App\Models\Log_surat;

class LogSurat
{
    public static function createLog($id_sm, $id_sk, $id_tujuan, $id_pengirim, $id_tembusan, $id_verifikator, $id_ttd, $id_disposisi, $id_status, $read, $id_create)
    {
        // if($id_status!=7) {
        //     Logsurat::create([
        //         'id_sm' => $id_sm,
        //         'id_sk' => $id_sk,
        //         'id_tujuan' => $id_tujuan,
        //         'id_pengirim' => $id_pengirim,
        //         'id_tembusan' => $id_tembusan,
        //         'id_verifikator' => $id_verifikator,
        //         'id_ttd' => $id_ttd,
        //         'id_disposisi' => $id_disposisi,
        //         'id_status' => $id_status,
        //         'read' => $read,
        //         'id_create' => $id_create
        //     ]);
        // } else {
        //     Logsurat::create([
        //         'id_sm' => $id_sm,
        //         'id_sk' => $id_sk,
        //         'id_tujuan' => $id_tujuan,
        //         'id_pengirim' => $id_pengirim,
        //         'id_tembusan' => $id_tembusan,
        //         'id_verifikator' => $id_verifikator,
        //         'id_ttd' => $id_ttd,
        //         'id_disposisi' => $id_disposisi,
        //         'id_status' => $id_status,
        //         'read' => $read,
        //         'id_create' => $id_create
        //     ]);
        // }

        Log_surat::create([
            'id_sm' => $id_sm,
            'id_sk' => $id_sk,
            'id_tujuan' => $id_tujuan,
            'id_pengirim' => $id_pengirim,
            'id_tembusan' => $id_tembusan,
            'id_verifikator' => $id_verifikator,
            'id_ttd' => $id_ttd,
            'id_disposisi' => $id_disposisi,
            'id_status' => $id_status,
            'read' => $read,
            'id_create' => $id_create
        ]);
    }
}