<?php
    /**
     * Created by Yaiba.
     * Date: 15/06/2016
     * Time: 11:17
     */

    $listeSR[] ="SR";
    $listeSR[] ="LAD";
    $listeSR[] ="AML";
    $listeSR[] ="MR";
    $listeSR[] ="RD";
    $listeSR[] ="BMC";
    $listeSR[] ="VP";
    $listeSR[] ="BC";
    $listeSR[] ="TV";
    $listeSR[] ="VE";
    $listeSR[] ="NS";
    $listeSR[] ="BMA";
    $listeSR[] ="MB";
    $listeSR[] ="JON";
    $listeSR[] ="LG";
    $listeSR[] ="OU";
    $listeSR[] ="BO";
    $listeSR[] ="LID";
    $listeSR[] ="CBY";
    $listeSR[] ="TP";
    $listeSR[] ="LV";
    $listeSR[] ="VND";
    $listeSR[] ="NB";
    $listeSR[] ="ACH";
    $listeSR[] ="NM";
    $listeSR[] ="PO";
    $listeSR[] ="AV";
    $listeSR[] ="VTN";
    $listeSR[] ="DY";
    $listeSR[] ="DNC";
    $listeSR[] ="LE";
    $listeSR[] ="SC";
    $listeSR[] ="CAL";
    $listeSR[] ="PX";
    $listeSR[] ="TLA";
    $listeSR[] ="PS";
    $listeSR[] ="MS";
    $listeSR[] ="LMC";
    $listeSR[] ="SS";
    $listeSR[] ="CD";
    $listeSR[] ="AUV";
    $listeSR[] ="RAY";
    $listeSR[] ="SA";
    $listeSR[] ="NE";
    $listeSR[] ="SV";
    $listeSR[] ="NVS";
    $listeSR[] ="TD";
    $listeSR[] ="NVT";
    $listeSR[] ="CAB";
    $listeSR[] ="AVT";
    $listeSR[] ="QM";
    $listeSR[] ="SGX";
    $listeSR[] ="TGR";
    $listeSR[] ="AS";
    $listeSR[] ="LND";
    $listeSR[] ="VSD";
    $listeSR[] ="SG";
    $listeSR[] ="BXL";
    $listeSR[] ="BXT";
    $listeSR[] ="NN";
    $listeSR[] ="DPA";
    $listeSR[] ="CBG";
    $listeSR[] ="LNT";
    $listeSR[] ="MAS";
    $listeSR[] ="CA";
    $listeSR[] ="BOC";
    $listeSR[] ="XDY";
    $listeSR[] ="TLL";
    $listeSR[] ="NSR";
    $listeSR[] ="XAV";
    $listeSR[] ="NIA";
    $listeSR[] ="DLN";
    $listeSR[] ="SGL";
    $listeSR[] ="MS1";
    $listeSR[] ="LBL";
    $listeSR[] ="RO";
    $listeSR[] ="BSN";
    $listeSR[] ="EPY";
    $listeSR[] ="MV";
    $listeSR[] ="VEL";
    $listeSR[] ="TG";
    $listeSR[] ="XVE";
    $listeSR[] ="PPN";
    $listeSR[] ="GE";
    $listeSR[] ="XAD";
    $listeSR[] ="GRA";
    $listeSR[] ="XTV";
    $listeSR[] ="OM";
    $listeSR[] ="CG";
    $listeSR[] ="BS";
    $listeSR[] ="ALC";
    $listeSR[] ="XTD";
    $listeSR[] ="WPY";
    $listeSR[] ="XBO";
    $listeSR[] ="XLI";
    $listeSR[] ="XAC";
    $listeSR[] ="CAV";
    $listeSR[] ="EIM";
    $listeSR[] ="LA";
    $listeSR[] ="CLL";
    $listeSR[] ="XLL";
    $listeSR[] ="BTV";
    $listeSR[] ="XEE";
    $listeSR[] ="SNF";
    $listeSR[] ="VVB";
    $listeSR[] ="CE";
    $listeSR[] ="PEB";
    $listeSR[] ="SB";
    $listeSR[] ="LH";
    $listeSR[] ="SIB";
    $listeSR[] ="CYV";
    $listeSR[] ="VLN";
    $listeSR[] ="CIH";
    $listeSR[] ="RBC";
    $listeSR[] ="SJM";
    $listeSR[] ="ALE";
    $listeSR[] ="PPL";
    $listeSR[] ="CRE";
    $listeSR[] ="HE";
    $listeSR[] ="AVC";
    $listeSR[] ="LB";
    $listeSR[] ="LL";
    $listeSR[] ="MEL";
    $listeSR[] ="CN";
    $listeSR[] ="COE";
    $listeSR[] ="LDS";
    $listeSR[] ="MAN";
    $listeSR[] ="REP";
    $listeSR[] ="BRI";
    $listeSR[] ="CH";
    $listeSR[] ="JA";
    $listeSR[] ="VO";
    $listeSR[] ="LMN";
    $listeSR[] ="ME";
    $listeSR[] ="AMV";
    $listeSR[] ="BY";
    $listeSR[] ="RBT";
    $listeSR[] ="AMB";
    $listeSR[] ="EP";
    $listeSR[] ="GEN";
    $listeSR[] ="MOD";
    $listeSR[] ="NSY";
    $listeSR[] ="PE";
    $listeSR[] ="TLN";
/*
    for($i=0;$i<5;$i++){
        foreach($listeSR as $sr){
            $time = microtime(true);
            $site[$sr]['srData'] = file_get_contents("http://x64lmwbiix2.lamulatiere.dsit.sncf.fr:11280/OsmoBoard/managementVisuel/getData/".$sr);
            $site[$sr]['time'.$i] = microtime(true)-$time;
            #echo "<pre>";
            #var_dump($site);
        }
    }

    echo "<table><tr><td>Site</td><td>Taille</td><td colspan='5'>Temps à chaque essai</td><td>Temps moyen</td></tr>";

    foreach($site as $key => $value){
        echo "<tr>
            <th>".$key."</th>
            <td>".strlen($value['srData'])."</td>
            <td>".round($value['time0'],4)."</td>
            <td>".round($value['time1'],4)."</td>
            <td>".round($value['time2'],4)."</td>
            <td>".round($value['time3'],4)."</td>
            <td>".round($value['time4'],4)."</td>
            <td>".round((($value['time0']+$value['time1']+$value['time2']+$value['time3']+$value['time4'])/5),4)."</td>
            </tr>";
    }

    echo "</table>";
*/