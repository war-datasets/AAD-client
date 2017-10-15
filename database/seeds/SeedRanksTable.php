<?php

use App\Ranks;
use App\Services;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedRanksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['service' => 'F', 'code' => 'CWO-3', 'name' => 'Chief Warrent Officer'],
            ['service' => 'F', 'code' => 'CWO-4', 'name' => 'Chief Warrent Officer'],
            ['service' => 'F', 'code' => 'CWO-5', 'name' => 'Chief Warrent Officer'],
            ['service' => 'F', 'code' => 'OAC', 'name' => 'Aviation Officer Candidate'],
            ['service' => 'F', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'F', 'code' => 'A3C', 'name' => 'Airman third class'],
            ['service' => 'A', 'code' => 'SP6', 'name' => 'Specialist 6'],
            ['service' => 'N', 'code' => 'CN', 'name' => 'Constructionman'],
            ['service' => 'N', 'code' => 'CA', 'name' => 'Constructionman apprentice'],
            ['service' => 'N', 'code' => 'CR', 'name' => 'Constructionman recruit'],
            ['service' => 'F', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'F', 'code' => 'PFC', 'name' => 'Private First class'],
            ['service' => 'F', 'code' => 'PVT', 'name' => 'Private'],
            ['service' => 'M', 'code' => 'TSGT', 'name' => 'technical Sergeant'],
            ['service' => 'N', 'code' => 'HA', 'name' => 'Hospital corpsman apprentice'],
            ['service' => 'N', 'code' => 'HN', 'name' => 'Hospital corpsman'],
            ['service' => 'A', 'code' => 'PV1', 'name' => 'Private (no insignia)'],
            ['service' => 'A', 'code' => 'PVT', 'name' => 'Private, PV2'],
            ['service' => 'A', 'code' => 'PFC', 'name' => 'Private first class'],
            ['service' => 'A', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'A', 'code' => 'SPC', 'name' => 'specialist'],
            ['service' => 'A', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'A', 'code' => 'SSG', 'name' => 'Staff sergeant'],
            ['service' => 'A', 'code' => 'SFG', 'name' => 'Sergeant first class'],
            ['service' => 'A', 'code' => 'MSG', 'name' => 'Master sergeant'],
            ['service' => 'A', 'code' => '1SG', 'name' => 'First sergeant'],
            ['service' => 'A', 'code' => 'SGM', 'name' => 'Sergeant Major'],
            ['service' => 'A', 'code' => 'CSM', 'name' => 'Command sergeant major'],
            ['service' => 'A', 'code' => '2LT', 'name' => 'Second Lieutenant'],
            ['service' => 'A', 'code' => '1LT', 'name' => 'First Lieutenant'],
            ['service' => 'A', 'code' => 'CPT', 'name' => 'Captain'],
            ['service' => 'A', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'A', 'code' => 'LTC', 'name' => 'Lieutenant Colonel'],
            ['service' => 'A', 'code' => 'BG', 'name' => 'Brigadier General'],
            ['service' => 'A', 'code' => 'MG', 'name' => 'Major General'],
            ['service' => 'A', 'code' => 'WO1', 'name' => 'Warrent officer'],
            ['service' => 'A', 'code' => 'CW2', 'name' => 'Chief warrent officer W-2'],
            ['service' => 'A', 'code' => 'CW3', 'name' => 'Chief warrent officer W-3'],
            ['service' => 'A', 'code' => 'CW4', 'name' => 'Chief warrent officer W-4'],
            ['service' => 'A', 'code' => 'CW5', 'name' => 'Chief warrent officer W-5'],
            ['service' => 'A', 'code' => 'CADET', 'name' => 'Cadet'],
            ['service' => 'F', 'code' => 'AB', 'name' => 'Airman basic'],
            ['service' => 'F', 'code' => 'AMN', 'name' => 'Airman'],
            ['service' => 'F', 'code' => 'A1C', 'name' => 'Airman first class'],
            ['service' => 'F', 'code' => 'SRA', 'name' => 'Senior airman'],
            ['service' => 'F', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'F', 'code' => 'SSGT', 'name' => 'Staff sergeant'],
            ['service' => 'F', 'code' => 'TSGT', 'name' => 'Technical sergeant'],
            ['service' => 'F', 'code' => 'MSGT', 'name' => 'Master sergeant'],
            ['service' => 'F', 'code' => 'SMSGT', 'name' => 'Senior master sergeant'],
            ['service' => 'F', 'code' => 'CMSGT', 'name' => 'Chief master sergeant'],
            ['service' => 'F', 'code' => '2NDLT', 'name' => 'Second lieutenant'],
            ['service' => 'F', 'code' => '1STLT', 'name' => 'First lieutenant'],
            ['service' => 'F', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'F', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'F', 'code' => 'LTCOL', 'name' => 'Lieutenant colonel'],
            ['service' => 'F', 'code' => 'COL', 'name' => 'Colonel'],
            ['service' => 'F', 'code' => 'BGEN', 'name' => 'Brigadier general'],
            ['service' => 'F', 'code' => 'MAJGEN', 'name' => 'Major general'],
            ['service' => 'F', 'code' => 'LTGEN', 'name' => 'Lieutenant general'],
            ['service' => 'F', 'code' => 'CADET', 'name' => 'Cadet'],
            ['service' => 'M', 'code' => 'PVT', 'name' => 'Private'],
            ['service' => 'M', 'code' => 'PFC', 'name' => 'Private first class'],
            ['service' => 'M', 'code' => 'LCPL', 'name' => 'Lance corporal'],
            ['service' => 'M', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'M', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'M', 'code' => 'SSGT', 'name' => 'Staff sergeant'],
            ['service' => 'M', 'code' => 'GYSGT', 'name' => 'Gunnery Seargeant'],
            ['service' => 'M', 'code' => 'MSGT', 'name' => 'Master sergeant'],
            ['service' => 'M', 'code' => '1STSGT', 'name' => 'First sergeant'],
            ['service' => 'M', 'code' => 'MGYSGT', 'name' => 'Master gunnery sergeant'],
            ['service' => 'M', 'code' => 'SGTMAJ', 'name' => 'Sergeant major'],
            ['service' => 'M', 'code' => '2NDLT', 'name' => 'Second Lieutenant'],
            ['service' => 'M', 'code' => '1STLT', 'name' => 'First lieutenant'],
            ['service' => 'M', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'M', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'M', 'code' => 'LTCOL', 'name' => 'Lieutenant colonel'],
            ['service' => 'M', 'code' => 'COL', 'name' => 'Colonel'],
            ['service' => 'M', 'code' => 'BGEN', 'name' => 'Brigadier general'],
            ['service' => 'M', 'code' => 'MAJGEN', 'name' => 'Major general'],
            ['service' => 'M', 'code' => 'LTGEN', 'name' => 'Lieutenant general'],
            ['service' => 'M', 'code' => 'WO', 'name' => 'Warrent officer'],
            ['service' => 'M', 'code' => 'CWO2', 'name' => 'Chief warrent officer'],
            ['service' => 'M', 'code' => 'CWO3', 'name' => 'Chief warrent officer'],
            ['service' => 'M', 'code' => 'CWO4', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'SR', 'name' => 'Seaman recruit'],
            ['service' => 'N', 'code' => 'SA', 'name' => 'Seaman apprentice'],
            ['service' => 'N', 'code' => 'SN', 'name' => 'Seaman'],
            ['service' => 'N', 'code' => 'PO3', 'name' => 'Petty officer third class'],
            ['service' => 'N', 'code' => 'PO2', 'name' => 'Petty officer second class'],
            ['service' => 'N', 'code' => 'PO1', 'name' => 'Petty officer first class'],
            ['service' => 'N', 'code' => 'CPO', 'name' => 'Chief petty officer'],
            ['service' => 'N', 'code' => 'SCPO', 'name' => 'Senior chief petty officer'],
            ['service' => 'N', 'code' => 'MCPO', 'name' => 'Master chief petty officer'],
            ['service' => 'N', 'code' => 'ENS', 'name' => 'Ensign'],
            ['service' => 'N', 'code' => 'LTJG', 'name' => 'Lieutenant junior grade'],
            ['service' => 'N', 'code' => 'LT', 'name' => 'Lieutenant'],
            ['service' => 'N', 'code' => 'LCDR', 'name' => 'Lieutenant commander'],
            ['service' => 'N', 'code' => 'CDR', 'name' => 'Commander'],
            ['service' => 'N', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'N', 'code' => 'RADM L', 'name' => 'Rear admiral (lower half)'],
            ['service' => 'N', 'code' => 'RADM', 'name' => 'Rear admiral'],
            ['service' => 'N', 'code' => 'VADM', 'name' => 'Vice admiral'],
            ['service' => 'N', 'code' => 'WO-1', 'name' => 'Warrent officer'],
            ['service' => 'N', 'code' => 'CWO-2', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-3', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-4', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-5', 'name' => 'Chief warrent officer'],
            ['service' => 'A', 'code' => 'LTG', 'name' => 'Lieutenant general'],
            ['service' => 'A', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'F', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'N', 'code' => 'ADM', 'name' => 'Admiral'],
            ['service' => 'N', 'code' => 'PV2', 'name' => 'Private'],
            ['service' => 'N', 'code' => 'FR', 'name' => 'Fireman recruit'],
            ['service' => 'N', 'code' => 'FA', 'name' => 'Fireman apprentice'],
            ['service' => 'N', 'code' => 'FN', 'name' => 'Fireman'],
            ['service' => 'N', 'code' => 'AR', 'name' => 'Airman recruit'],
            ['service' => 'N', 'code' => 'AA', 'name' => 'Airman apprentice'],
            ['service' => 'N', 'code' => 'AN', 'name' => 'Airman'],
            ['service' => 'F', 'code' => 'A2C', 'name' => 'Airman second class'],
            ['service' => 'F', 'code' => 'CWO-2', 'name' => 'Chief warrent officer'],
            ['service' => 'A', 'code' => 'SP4', 'name' => 'Specialist 4'],
            ['service' => 'A', 'code' => 'SP5', 'name' => 'Specialist 5'],
            ['service' => 'A', 'code' => 'PSG', 'name' => 'Platoon sergeant'],
            ['service' => 'A', 'code' => 'SMA', 'name' => 'Sergeant Major of the army'],
            ['service' => 'A', 'code' => 'OC', 'name' => 'Officer candidate'],
            ['service' => 'A', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'N', 'code' => 'MCPON', 'name' => 'Master chief petty officer of the navy'],
            ['service' => 'N', 'code' => 'OOP', 'name' => 'Officer programs'],
            ['service' => 'N', 'code' => 'MIDSHP', 'name' => 'Midshipman'],
            ['service' => 'N', 'code' => 'OC', 'name' => 'Officer candidate'],
            ['service' => 'N', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'M', 'code' => 'SMOFMC', 'name' => 'Sergeant major of the marine corps'],
            ['service' => 'M', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'M', 'code' => 'PLC', 'name' => 'Platoon leaders class'],
            ['service' => 'F', 'code' => 'CMSAF', 'name' => 'Chief master sergeant of the air force'],
            ['service' => 'F', 'code' => 'WO', 'name' => 'Warrent officer'],
            ['service' => 'N', 'code' => 'DA', 'name' => 'Dentalman apprentice'],
            ['service' => 'N', 'code' => 'DR', 'name' => 'Dentalman recruit'],
            ['service' => 'N', 'code' => 'DN', 'name' => 'Dentalman'],
            ['service' => 'C', 'code' => 'PO1', 'name' => 'Petty officer first class'],
            ['service' => 'C', 'code' => 'PO2', 'name' => 'Petty officer second class'],
            ['service' => 'C', 'code' => 'CPO', 'name' => 'Chief petty officer'],
            ['service' => 'C', 'code' => 'FN', 'name' => 'Fireman'],
            ['service' => 'C', 'code' => 'LT', 'name' => 'Lieutenant'],
            ['service' => 'C', 'code' => 'LTJG', 'name' => 'Lieutenant junior grade'],
            ['service' => 'N', 'code' => 'COMO', 'name' => 'Comodore'],
            ['service' => 'N', 'code' => 'HR', 'name' => 'Hospitalman recruit'],
            ['service' => 'C', 'code' => 'SA', 'name' => 'Seaman apprentice'],
            ['service' => 'C', 'code' => 'SR', 'name' => 'Seaman recruit'],
            ['service' => 'C', 'code' => 'SN', 'name' => 'Seaman'],
            ['service' => 'C', 'code' => 'PO3', 'name' => 'Petty officer third class'],
            ['service' => 'C', 'code' => 'MPCO', 'name' => 'Master chief petty officer'],
            ['service' => 'C', 'code' => 'SCPO', 'name' => 'Senior chief petty officer'],
            ['service' => 'C', 'code' => 'CWO-2', 'name' => 'Chief warrent officer'],
            ['service' => 'C', 'code' => 'CWO-3', 'name' => 'Chief warrent officer'],
            ['service' => 'C', 'code' => 'CWO-4', 'name' => 'Chief warrent officer'],
            ['service' => 'C', 'code' => 'CWO-5', 'name' => 'Chief warrent officer'],
            ['service' => 'C', 'code' => 'ENS', 'name' => 'Ensign'],
            ['service' => 'C', 'code' => 'LCDR', 'name' => 'Lietuenant commander'],
            ['service' => 'C', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'C', 'code' => 'CDR', 'name' => 'Commander'],
            ['service' => 'C', 'code' => 'RADM', 'name' => 'Rear admiral'],
            ['service' => 'C', 'code' => 'RADM L', 'name' => 'Rear admiral (lower half)'],
            ['service' => 'C', 'code' => 'VADM', 'name' => 'Vice admiral'],
            ['service' => 'C', 'code' => 'ADM', 'name' => 'Admiral'],
            ['service' => 'M', 'code' => 'CWO5', 'name' => 'Chief warrent officer'],
            ['service' => 'A', 'code' => '1LT', 'name' => 'First Lieutenant'],
            ['service' => 'A', 'code' => '1SG', 'name' => 'First sergeant'],
            ['service' => 'A', 'code' => '2LT', 'name' => 'Second lieutenant'],
            ['service' => 'A', 'code' => 'BG', 'name' => 'Brigadier General'],
            ['service' => 'A', 'code' => 'CADET', 'name' => 'Cadet'],
            ['service' => 'A', 'code' => 'COL', 'name' => 'Colonel'],
            ['service' => 'A', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'A', 'code' => 'CPT', 'name' => 'Captain'],
            ['service' => 'A', 'code' => 'CSM', 'name' => 'Command sergeant major'],
            ['service' => 'A', 'code' => 'CW2', 'name' => 'Chief warrent officer W-2'],
            ['service' => 'A', 'code' => 'CW3', 'name' => 'Chief warrent officer W-3'],
            ['service' => 'A', 'code' => 'CW4', 'name' => 'Chief warrent officer W-4'],
            ['service' => 'A', 'code' => 'CW5', 'name' => 'Chief warrent officer W-5'],
            ['service' => 'A', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'A', 'code' => 'LTC', 'name' => 'Lieutenant colonel'],
            ['service' => 'A', 'code' => 'LTG', 'name' => 'Lieutenant general'],
            ['service' => 'A', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'A', 'code' => 'MG', 'name' => 'Major General'],
            ['service' => 'A', 'code' => 'MSG', 'name' => 'Master sergeant'],
            ['service' => 'A', 'code' => 'OC', 'name' => 'Officer candidate'],
            ['service' => 'A', 'code' => 'PFC', 'name' => 'Private first class'],
            ['service' => 'A', 'code' => 'PSG', 'name' => 'Platoon sergeant'],
            ['service' => 'A', 'code' => 'PV1', 'name' => 'Private (no insignia)'],
            ['service' => 'A', 'code' => 'PV2', 'name' => 'Private'],
            ['service' => 'A', 'code' => 'PVT', 'name' => 'Private, PV-2'],
            ['service' => 'A', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'A', 'code' => 'SFC', 'name' => 'Sergeant first class'],
            ['service' => 'A', 'code' => 'SGM', 'name' => 'Sergeant major'],
            ['service' => 'A', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'A', 'code' => 'SMA', 'name' => 'Sergeant major of the army'],
            ['service' => 'A', 'code' => 'SP4', 'name' => 'Specialist 4'],
            ['service' => 'A', 'code' => 'SP5', 'name' => 'Specialist 5'],
            ['service' => 'A', 'code' => 'SP6', 'name' => 'Specialist 6'],
            ['service' => 'A', 'code' => 'SPC', 'name' => 'Sepcialist'],
            ['service' => 'A', 'code' => 'SSG', 'name' => 'Staff Sergeant'],
            ['service' => 'A', 'code' => 'WO1', 'name' => 'Warrent Officer'],
            ['service' => 'C', 'code' => 'CPO', 'name' => 'Chief petty officer'],
            ['service' => 'C', 'code' => 'FN', 'name' => 'Fireman'],
            ['service' => 'C', 'code' => 'LT', 'name' => 'Lieutenant'],
            ['service' => 'C', 'code' => 'LTJG', 'name' => 'Lieutenant junior grade'],
            ['service' => 'C', 'code' => 'PO1', 'name' => 'Petty officer first class'],
            ['service' => 'C', 'code' => 'PO2', 'name' => 'Petty officer second class'],
            ['service' => 'F', 'code' => '1STLT', 'name' => 'First Lieutenant'],
            ['service' => 'F', 'code' => '2NDLT', 'name' => 'Second lieutenant'],
            ['service' => 'F', 'code' => 'A1C', 'name' => 'Airman first class'],
            ['service' => 'F', 'code' => 'A2C', 'name' => 'Airman second class'],
            ['service' => 'F', 'code' => 'A3C', 'name' => 'Airman third class'],
            ['service' => 'F', 'code' => 'AB', 'name' => 'Airman basic'],
            ['service' => 'F', 'code' => 'AMN', 'name' => 'Airman'],
            ['service' => 'F', 'code' => 'AOC', 'name' => 'Aviation office candidate'],
            ['service' => 'F', 'code' => 'BGEN', 'name' => 'Brigadier general'],
            ['service' => 'F', 'code' => 'CADET', 'name' => 'Cadet'],
            ['service' => 'F', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'F', 'code' => 'CMSGT', 'name' => 'Chief master sergeant of the air force'],
            ['service' => 'F', 'code' => 'CMSGT', 'name' => 'Chief master sergeant'],
            ['service' => 'F', 'code' => 'COL', 'name' => 'Colonel'],
            ['service' => 'F', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'F', 'code' => 'CWO-2', 'name' => 'Chief warrent officer'],
            ['service' => 'F', 'code' => 'CWO-3', 'name' => 'Chief warrent officer'],
            ['service' => 'F', 'code' => 'CWO-4', 'name' => 'Chief warrent officer'],
            ['service' => 'F', 'code' => 'CWO-5', 'name' => 'Chief warrent officer'],
            ['service' => 'F', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'F', 'code' => 'LTCOL', 'name' => 'Lieutenant colonel'],
            ['service' => 'F', 'code' => 'LTGEN', 'name' => 'Lieutenant general'],
            ['service' => 'F', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'F', 'code' => 'MAJGEN', 'name' => 'Major general'],
            ['service' => 'F', 'code' => 'MSGT', 'name' => 'Master sergeant'],
            ['service' => 'F', 'code' => 'PFC', 'name' => 'Private first class'],
            ['service' => 'F', 'code' => 'PVT', 'name' => 'Private'],
            ['service' => 'F', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'F', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'F', 'code' => 'SMSGT', 'name' => 'Senior master sergeant'],
            ['service' => 'F', 'code' => 'SRA', 'name' => 'Senior airman'],
            ['service' => 'F', 'code' => 'SSGT', 'name' => 'Staff sergeant'],
            ['service' => 'F', 'code' => 'TSGT', 'name' => 'Technical sergeant'],
            ['service' => 'F', 'code' => 'WO', 'name' => 'Warrent officer'],
            ['service' => 'M', 'code' => '1STLT', 'name' => 'First lieutenant'],
            ['service' => 'M', 'code' => '1STSGT', 'name' => 'First sergeant'],
            ['service' => 'M', 'code' => '2NDLT', 'name' => 'Second lieutenant'],
            ['service' => 'M', 'code' => 'BGEN', 'name' => 'Brigadier general'],
            ['service' => 'M', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'M', 'code' => 'COL', 'name' => 'Colonel'],
            ['service' => 'M', 'code' => 'CPL', 'name' => 'Corporal'],
            ['service' => 'M', 'code' => 'CWO2', 'name' => 'Chief warrent officer'],
            ['service' => 'M', 'code' => 'CWO3', 'name' => 'Chief warrent officer'],
            ['service' => 'M', 'code' => 'CWO4', 'name' => 'Chief warrent officer'],
            ['service' => 'M', 'code' => 'GEN', 'name' => 'General'],
            ['service' => 'M', 'code' => 'GYSGT', 'name' => 'Gunnery Sergeant'],
            ['service' => 'M', 'code' => 'LCPL', 'name' => 'Lance corporal'],
            ['service' => 'M', 'code' => 'LTCOL', 'name' => 'Lieutenant colonel'],
            ['service' => 'M', 'code' => 'LTGEN', 'name' => 'Lieutenant general'],
            ['service' => 'M', 'code' => 'MAJ', 'name' => 'Major'],
            ['service' => 'M', 'code' => 'MAJGEN', 'name' => 'Major general'],
            ['service' => 'M', 'code' => 'MGYSGT', 'name' => 'Master Gunnery sergeant'],
            ['service' => 'M', 'code' => 'MSGT', 'name' => 'Master sergeant'],
            ['service' => 'M', 'code' => 'PFC', 'name' => 'Private first class'],
            ['service' => 'M', 'code' => 'PLC', 'name' => 'Platoon leaders class'],
            ['service' => 'M', 'code' => 'PVT', 'name' => 'Private'],
            ['service' => 'M', 'code' => 'SGT', 'name' => 'Sergeant'],
            ['service' => 'M', 'code' => 'SGTMAJ', 'name' => 'Sergeant major'],
            ['service' => 'M', 'code' => 'SMOFMC', 'name' => 'Sergeant major of the marine corps'],
            ['service' => 'M', 'code' => 'SSGT', 'name' => 'Staff Sergeant'],
            ['service' => 'M', 'code' => 'TSGT', 'name' => 'Technical sergeant'],
            ['service' => 'M', 'code' => 'WO', 'name' => 'Warrent officer'],
            ['service' => 'N', 'code' => 'AA', 'name' => 'Airman Apprentice'],
            ['service' => 'N', 'code' => 'ADM', 'name' => 'Admiral'],
            ['service' => 'N', 'code' => 'AN', 'name' => 'Airman'],
            ['service' => 'N', 'code' => 'AR', 'name' => 'Airman recruit'],
            ['service' => 'N', 'code' => 'CA', 'name' => 'onstructionman apprentice'],
            ['service' => 'N', 'code' => 'CAPT', 'name' => 'Captain'],
            ['service' => 'N', 'code' => 'CDR', 'name' => 'Commander'],
            ['service' => 'N', 'code' => 'CN', 'name' => 'Constructionman'],
            ['service' => 'N', 'code' => 'COMO', 'name' => 'Comodore'],
            ['service' => 'N', 'code' => 'CPO', 'name' => 'Chief petty officer'],
            ['service' => 'N', 'code' => 'CR', 'name' => 'Constructionman recruit'],
            ['service' => 'N', 'code' => 'CWO-2', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-3', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-4', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'CWO-5', 'name' => 'Chief warrent officer'],
            ['service' => 'N', 'code' => 'DA', 'name' => 'Dentalman apprentice'],
            ['service' => 'N', 'code' => 'DN', 'name' => 'Dentalman'],
            ['service' => 'N', 'code' => 'DR', 'name' => 'Dentalman recruit'],
            ['service' => 'N', 'code' => 'ENS', 'name' => 'ENSIGN'],
            ['service' => 'N', 'code' => 'FA', 'name' => 'Fireman apprentice'],
            ['service' => 'N', 'code' => 'FN', 'name' => 'Fireman'],
            ['service' => 'N', 'code' => 'FN', 'name' => 'Fireman recruit'],
            ['service' => 'N', 'code' => 'HA', 'name' => 'Hospital corpsman apprentice'],
            ['service' => 'N', 'code' => 'HN', 'name' => 'Hospital corpsman'],
            ['service' => 'N', 'code' => 'HR', 'name' => 'Hospitalman recruit'],
            ['service' => 'N', 'code' => 'LCDR', 'name' => 'Lieutenant commander'],
            ['service' => 'N', 'code' => 'LT', 'name' => 'Lieutenant'],
            ['service' => 'N', 'code' => 'LTJG', 'name' => 'Lieutenant junior grade'],
            ['service' => 'N', 'code' => 'MCPO', 'name' => 'Master chief petty officer'],
            ['service' => 'N', 'code' => 'MCPON', 'name' => 'Master chief officer of the navy'],
            ['service' => 'N', 'code' => 'MIDSHP', 'name' => 'Midshipman'],
            ['service' => 'N', 'code' => 'OC', 'name' => 'Officer candidate'],
            ['service' => 'N', 'code' => 'OOP', 'name' => 'Officer programs'],
            ['service' => 'N', 'code' => 'PO1', 'name' => 'Petty officer first class'],
            ['service' => 'N', 'code' => 'PO2', 'name' => 'Petty officer second class'],
            ['service' => 'N', 'code' => 'PO3', 'name' => 'Petty officer third class'],
            ['service' => 'N', 'code' => 'RADM', 'name' => 'Rear admiral'],
            ['service' => 'N', 'code' => 'RADM L', 'name' => 'Rear admiral (lower half)'],
            ['service' => 'N', 'code' => 'ROTC', 'name' => 'Reserve officer training corps'],
            ['service' => 'N', 'code' => 'SA', 'name' => 'Seaman apprentice'],
            ['service' => 'N', 'code' => 'SCPO', 'name' => 'Senior chief petty officer'],
            ['service' => 'N', 'code' => 'SN', 'name' => 'Seaman'],
            ['service' => 'N', 'code' => 'SR', 'name' => 'Seaman recruit'],
            ['service' => 'N', 'code' => 'VADM', 'name' => 'Vice admiral'],
            ['service' => 'N', 'code' => 'WO-1', 'name' => 'Warrent officer']
        ];

        $table = DB::table('ranks');
        $table->delete();
        $table->insert($data);

        foreach (Services::all() as $service) { // Loop through the services
            Ranks::where('service', $service->code)->update(['service' => $service->id]);
        }

        Schema::table('ranks', function (Blueprint $table) {
            $table->integer('service')->change();
        });
    }
}