<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <style>
       body {
           background: none repeat scroll 0 0;
       }



       .logo img {
           width: 80px;

       }
       .versity_name span {
           color: red;
       }

       .application h3 {
           color: red;
           font-size: 25px;
           margin-bottom: 30px;
           text-align: center;
           text-transform: uppercase;
       }

       .versity_name h2 {
           font-size: 37px;
           margin-left: 18px;
       }
       .application p {
           margin: 0;
           padding: 0;
       }
       .photo > p {
           border: 1px solid;
           height: 122px;
           margin-top: 5px;
           text-align: center;
           width: 110px;
       }

       .personal {
           border: 1px solid #000;
           margin-top: 5px;
           background-color: #B0DBF0;
       }
       .first_name {
           -moz-border-bottom-colors: none;
           -moz-border-left-colors: none;
           -moz-border-right-colors: none;
           -moz-border-top-colors: none;
           border-color: -moz-use-text-color #000 #000;
           border-image: none;
           border-style: none solid solid;
           border-width: medium 1px 1px;
       }
       table, th, td {
           border: 1px solid black;
           border-collapse: collapse;
       }
       th, td {
           padding: 5px;
           text-align: left;
       }

       input {
           border: medium none;

           padding: 0;
       }
   </style>

</head>

<style>
    @page { size: auto;  margin: 5px; }
</style>
<body>
<div class="structure">
    <div style= "background: #fff; margin-bottom: 30px; " class="container">

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <tr>
                <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
            </tr>

        </table>
        <table border="0" style="width:100%; margin-top: 30px; border: none; border-bottom: 1px solid #000">
            <tr>
                <td style="text-align: left; border: none;">
                    <h3 style="">{{$personalInfo->firstName}} {{$personalInfo->lastName}}</h3>
                    <p style="max-width: 300px">Cell No: {{$personalInfo->personalMobile}} <br>
                        email: {{$personalInfo->email}} <br>
                        address: {{$personalInfo->presentAddress}}
                    </p>

                </td>
                <td style="width: 13%; border: none; "><img height="150px" width="150px" src="{{url('public/candidateImages/thumb').'/'.$personalInfo->image}}" alt=""></td>
            </tr>

        </table>


        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>
            </tr>
        </table>


    {{--Education--}}
        @foreach($education as $edu)
            <table border="0" style="width:100%; margin-top: 25px; border: none;">
                <tr>

                    <td style="border: none; width: 10%">Exam </td>
                    <td style="border: none; width: 5%">:</td>

                    <td style="border: none;"><b>{{$edu->educationLevelName}} in {{$edu->degreeName}}</b> </td>
                </tr>
                <tr>

                    <td style="border: none; width: 10%">Institution</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">{{$edu->institutionName}}</td>
                </tr>
                <tr>

                    <td style="border: none; width: 10%">Passing Year</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none;">{{$edu->passingYear}} </td>
                </tr>
                {{--<tr>--}}

                    {{--<td style="border: none; width: 10%">Board</td>--}}
                    {{--<td style="border: none; width: 5%">:</td>--}}
                    {{--<td style="border: none;">Dhaka</td>--}}
                {{--</tr>--}}

                <tr>

                    <td style="border: none; width: 10%">Result</td>
                    <td style="border: none; width: 5%">:</td>
                    <td style="border: none; margin-bottom: 30px;"> {{$edu->result}}</td>
                </tr>

            </table >




        @endforeach






        


        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Professional Certificate</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>

                <td style="border: none; width: 10%">Exam</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;"><b>B.Sc in Computer Science & Engineering</b> </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Session</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">2016-2017 </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Board</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Dhaka</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Cgpa</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;"> 4.00</td>
            </tr>

        </table >



        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 20px; border: none;">

            <tr style="">

                <td style="border: none;">
                    <p>Company Name : TechCloud Ltd <br>
                        Position: Web Developer <br>
                        Duration: 2017 - present.

                    </p>

                </td>
                <td style="border: none;">
                    <p>Company Name : TechCloud Ltd <br>
                        Position: Web Developer <br>
                        Duration: 2017 - present.

                    </p>

                </td>


            </tr>

        </table>




        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Training Certificate</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>

                <td style="border: none; width: 10%">Exam</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;"><b>B.Sc in Computer Science & Engineering</b> </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Session</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">2016-2017 </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Board</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Dhaka</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Cgpa</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;"> 4.00</td>
            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Information</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>

                <td style="border: none; width: 10%">Name</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Nahid Hasan </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Fathers Name</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Habibur Rahman </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Mothers Name</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Nurun Nahar</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">DOB</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;">28-04-1993</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Nationality</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;">Bangladeshi</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Religion</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;">Islam</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">National ID</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;">1993481451000006</td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Address</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none; margin-bottom: 30px;">Katiadi, Kishoreganj</td>
            </tr>

        </table>




        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Referee</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 20px; border: none;">

            <tr style="">

                <td style="border: none;">
                    <p> Name : Sakib Rahman <br>
                        Contace: 01711902299 <br>
                        Position: Software Engineer <br>
                        email: sakib@tcl.com


                    </p>

                </td>
                <td style="border: none;">
                    <p> Name : Sakib Rahman <br>
                        Contace: 01711902299 <br>
                        Position: Software Engineer <br>
                        email: sakib@tcl.com


                    </p>

                </td>


            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 20px; border: none;">
            <tr>
                <td style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in Caritaas</b> </td>
            </tr>
        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>

                <td style="border: none; width: 10%">Name</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Nahid Hasan </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Position</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">Marketing Manager </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Contact</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">01711902299 </td>
            </tr>
            <tr>

                <td style="border: none; width: 10%">Email</td>
                <td style="border: none; width: 5%">:</td>
                <td style="border: none;">tushar@tcl.com </td>
            </tr>


        </table>









    </div>
</div>
</body>
</html>