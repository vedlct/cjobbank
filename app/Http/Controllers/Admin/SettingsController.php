<?php

namespace App\Http\Controllers\Admin;

use App\Aggrementqus;
use App\Board;
use App\Degree;
use App\Designation;
use App\Education;
use App\Educationlevel;
use App\Educationmajor;
use App\Ethnicity;
use App\LanguageHead;
use App\Nationality;

use App\OtherSkillInformation;
use App\QuestionObjective;
use App\QuestionObjectiveAndInfo;
use App\Religion;

use App\OrganizationType;

use App\TermsAndConditions;
use App\TypeOfEmployment;
use App\Zone;
use App\email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                if(Auth::user()->fkuserTypeId==USER_TYPE['Admin'] || Auth::user()->fkuserTypeId==USER_TYPE['Emp'] ){

                    return $next($request);

                }else{

                    return redirect('/');
                }

            }else{

                return redirect('/');
            }
        });
    }

    /*---------------------- Zone -----------------*/
    public function zone(){
        $zones=Zone::get();

        return view('manage.zone',compact('zones'));
    }

    public function insertZone(Request $r){
        $r->validate([
            'zone' => 'required|max:15|unique:zone,zoneName',

        ]);
        $zone=new Zone();
        $zone->zoneName=$r->zone;

        if ($r->status ==""){
            $zone->status='1';
        }else{
            $zone->status=$r->status;
        }

        $zone->save();

        Session::flash('message', 'Zone Added Successfully!');
        return back();
    }

    public function editZone(Request $r){
        $zone=Zone::findOrFail($r->id);

        return view('manage.editZone',compact('zone'));
    }
    public function updateZone($id,Request $r){
        $zone=Zone::findOrFail($r->id);
        $zone->zoneName=$r->zone;
        if ($r->status ==""){
            $zone->status='1';
        }else{
            $zone->status=$r->status;
        }
        $zone->save();
        Session::flash('message', 'Zone Updated Successfully!');
        return redirect()->route('manage.zone');
    }


    /*---------------------- Language -----------------*/
    public function language(){
        $languages=LanguageHead::get();

        return view('manage.language',compact('languages'));
    }

    public function insertLanguage(Request $r){
        $r->validate([
            'language' => 'required|max:25|unique:languagehead,languagename',

        ]);
        $language=new LanguageHead();
        $language->languagename=$r->language;

        if ($r->status ==""){
            $language->status='1';
        }else{
            $language->status=$r->status;
        }

        $language->save();

        Session::flash('message', 'Language Added Successfully!');
        return back();
    }

    public function editLanguage(Request $r){
        $language=LanguageHead::findOrFail($r->id);

        return view('manage.editLanguage',compact('language'));
    }
    public function updateLanguage($id,Request $r){
        $language=LanguageHead::findOrFail($r->id);
        $language->languagename=$r->language;
        if ($r->status ==""){
            $language->status='1';
        }else{
            $language->status=$r->status;
        }
        $language->save();
        Session::flash('message', 'Language Updated Successfully!');
        return redirect()->route('manage.language');
    }

    /*---------------------- Education -----------------*/

    public function education(){
        $educations=Educationlevel::get();

        return view('manage.education',compact('educations'));
    }

    public function insertEducation(Request $r){
        $r->validate([
            'education' => 'required|max:128|unique:educationlevel,educationLevelName',

        ]);
        $education=new Educationlevel();
        $education->educationLevelName=$r->education;
        $education->eduLvlUnder=$r->eduLvlUnder;

        $education->save();

        Session::flash('message', 'Education Updated Successfully!');
        return redirect()->route('manage.education');
    }
    public function editEducation(Request $r){
        $education=Educationlevel::findOrFail($r->id);

        return view('manage.editEducation',compact('education'));
    }
    public function updateEducation($id,Request $r){
        $r->validate([
            'education' => 'required|max:128|unique:educationlevel,educationLevelName,'.$id.',educationLevelId',
        ]);

        $education=Educationlevel::findOrFail($id);
        $education->educationLevelName=$r->education;
        $education->eduLvlUnder=$r->eduLvlUnder;
        $education->status = $r->status;
        $education->save();

        Session::flash('message', 'Education Updated Successfully!');
        return redirect()->route('manage.education');
    }

    /*====================== Education Degree ============================*/

    public function educationDegree(){
        $degree=Degree::select('educationlevel.educationLevelName','degree.degreeName','degree.degreeId','degree.status')->leftJoin('educationlevel','educationlevel.educationLevelId','degree.educationLevelId')->get();
        $educations=Educationlevel::where('status','!=',0)->get();
//        $datatables = DataTables::of($degree);
//
//        return $datatables->make(true);
//        return $degree;

        return view('manage.educationDegree',compact('degree','educations'));
    }

    public function insertEducationDegree(Request $r){
        $r->validate([
            'educationLevel' => 'required',
            'degree' => 'required|max:255',

        ]);
        $degree =new Degree();
        $degree->degreeName=$r->degree;
        $degree->educationLevelId=$r->educationLevel;

        if ($r->status ==""){
            $degree->status='1';
        }else{
            $degree->status=$r->status;
        }

        $degree->save();

        Session::flash('message', 'Degree Added Successfully!');
        return redirect()->route('manage.educationDegree');

    }

    public function editEducationDegree(Request $r){
        $degree=Degree::findOrFail($r->id);
        $educations=Educationlevel::get();

        return view('manage.editDegree',compact('degree','educations'));
    }

    public function updateDegree($id,Request $r){
        $degree =Degree::findOrFail($id);
        $degree->degreeName=$r->degree;
        $degree->educationLevelId=$r->educationLevel;

        if ($r->status ==""){
            $degree->status='1';
        }else{
            $degree->status=$r->status;
        }

        $degree->save();

        Session::flash('message', 'Degree Updated Successfully!');
        return redirect()->route('manage.educationDegree');

    }

    /*====================== Nationality ============================*/

    public function nationality(){

        $nationality=Nationality::get();

        return view('manage.nationality',compact('nationality'));
    }


    public function insertNationality(Request $r){
        $r->validate([
            'nationality' => 'required',
            'country' => 'required',

        ]);
        $nationality =new Nationality();
        $nationality->nationalityName=$r->nationality;
        $nationality->countryName=$r->country;
        $nationality->save();

        Session::flash('message', 'Nationality Added Successfully!');
        return redirect()->route('manage.nationality');

    }



    public function editNationality(Request $r){
        $editNationality=Nationality::findOrFail($r->id);
        return view('manage.editNationality',compact('editNationality'));
    }


    public function updateNationality($id,Request $r){
        $nationality =Nationality::findOrFail($id);
        $nationality->nationalityName=$r->nationality;
        $nationality->countryName=$r->country;
        $nationality->status = $r->status;
        $nationality->save();

        Session::flash('message', 'Nationality Updated Successfully!');
        return redirect()->route('manage.nationality');

    }




    /*====================== Religion ============================*/

    public function religion(){

        $religion=Religion::get();
        return view('manage.religion',compact('religion'));
    }

    public function insertReligion(Request $r){
        $r->validate([
            'religionName' => 'required',

        ]);
        $religion =new Religion();
        $religion->religionName=$r->religionName;
        $religion->save();

        Session::flash('message', 'Religion Added Successfully!');
        return redirect()->route('manage.religion');

    }

    public function editReligion(Request $r){
        $editReligion=Religion::findOrFail($r->id);
        return view('manage.editReligion',compact('editReligion'));
    }

    public function updateReligion($id,Request $r){
        $nationality =Religion::findOrFail($id);
        $nationality->religionName=$r->religionName;
        $nationality->status = $r->status;
        $nationality->save();

        Session::flash('message', 'Religion Updated Successfully!');
        return redirect()->route('manage.religion');

    }

    /* ================== Ethnicity =====================*/
    public function manageEthnicity(){

        $ethnicity=Ethnicity::get();

        return view('manage.ethnicity',compact('ethnicity'));
    }


    public function insertEthnicity(Request $r){

        $r->validate([
            'ethnicityName' => 'required|max:50',


        ]);

        $ethnicity =new Ethnicity();

        $ethnicity->ethnicityName=$r->ethnicityName;

        if ($r->status ==""){
            $ethnicity->status='1';
        }else{
            $ethnicity->status=$r->status;
        }

        $ethnicity->save();

        Session::flash('message', 'Ethnicity Added Successfully!');
        return redirect()->route('manage.ethnicity');

    }

    public function editEthnicity(Request $r){
        $editEthnicity=Ethnicity::findOrFail($r->id);
        return view('manage.editEthnicity',compact('editEthnicity'));
    }


    public function updateEthnicity($id,Request $r){

        $r->validate([
            'ethnicityName' => 'required|max:50|unique:ethnicity,ethnicityName,'.$id.',ethnicityId',

        ]);

        $ethnicity =Ethnicity::findOrFail($id);

        $ethnicity->ethnicityName=$r->ethnicityName;
        if ($r->status ==""){
            $ethnicity->status='1';
        }else{
            $ethnicity->status=$r->status;
        }

        $ethnicity->save();

        Session::flash('message', 'Ethnicity Updated Successfully!');
        return redirect()->route('manage.ethnicity');

    }


    /* ================ organization Type ================= */
    public function manageorganizationType(){

        $organizationType=DB::table('organizationtype')->get();

        return view('manage.organizationType',compact('organizationType'));
    }

    public function insertorganizationType(Request $r){

        $r->validate([
            'typeName' => 'required|max:50',

        ]);

        $organizationType =new OrganizationType();
        $organizationType->organizationTypeName=$r->typeName;

        if ($r->status ==""){
            $organizationType->status='1';
        }else{
            $organizationType->status=$r->status;
        }


        $organizationType->save();

        Session::flash('message', 'Organization Type Added Successfully!');
        return redirect()->route('manage.organizationType');

    }

    public function editOrganizationType(Request $r){
        $organizationType=OrganizationType::findOrFail($r->id);
        return view('manage.editOrganizationType',compact('organizationType'));
    }

    public function updateOrganizationType($id,Request $r){

        $r->validate([
            'typeName' => 'required|max:50|unique:organizationtype,organizationTypeName,'.$id.',organizationTypeId',

        ]);

        $orgType =OrganizationType::findOrFail($id);

        $orgType->organizationTypeName=$r->typeName;

        if ($r->status ==""){
            $orgType->status='1';
        }else{
            $orgType->status=$r->status;
        }

        $orgType->save();

        Session::flash('message', 'Organization Type Updated Successfully!');
        return redirect()->route('manage.organizationType');

    }


    /*====================== Agreement Question ============================*/

    public function agreement(){

        $agreement=Aggrementqus::get();
        $lastserialnumber = Aggrementqus::select('serial')
            ->orderBy('serial', 'DESC')
            ->first();
        return view('manage.agreement',compact('agreement', 'lastserialnumber'));
    }

    public function insertAgreement(Request $r){
        $r->validate([
            'qus' => 'required',
            'serial' => 'required|unique:agreementqus,serial',

        ]);
        $agreement =new Aggrementqus();
        $agreement->qus=$r->qus;
        $agreement->serial=$r->serial;
        $agreement->save();

        Session::flash('message', 'Agreement Question Added Successfully!');
        return redirect()->route('manage.agreement');

    }


    public function editAgreement(Request $r){
        $editAgreement=Aggrementqus::findOrFail($r->id);
        $lastserialnumber = Aggrementqus::select('serial')
            ->orderBy('serial', 'DESC')
            ->first();
        return view('manage.editAgreement',compact('editAgreement', 'lastserialnumber'));
    }


    public function updateAgreement($id,Request $r){

        $r->validate([
            'qus' => 'required',
            'serial' => 'required|unique:agreementqus,serial,'.$id.',agreementQusId',

        ]);
        $agreement =Aggrementqus::findOrFail($id);
        $agreement->qus=$r->qus;
        $agreement->serial=$r->serial;
        $agreement->status = $r->status;
        $agreement->save();

        Session::flash('message', 'Agreement Updated Successfully!');
        return redirect()->route('manage.agreement');

    }



    /*====================== Degisnation ============================*/

    public function degisnation(){

        $degisnation=Designation::get();

        return view('manage.degisnation',compact('degisnation'));
    }

    public function insertDegisnation(Request $r){
        $r->validate([
            'designationName' => 'required',

        ]);
        $degisnation =new Designation();

        $degisnation->designationName=$r->designationName;

        if ($r->status ==""){
            $degisnation->status='1';
        }else{
            $degisnation->status=$r->status;
        }

        $degisnation->save();

        Session::flash('message', 'Degisnation Added Successfully!');
        return redirect()->route('manage.degisnation');

    }

    public function editDegisnation(Request $r){
        $editDesignation=Designation::findOrFail($r->id);
        return view('manage.editDegisnation',compact('editDesignation'));
    }

    public function updateDesignation($id,Request $r){
        $nationality =Designation::findOrFail($id);
        $nationality->designationName=$r->designationName;

        if ($r->status ==""){
            $nationality->status='1';
        }else{
            $nationality->status=$r->status;
        }

       // $nationality->status = $r->status;
        $nationality->save();

        Session::flash('message', 'Designation Updated Successfully!');
        return redirect()->route('manage.degisnation');

    }

    /*====================== Major ============================*/

    public function major(){

        $major=Educationmajor::select('educationmajor.educationMajorName','degree.degreeName','educationmajor.educationMajorId','educationmajor.status')
            ->leftjoin('degree','degree.degreeId','educationmajor.fkDegreeId')
            ->orderBy('educationmajor.educationMajorName')
            ->get();
        $degree = Degree::where('status','!=',0)->get();
        return view('manage.major',compact('major', 'degree'));
    }

    public function insertMajor(Request $r){
        $r->validate([
            'major' => 'required',

        ]);
        $major =new Educationmajor();
        $major->educationMajorName=$r->major;
        $major->fkDegreeId=$r->degree;
        $major->save();

        Session::flash('message', 'Major Added Successfully!');
        return redirect()->route('manage.major');

    }

    public function editMajor(Request $r){
        $editMajor=Educationmajor::findOrFail($r->id);
        $degree = Degree::where('status','!=',0)->get();
        return view('manage.editMajor',compact('editMajor','degree'));
    }

    public function updateMajor($id,Request $r){
        $major =Educationmajor::findOrFail($id);
        $major->educationMajorName=$r->major;
        $major->fkDegreeId=$r->degree;
        $major->status = $r->status;
        $major->save();

        Session::flash('message', 'Major Updated Successfully!');
        return redirect()->route('manage.major');

    }

    /*====================== Board ============================*/

    public function board(){

        $board=Board::get();
        return view('manage.board',compact('board'));
    }

    public function insertBoard(Request $r){
        $r->validate([
            'board' => 'required',

        ]);
        $board =new Board();
        $board->boardName=$r->board;
        $board->save();

        Session::flash('message', 'Board Added Successfully!');
        return redirect()->route('manage.board');

    }

    public function editBoard(Request $r){
        $editBoard=Board::findOrFail($r->id);
        return view('manage.editBoard',compact('editBoard'));
    }

    public function updateBoard($id,Request $r){
        $board =Board::findOrFail($id);
        $board->boardName=$r->board;
        $board->status = $r->status;
        $board->save();

        Session::flash('message', 'Board Updated Successfully!');
        return redirect()->route('manage.board');

    }


    /*========================Other Skill ============================= */
    public function otherSkill(){
        $otherSkill=OtherSkillInformation::get();
        return view('manage.otherSkill',compact('otherSkill'));
    }

    public function insertOtherSkill(Request $r){
        $r->validate([
            'skillName' => 'required|max:255',
        ]);
        $skill =new OtherSkillInformation();

        $skill->skillName=$r->skillName;

        if ($r->status ==""){
            $skill->status='1';
        }else{
            $skill->status=$r->status;
        }

        $skill->save();

        Session::flash('message', 'Skill Added Successfully!');
        return redirect()->route('manage.otherSkill');
    }

    public function editOtherSkill(Request $r){
        $skill=OtherSkillInformation::findOrFail($r->id);

        return view('manage.editSkill',compact('skill'));
    }
    public function updateOtherSkill($id,Request $r){
        $r->validate([
            'skillName' => 'required|max:255',
        ]);
        $skill=OtherSkillInformation::findOrFail($id);
        $skill->skillName=$r->skillName;

        if ($r->status ==""){
            $skill->status='1';
        }else{
            $skill->status=$r->status;
        }

        $skill->save();
        Session::flash('message', 'Skill Updated Successfully!');
        return redirect()->route('manage.otherSkill');

    }
    /* careerObjectiveAndApplicationInformation */

    public function careerObjectiveAndApplicationInformation(){


        $questionObj=QuestionObjectiveAndInfo::get();
        $lastserialnumber = QuestionObjectiveAndInfo::select('serial')
            ->orderBy('serial', 'DESC')
            ->first();

       
        return view('manage.careerObjectiveAndApplication',compact('questionObj','lastserialnumber'));
    }


    public function insertobjectivePageQuestion(Request $r){
        $r->validate([
            'qus' => 'required',
            'serial' => 'required|unique:emp_ques_objective_and_info,serial',

        ]);
        $agreement =new QuestionObjectiveAndInfo();
        $agreement->ques=$r->qus;
        $agreement->serial=$r->serial;
        $agreement->save();

        Session::flash('message', 'Question Added Successfully!');
        return redirect()->route('manage.careerObjectiveAndApplicationInformation');

    }

    public function editobjectivePageQuestion(Request $r){

        $editAgreement=QuestionObjectiveAndInfo::findOrFail($r->id);
        $lastserialnumber = QuestionObjectiveAndInfo::select('serial')
            ->orderBy('serial', 'DESC')
            ->first();

        return view('manage.editCareerObjectiveAndApplicationInformation',compact('editAgreement', 'lastserialnumber'));
    }

    public function updateobjectivePageQuestion($id,Request $r){

        $r->validate([
            'qus' => 'required',
            'serial' => 'required|unique:emp_ques_objective_and_info,serial,'.$id.',id',

        ]);

        $agreement =QuestionObjectiveAndInfo::findOrFail($id);
        $agreement->ques=$r->qus;
        $agreement->serial=$r->serial;
        $agreement->status = $r->status;
        $agreement->save();

        Session::flash('message', 'Updated Successfully!');
        return redirect()->route('manage.careerObjectiveAndApplicationInformation');

    }


    public function termsConditionShow(){


        $terms=TermsAndConditions::first();
        return view('manage.termsAndCondition',compact('terms'));
    }


    public function termsConditionUpdate(Request $r){

        try
        {
            $terms=TermsAndConditions::firstOrFail();
        }
// catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            $terms=new TermsAndConditions();

        }

        $terms->page_Header=$r->title;
        $terms->page_content=$r->contents;
        $terms->save();



        Session::flash('message', 'Updated Successfully!');
        return redirect()->route('manage.terms_and_condition');

    }

    public function typeOfEmploymentShow(){


        $type=TypeOfEmployment::get();
        return view('manage.typeOfEmployment',compact('type'));
    }
    public function inserttypeOfEmployment(Request $r)
    {


        $type = new TypeOfEmployment();
        $type->employmentTypeName = $r->employmentTypeName;
        $type->status = $r->status;
        $type->save();


        Session::flash('message', 'Inserted Successfully!');
        return redirect()->route('manage.typeOfEmployment');
    }
    public function edittypeOfEmployment(Request $r)
    {

        $type =TypeOfEmployment::findOrFail($r->id);

        return view('manage.editTypeOfEmployment',compact('type'));

    }

    public function updatetypeOfEmployment($id,Request $r){



        $type =TypeOfEmployment::findOrFail($id);
        $type->employmentTypeName = $r->employmentTypeName;
        $type->status = $r->status;
        $type->save();

        Session::flash('message', 'Updated Successfully!');
        return redirect()->route('manage.typeOfEmployment');

    }

    public function changeinterviewcard()
    {
        $email_data = email::where('emailfor','interview')->first();
        return view('emailTemplte.interview',compact('email_data'));
    }

    public function changepanellisted()
    {
        $email_data = email::where('emailfor','panellisted')->first();
        return view('emailTemplte.panellisted',compact('email_data'));
    }

    public function notselected()
    {
        $email_data = email::where('emailfor','notselected')->first();
        return view('emailTemplte.notselected',compact('email_data'));
    }

    public function updateemailtemplate(Request $r)
    {
        if (!empty($r->contant_id))
            $email = email::find($r->contant_id);
        else
            $email = new email;
            $email->emailfor=$r->contant_type;
            $email->emailbody=$r->contents;
            $email->save();

            return $this->emailTemplateSettings();
    }

    public function emailTemplateSettings()
    {
        $email_data = email::where('emailfor','interview')->first();
        return view('emailTemplte.interview',compact('email_data'));
    }

    public function acknowledgement()
    {
        $email_data = email::where('emailfor','Acknowledgement')->first();
        return view('emailTemplte.acknowledgement',compact('email_data'));
    }
}
