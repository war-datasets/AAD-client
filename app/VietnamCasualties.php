<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * An eloquent database model 'Vietnam Casualties'
 *
 * @property integer        $id                     The primary key in the storage.
 * @property string         $service_no             Military service number
 * @property string         $c                      Member Component Code
 * @property string         $ptp                    Person Type Name Code
 * @property string         $person_type_name       Person Type name
 * @property string         $member_name            The name for the victim
 * @property string         $s                      Victim service code
 * @property string         $service_name           The name from the victim
 * @property string         $rank_rate              Member rank or rate.
 * @property string         $pg                     Paygrade from the victim
 * @property string         $occ                    Occupation Code
 * @property string         $occupation_name        Occupation name
 * @property string         $birth_date             The brith date from the victim
 * @property string         $g                      The gender from the victim
 * @property string         $hor_city               Home of record city
 * @property string         $hor_county             Home of record county
 * @property string         $hor_cntry              Home of record country code
 * @property string         $hor_st                 Home of record State or province code
 * @property string         $state_prv_nm           State or Province name
 * @property string         $marital_status         Marital status
 * @property string         $religion_name          Religion short code
 * @property string         $l                      Religion code
 * @property string         $race_name              Race name
 * @property string         $ethnic_name            Ethnic short name
 * @property string         $race_omb               Race OMB name
 * @property string         $ethnic_group_name      Ethnic group name
 * @property string         $cas_circumstances      Casualty circumstances
 * @property string         $cas_city               Casualty city
 * @property string         $cas_st                 Casualty state or province code
 * @property string         $cas_ctry               Casualty countr/over water code
 * @property string         $cas_region_code        Casualty region code
 * @property string         $country_or_water_name  Country/over water name
 * @property string         $unit_name              The name fro mthe victim his unit
 * @property string         $d                      Victim's duty code
 * @property string         $process_date           Process date from the record
 * @property string         $death_dt               Incident or death name
 * @property string         $year                   Year of death
 * @property string         $wc                     War or conflict code
 * @property string         $oitp                   Operation Incident Type Code
 * @property string         $oi_name                Operation/incident name
 * @property string         $oi_location            Operation or Incident location
 * @property string         $close_dt               Closure date
 * @property string         $aircraft               Aircraft type from the casualty
 * @property string         $h                      Hostile or Non-Hostile Death Indicator
 * @property string         $casualty_type_name     Casualty type name
 * @property string         $casualty_category      Casualty category nae
 * @property string         $casualty_reason_name   Incident Casualty reason name
 * @property string         $csn                    Casualty category short name
 * @property string         $body                   Remains recovered.
 * @property string         $casualty_closure_name  Casualty closure name
 * @property string         $wall                   Vietnam row and panel Indicator.
 * @property string         $incident_category      Casualty category name
 * @property string         $i_status_dt            Incident casualty category date
 * @property string         $i_csn                  Incident casualty category short name
 * @property string         $i_h                    Incident Hostile or non-hostile death
 * @property string         $i_aircraft             Incident aircraft type
 * @property \Carbon\Carbon $created_at             The timestamp for when the record was inserted
 * @property \Carbon\Carbon $updated_at             The timestamp for when the record was last updated.
 */
class VietnamCasualties extends Model
{
    //
}
