<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\VietnamCasualties;
use Illuminate\Support\Facades\DB;

/**
 * Class VietnamCasualtyRepository
 *
 * @package App\Repositories
 */
class VietnamCasualtyRepository extends Repository
{

    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return VietnamCasualties::class;
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

    /**
     * Clean he NARA dataset up.
     *
     * @param  string $dbTable The database column for the casualties.
     * @return void
     */
    public function cleanUp($dbTable)
    {

        DB::statement("UPDATE {$dbTable} SET person_type_name          = LOWER(person_type_name)");
        DB::statement("UPDATE {$dbTable} SET member_name               = LOWER(member_name)");
        DB::statement("UPDATE {$dbTable} SET service_name              = LOWER(service_name)");
        DB::statement("UPDATE {$dbTable} SET occupation_name           = LOWER(occupation_name)");
        DB::statement("UPDATE {$dbTable} SET hor_city                  = LOWER(hor_city)");
        DB::statement("UPDATE {$dbTable} SET hor_county                = LOWER(hor_county)");
        DB::statement("UPDATE {$dbTable} SET state_prv_nm              = LOWER(state_prv_nm)");
        DB::statement("UPDATE {$dbTable} SET marital_status            = LOWER(marital_status)");
        DB::statement("UPDATE {$dbTable} SET race_name                 = LOWER(race_name)");
        DB::statement("UPDATE {$dbTable} SET ethnic_name               = LOWER(ethnic_name)");
        DB::statement("UPDATE {$dbTable} SET race_omb                  = LOWER(race_omb)");
        DB::statement("UPDATE {$dbTable} SET cas_region_code           = LOWER(cas_region_code)");
        DB::statement("UPDATE {$dbTable} SET country_or_water_name     = LOWER(country_or_water_name)");
        DB::statement("UPDATE {$dbTable} SET oi_name                   = LOWER(oi_name)");
        DB::statement("UPDATE {$dbTable} SET oi_location               = LOWER(oi_location)");
        DB::statement("UPDATE {$dbTable} SET casualty_type_name        = LOWER(casualty_type_name)");
        DB::statement("UPDATE {$dbTable} SET casualty_category         = LOWER(casualty_category)");
        DB::statement("UPDATE {$dbTable} SET casualty_closure_name     = LOWER(casualty_closure_name)");
        DB::statement("UPDATE {$dbTable} SET Incident_category         = LOWER(Incident_category)");

        // DB::statement("UPDATE {$dbTable} SET birth_date                = DATE_FORMAT(birth_date, \"%m/%e/%Y\")");
        // DB::statement("UPDATE {$dbTable} SET process_dt                = DATE_FORMAT(process_dt, \"%m/%e/%Y\")");
        // DB::statement("UPDATE {$dbTable} SET death_dt                  = DATE_FORMAT(death_dt, \"%m/%e/%Y\")");
        // DB::statement("UPDATE {$dbTable} SET close_dt                  = DATE_FORMAT(close_dt, \"%m/%e/%Y\")");
        // DB::statement("UPDATE {$dbTable} SET i_status_dt               = DATE_FORMAT(i_status_dt, \"%m/%e/%Y\")");
    }

    /**
     * Return an eloquent model entity.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function entity()
    {
        return $this->model;
    }
}