<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\KoreanCasualties;
use Illuminate\Support\Facades\DB;

/**
 * Class KoreanCasualtyRepository
 *
 * @package App\Repositories
 */
class KoreanCasualtyRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return KoreanCasualties::class;
    }

    /**
     * Import the data in the database table.
     *
     * @param  string $file     The file url or file name.
     * @param  string $dbTable  The database table name.
     * @return void
     */
    public function importData($file, $dbTable)
    {
        $query = "
            LOAD DATA LOCAL INFILE '{$file}'
                        INTO TABLE {$dbTable}  
              FIELDS TERMINATED BY '|'
                                    (service_no, c, ptp, @person_type_name, member_name, 
                                    s, service_name, rank_rate, pg, occ, occupation_name,
                                    birth_date, g, hor_city, hor_county, hor_cntry, 
                                    hor_st, state_prv_nm, marital_status, religion_name, 
                                    l, race_name, ethnic_name, race_omb, ethnic_group_name, 
                                    cas_circumstances, cas_city, cas_st, cas_ctry, cas_region_code,
                                    country_or_water_name, unit_name, d, process_dt, death_dt,
                                    year, wc, oitp, oi_name, oi_location, close_dt, aircraft, 
                                    h, casualty_type_name, casualty_category, casualty_reason_name, 
                                    csn, body, casualty_closure_name, wall, incident_category,
                                    i_status_dt, i_csn, i_h, i_aircraft, @created_at, @updated_at)
                                SET created_at=NOW(), updated_at=null, person_type_name=LOWER(person_type_name)";

        DB::connection()->getpdo()->exec($query);
    }
}