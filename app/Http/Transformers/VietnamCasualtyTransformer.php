<?php

namespace App\Http\Transformers;

use App\VietnamCasualties;
use League\Fractal\TransformerAbstract;

/**
 * Class VietnamCasualtyTransformer
 *
 * @package App\Http\Transformers
 */
class VietnamCasualtyTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(VietnamCasualties $casualty)
    {
        return [
            'conflict'              => $casualty->wc,
            'service_number'        => $casualty->service_no,
            'process_date'          => date('Y/m/d', strtotime($casualty->process_dt)),
            'closure_date'          => date('Y/m/d', strtotime($casualty->close_dt)),
            'member_name'           => $casualty->member_name,
            'birth_date'            => date('Y/m/d', strtotime($casualty->birth_date)),
            'death_date'            => date('Y/m/d', strtotime($casualty->death_dt)),
            'death_year'            => $casualty->year,
            'gender'                => $casualty->g,
            'marital_status'        => $casualty->marital_status,
            'wall'                  => $casualty->wall,
            'religion'              => [
                'code' => $casualty->l,
                'name' => $casualty->religion_name
            ],
            'race'                  => [
                'name' => $casualty->name,
                'omb'  => $casualty->race_omb,
            ],
            'ethnic'                => [
                'short_name' => $casualty->short_name,
                'group_name' => $casualty->ethnic_group_name,
            ],
            'military_rank'         => $casualty->rank_rate,
            'unit_name'             => $casualty->unit_name,
            'duty_code'             => $casualty->d,
            'paygrade'              => $casualty->pg,
            'component_code'        => $casualty->c,
            'person_type_name_code' => $casualty->ptp,
            'service'               => [
                'code' => $casualty->s,
                'name' => $casualty->service_name,
            ],
            'occupation'            => [
                'code' => $casualty->occ,
                'name' => $casualty->occupation_name
            ],
            'home_of_record'        => [
                'city'   => $casualty->hor_city,
                'county' => $casualty->hor_county,
                'state'  => [
                    'code'     => $casualty->hor_st,
                    'name'     => $casualty->state_prv_nm,
                ],
                'country'  => $casualty->hor_cntry,
            ],
            'casualty_data'             => [
                'type_name'             => $casualty->casualty_type_name,
                'category'              => $casualty->category,
                'category_short_name'   => $casualty->csn,
                'reason'                => $casualty->casualty_reason_name,
                'circumstances'         => $casualty->cas_circumstances,
                'city'                  => $casualty->cas_city,
                'state_or_province'     => $casualty->cas_st,
                'region'                => $casualty->region_code,
                'country'               => [
                    'code' => $casualty->ctry,
                    'name' => $casualty->country_or_water_name,
                ],
                'closure_name'          => $casualty->closure_name,
            ],
            'location'              => [
                'oitp'          => $casualty->oitp,
                'oi_name'       => $casualty->oi_name,
                'oi_location'   => $casualty->oi_location,
            ],
            'aircraft'              => $casualty->aircraft,
            'hostile_death'         => $casualty->h,
            'body_recovered'        => $casualty->body,
            'incident'                  => [
                'status_date'   => date('Y/m/d', strtotime($casualty->i_status_dt)),
                'short_name'    => $casualty->i_csn,
                'hostile'       => $casualty->i_h,
                'aircraft-type' => $casualty->i_aircraft
            ]
        ];
    }
}