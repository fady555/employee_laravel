<?php

namespace App\Http\Controllers\ControllerApiHr;

use App\Address;
use App\AllTypeSalary;
use App\Contract;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use App\Rules\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeControllerApi extends Controller
{

    public function index()
    {
        $employee = Employee::with([
            'jop',
            'addresses.country',
            'addresses.city',
            'salary',
            'degree',
            'education',
            'levelExperience',
            'contract.type_of_work',
            'user',
        ])->paginate(5);

        $content = array(
            'success'=>true,
            'data'=>$employee,
            'message'=>trans('app.show employees'),
        );

        return response($content)->setStatusCode(200);
    }


    public function store(Request $request,$lang = "en")
    {

        app('translator')->setLocale($lang);

        $rules=[
            // THE FIREST ONE SECTION //personal information
            'full_name_en'=>['required','string','max:255'],
            'full_name_ar'=>['required','string',new Arabic(),'max:255'],
            'full_name_fr'=>['required','string','max:255'],
            'age'=>['required','numeric','max:100'],
            'email'=>['required','email','unique:employees,email'],
            'phone'=>['required',new Phone,'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'personal_identity_id'=>['required','digits_between:1,14','unique:employees,personal_identity_id'],
            'personal_identity_img'=>['file','mimes:jpeg,png,jpg,docx,pdf'],
            'avatar'=>['file','mimes:jpeg,png,jpg,docx,pdf'],
            'name_of_bank'=>['max:255'],
            'number_of_account'=>['nullable','numeric'],
            'number_of_wif_husband'=>['nullable','integer','between:0,4'],
            'number_of_wif_children'=>['nullable','integer','between:0,15'],
            // THE SECOND TWO SECTION jop
            'jop_id'=>['required','numeric','exists:jops,id'],
            'type_id'=>['required','numeric','exists:type_of_works,id'],
            'data_of_start_work'=>['required','string'],
            'time_of_attendees'=>['required','string'],
            'time_of_going'=>['required','string'],
            'contract'=>['file','mimes:jpeg,png,jpg,docx,pdf'],
            'fixed_salary'=>['numeric'],
            // THE THIREd three SECTION qalification
            'education_status_id'=>['required','exists:education_statuses,id'],
            'degree_id'=>['required','exists:degrees,id'],
            'level_experience_id'=>['required','exists:level_experiences,id'],
            'experience_description'=>['required'],
            // THE THIREd for  SECTION Address
            'country_id'=>['required','numeric','exists:countries,id'],
            'city_id'=>['nullable','numeric','exists:cities,id'],
            'address_desc_en'=>['required','string'],
            'address_desc_ar'=>['required','string',new Arabic()],
            'address_desc_fr'=>['string'],
            // THE five  SECTION user
            'username'=>['required','unique:users,username'],
            'password'=>['required','digits_between:8,255'],
            'premisess'=>['array'],
            'premisess.*'=>['required','exists:premisess,id'],

        ];


        $result = validator($request->all(),$rules);

        if($result->fails()):

            $content = array(
                'success' => false,
                'data' => $result->messages(),
                'message' => trans('app.input data have an error message'),
            );
            return response($content)->setStatusCode(401);

        endif;



        //create address and return id

        $address_table_id = Address::insertGetId([
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address_desc_en'=>$request->address_desc_en,
            'address_desc_ar'=>$request->address_desc_ar,
            'address_desc_fr'=>$request->address_desc_fr,
        ]);

        $contract_table_id = Contract::insertGetId([
            'type_id'=>$request->type_id,
            //'contract_file'=> $request->file('contract_file')->store('public/contract'),
        ]);

        $salary_table_id = AllTypeSalary::insertGetId([
            'fixed_salary'=>$request->fixed_salary,
        ]);







        //create employee and return id

        $emp = [
            'full_name_en'=>$request->full_name_en,
            'full_name_ar'=>$request->full_name_ar,
            'full_name_fr'=>$request->full_name_fr,
            'age'=>$request->age,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'personal_identity_id'=>$request->personal_identity_id,
            'name_of_bank'=>$request->name_of_bank,
            'number_of_account'=>$request->number_of_account,
            'number_of_wif_husband'=>$request->number_of_wif_husband,
            'number_of_wif_children'=>$request->number_of_wif_children,
            'jop_id'=>$request->jop_id,
            'data_of_start_work'=>date( "Y-m-d", strtotime($request->data_of_start_work)),
            'time_of_attendees'=>date('h:m',strtotime($request->time_of_attendees)),
            'time_of_going'=>date('h:m',strtotime($request->time_of_going)),

            'contract_id'=>$contract_table_id,

            'salary_id'=>$salary_table_id,

            'education_status_id'=>$request->education_status_id,
            'degree_id'=>$request->degree_id,
            'level_experience_id'=>$request->level_experience_id,
            'experience_description'=>$request->experience_description,
            'address_id'=>$address_table_id,
            'number_of_day_vacancy_taken'=>0,
        ];

        $employee_tabel_id =Employee::insertGetId($emp);

        //create user

        $data_user = [
            'username'=>$request->username,
            'employee_id'=>$employee_tabel_id,
            'password'=>Hash::make($request->password),
            //'premisses'=>json_encode($request->premisess),
        ];
        if(!empty($request->premisess)){$data_user['premisses'] = json_encode($request->premisess);}

        $userId = User::insertGetId($data_user);

        //return $user;

        if($userId){

            $contract = Contract::find($contract_table_id);
            if($request->file('contract_file') == null){
                $file_contract="";
            }else{
                $file_contract = $request->file('contract_file')->store('public/contract');
            }

            $contract->update(array(
                'contract_file'=>str_replace('public','storage',$file_contract),
            ));

            //=================================================

            $employee = Employee::find($employee_tabel_id);

            if($request->file('personal_identity_img') == null){ $file_personal_img = ""; }else{ $file_personal_img = $request->file('personal_identity_img')->store('public/personal_identity_img');}
            if($request->file('avatar') == null){ $file_avatar = ""; }else{ $file_avatar = $request->file('avatar')->store('public/avatar_employee');}

            $employee->update(array(
                'personal_identity_img'=>str_replace('public','storage',$file_personal_img),
                'avatar'=>str_replace('public','storage',$file_avatar),
            ));

            //return $userId;

            $employeeToUseMessage = Employee::find($employee_tabel_id);




            //return $employeeToUseMessage;

            $content = array(
                'success' => true,
                'data' => $employeeToUseMessage,
                'message' => trans('app.fdfdf'),
            );
            return response($content)->setStatusCode(200);


        }

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
