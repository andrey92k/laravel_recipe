<?php

namespace App\Services;


use App\Models\Ingredient;
use App\Repositories\RecipeRepository;
use Illuminate\Support\Str;

class EditService
{

    /**
     * @var StaffRepository
     */
    private $staffRepository;

    /**
     * ImportService constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param $xml
     */
    public function parseXML($xml)
    {
        foreach ($xml as $key => $value) {
            $staff = (array)$value;
            $staff['department_id'] = Department::firstOrCreate(
                [
                    'title' => $value->department,
                    'slug' => Str::slug($value->department, '-')
                ]
            )->id;
            if($staff['rate'] == '-'){
                $staff['rate'] = 0;
                $staff['payment'] = $staff['payment'] * $staff['clock'];
            }else{
                $staff['rate'] = 1;
            }

            $this->staffRepository->createOrUpdate($staff);
        }
    }
}